<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Image;
use Session;
use App\User;
use Mail;
use App\Mail\AdminResetPassword;
use DB;
use Carbon\Carbon;
use App\Car;
use App\Company;

class UsersController extends Controller
{
    public function userLoginRegister(){
        $carDetails = Car::all();
        $cars =Car::orderBy('id', 'desc')->paginate(4);
        $companies = Company::get();
    	return view('users.login_register')->with(compact('cars','companies','carDetails'));
    }

 public function login(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->input();
            // echo "<pre>"; print_r($data); die;
            
              $attempt = Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);

          if($attempt)
                {
       
            
                Session::put('frontSession', $data['email']);
                if (!empty(Session::get('session_id'))) {
                    $session_id = Session::get('session_id');
                    DB::table('cart')->where('session_id',$session_id)->update(['user_email'=>$data['email']]);
                }
              return redirect('/');
            }else{
              return redirect('/')->with('flash_message_error','Invalid Username Or Password!');
            }
        }
   }

   public function register(Request $request){
    if ($request->isMethod('post')) {
      $data = $request->all();
      
      $massage=[
        'name.required'=> 'الرجاء ادخال  اسم المستخدم ',
        'email.required'=> 'الرجاء  ادخال  الابريد الالكتروني ',
        'password.required'=> 'الرجاء ادخال  كلمه المرور ',
        'phone.required'=> 'الرجاء ادخال رقم  الهاتف',
        'address.required'=> 'الرجاء ادخال  العنوان ',
      ];
      $this->validate($request,[                 
                'name'=> 'required',          
                'email'=> 'required',          
                'password'=> 'required',          
                'phone'=> 'required',          
                'address'=> 'required',          
            ], $massage);

      $userCount = User::where('email',$data['email'])->count();
      if ($userCount > 0) {
        return redirect()->back()->with('flash_message_error','Email already Exist!');
      }else{
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->phone= $data['phone'];
        $user->address= $data['address'];
        $user->remember_token= $data['_token'];
        $user->save();
        $mail = array(
                'email' => $user->email,
                'subject' => 'confirm',
                'bodyMessage' => 'Please verify Your account',
                'id' =>$user->id,
                'token' =>$data['_token']
            );

            Mail::send('emails.contact', $mail, function($message) use ($mail){
                    $message->from('mohm4325@gmail.com');
                    $message->to($mail['email']);
                    $message->subject($mail['subject']);
                });
            return redirect()->back()->with('flash_message_success','Please Check Your Email to confirm your account!');
            if (Auth::attempt(['email'=>$data['email'], 'password'=>$data['password']])) {
              return redirect()->back()->with('flash_message_success','Please Check Your Email to confirm your account!');
            }
        }   
    }
    $carDetails = Car::all();
    $cars =Car::orderBy('id', 'desc')->paginate(4);
    $companies = Company::get();
    return view ('users.client_register')->with(compact('cars','companies','carDetails'));
 }
    public function verifyUser($id,$userToken){
	    $user = User::where('id',$id)->where('remember_token','LIKE',$userToken)->first();

	    if($user){
	      $user->email_verified_at = date('Y-m-d H:i:s');
	      $user->save();
	      return redirect('/');
	    }else{
	      abort(403);
	    }
	}

	public function forgot(){
		return view('users.forgot');
	}

	public function forgot_password(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->input();
            $admin = User::where('email',$data['email'])->first();
            //$admin = json_encode(json_decode($admin));
            //echo "<pre>"; print_r($admin);die;
            if (!empty($admin)) {
                $token = app('auth.password.broker')->createToken($admin);
                $data = DB::table('password_resets')->insert([
                    'email'=>$admin->email,
                    'token'=>$token,
                    'created_at'=>Carbon::now(),
                ]);
                Mail::to ($admin->email)->send(new AdminResetPassword(['data'=>$admin,'token'=>$token]));
                session()->flash('success',trans('admin.the_link_reset_sent'));
                return new AdminResetPassword(['data'=>$admin,'token'=>$token]); 
                return back();
            }
            return back();
        }    
        
    }

     public function reset_password(Request $request ,$token){
        if ($request->isMethod('post')) {
            $data = $request->input();
            $check_token = DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
        
            if (!empty($check_token)) {
                $admin = User::where('email',$check_token->email)->update(['email'=>$check_token->email,'password'=>bcrypt(request('password'))]);
                DB::table('password_resets')->where('email',request('email'))->delete();
                return redirect('login-register');
            }
        }   
        $check_token = DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
        //return dd($check_token);
        if (!empty($check_token)) {
            return view('users.reset_password',['data'=>$check_token]);
        }else{
            return redirect('forgot/password');
        }
    }

    public function editProfile(Request $request){
         if ($request->isMethod('post')) {
            $data = $request->all();
           // echo "<pre>"; print_r($data); die;
            if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/logo/large/'.$filename;
                    $medium_image_path = 'images/backend_images/logo/medium/'.$filename;
                    $small_image_path = 'images/backend_images/logo/small/'.$filename;
                    // Resize Images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                }

            }elseif(!empty($data['current_image'])){
                $filename = $data['current_image'];
            }else{
                $filename = '';
            }

            $user = Auth::user()->id;
            // echo "<pre>"; print_r($user); die;
            User::where('id',$user)->update([
                'name'=>$data['name'],
                'email'=>$data['email'],
                'password'=>bcrypt($data['password']),
                'phone'=>$data['phone'],
                'address'=>$data['address'],
                'image'=>$filename,
            ]);

            
            return redirect()->back()->with('flash_message_success','تم التعديل بنجاح');
        }
        $user = Auth::user();
        // echo "<pre>"; print_r($user->id); die;
        $userDetails = User::where('id',$user->id)->first();
        $cars =Car::orderBy('id', 'desc')->paginate(4);
        $carDetails = Car::all();
        $companies = Company::get();
        return view('users.profile')->with(compact('cars','companies','userDetails','carDetails'));   
    }

	public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
