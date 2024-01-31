<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Session;
use App\User;
use App\Company;
use Image;
use DB;
use Mail;
use App\Mail\AdminResetPassword;
use Carbon\Carbon;
use App\Notifications\NewFollower;
use App\Notification;
use App\Car;


class AdminController extends Controller
{
    public function login(Request $request){
    if ($request->isMethod('post')) {
      $data = $request->all();
      // echo "<pre>";print_r($data);die;
      if (Auth::attempt(['email'=>$data['email'], 'password'=>$data['password'],'status'=>'1'])){
              return redirect('/admin/dashboard');
      }else{
              return redirect('/admin')->with('flash_message_error','اسم المستخدم او كلمة المرور خطأ');
      }
    }
    return view('admin.admin_login');
  }

    public function dashboard(){
        return view('admin.dashboard');
    }
    public function logout(){
        Session::flush();
        return redirect('admin')->with('flash_message_success','Logged out Successfully');
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
        return view('admin.admin_login');
    }

     public function reset_password(Request $request ,$token){
        if ($request->isMethod('post')) {
            $data = $request->input();
            $check_token = DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
        
            if (!empty($check_token)) {
                $admin = User::where('email',$check_token->email)->update(['email'=>$check_token->email,'password'=>bcrypt(request('password'))]);
                DB::table('password_resets')->where('email',request('email'))->delete();
                return redirect('admin');
            }
        }   
        $check_token = DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
        //return dd($check_token);
        if (!empty($check_token)) {
            return view('admin.reset_password',['data'=>$check_token]);
        }else{
            return redirect('forgot/password');
        }
    }

    public function settings(){
        return view('admin.settings');
    }

   public function chkPassword(Request $request){
        $data = $request->all();
        $current_password = $data['current_pwd'];

        $check_password =User::where(['email'=> Auth::user()->email])->first();
        if(Hash::check($current_password,$check_password->password)){
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
           // echo "<pre>"; print_r($data); die;
            $check_password =User::where(['email'=> Auth::user()->email])->first();
            //$check_password = User::where(['admin'=>'1'])->first();
           // echo "<pre>"; print_r($check_password); die;
            $current_password= $data['current_pwd'];
            if (Hash::check($current_password, $check_password->password)) {
                $password=bcrypt($data['new_pwd']);
                User::where('id',$check_password->id)->update(['password'=>$password]);
                return redirect('admin/settings')->with('flash_message_success', 'تم تغير كلمة المرور بنجاح'); 
            }else{
                return redirect('admin/settings')->with('flash_message_error', 'خطأ في تعديل كلمة ال');
            }
        }
    }

    public function sendMassage($id){
       $viewAdmins = Admin::get();
       // echo "<pre>"; print_r($admin); die;
       //echo $admin->id; die;
        Admin::find($id)->notify(new NewFollower);
        return redirect('admin/view')->with(compact('viewAdmins'));
         // \App\Notifications\Notification_info(1,$last_insert_id)
    }

    public function viewNotification(){

        $admin = Admin::where(['name'=>Session::get('adminSession')])->first();
        $notifications = Notification::where(['notifiable_id'=>$admin->id])->get();
        $notificationsCount = Notification::where(['notifiable_id'=>$admin->id])->count();
        return view('admin.notification')->with(compact('admin','notifications','notificationsCount'));
    }

    public function creatAdmins(Request $request){
    if ($request->isMethod('post')) {
      $data = $request->all();
         $message=[
            'required'=>'الرجاء  املاء الحقل الفارغ '];
         $this->validate($request,[                 
                'name'=> 'required',
                 'email' => 'required|email|unique:users',
                 'address'=> 'required',
                 'phone'=> 'required',
                 'details'=> 'required',
                 'logo'=> 'required',
                 'password'=> 'required',
                 'name_company'=> 'required',
               
            ],$message);
       //echo "<pre>"; print_r($data); die;
      $admin = new User;
        
        $admin->name = $data['name'];
        $admin->email = $data['email'];
        $admin->password = bcrypt($data['password']);
        if (empty($data['status'])) {
                $status = 0;
            }else{
                $status = 1;
            }
            $admin->status = $status;
        $admin->address = $data['address'];
        $admin->phone = $data['phone'];    
        $admin->save();
        $admin_id = DB::getPdo()->lastInsertId();
        $Company = new Company;
            $Company->user_id = $admin_id;
            $Company->name =$data['name_company'];
            $Company->address =$data['address'];
            $Company->details =$data['details'];
          // Upload Image
            if($request->hasFile('logo')){
                $image_tmp = Input::file('logo');
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

                    // Store image name in products table
                    $Company->logo = $filename;
                }
            }
            $Company->save();

        return redirect('admin-view')->with('flash_message_success', 'تم اضافة مستخدم جديد بنجاح');
        
        } 
        return view('admin.creat_admin');
    }
    
    
    
    public function editAdmins(Request $request , $id){
        if ($request->isMethod('post')) {
            $data = $request->all();
           // echo "<pre>"; print_r($data); die;
              

            if (empty($data['status'])) {
                $status = 0;
            }else{
                $status = 1;
            }

           

            User::where(['id'=>$id])->update([
                'name'=>$data['name'],
                'email'=>$data['email'],
                'status'=>$status,
                'phone'=>$data['phone'],
                'address'=>$data['address'],
            ]);

            // Upload Image
            if($request->hasFile('logo')){
                $image_tmp = Input::file('logo');
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

            Company::where('user_id',$id)->update([
                'name'=>$data['name_company'],
                'address'=>$data['address'],
                'details'=>$data['details'],

            ]);
            return redirect()->back()->with('flash_message_success','تم التعديل بنجاح');
        }
        $user = User::findOrFail($id);
        $viewAdmins = Company::where('user_id',$id)->first();    
        return view('admin.company.edit_company')->with(compact('user','viewAdmins'));
    }

    public function deleteAdmins($id){
        User::where(['id'=>$id])->delete();
        Company::where('user_id',$id)->delete();
        return redirect()->back()->with('flash_message_success', 'Coupon Has Been deleted Successfully.');

    }
    

    public function viewAdmins(){

         $user = Auth::user()->id;
        $viewAdmins = Company::where('user_id','!=',$user)->get();
         //$viewAdmins = json_decode(json_encode($viewAdmins));
         //echo "<pre>"; print_r($viewAdmins); die;
        return view('admin.admin_view')->with(compact('viewAdmins'));
    }



    public function statistics()
    {
        $users = DB::table('users')->count();
        $orders = DB::table('orders')->count();
         return view('admin.dashboard')->with(['users'=>$users,'orders'=>$orders]);

    }
}
