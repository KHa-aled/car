<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use Mail;
use Socialite;


class AuthController extends Controller
{
    public function register(Request $request){
  

     $this->validate($request,[                 
                'name'=> 'required',          
                'email'=> 'required|unique:users',          
                'password'=> 'required',          
                'phone'=> 'required',          
                'address'=> 'required',          
            ]);


         $request->merge(['password' => bcrypt($request->password)]);

         $users = User::create($request->all());
        
                    $users->phone = $request->phone;
                    $users->address = $request->address;
                      $users->api_token = str_random(60);
                   $users->save();

        $mail = array(
                'email' => $users->email,
                'subject' => 'confirm',
                'bodyMessage' => 'Please verify Your account',
                'id' =>$users->id,
                'token' =>$users->api_token
             );


                     Mail::send('emails.contact', $mail, function($message) use ($mail){
                    $message->from($mail['email']);
                    $message->to('hazem.chelsea9@yahoo.com');
                    $message->subject($mail['subject']);
                });
      
              return $this->apiResponse(1 , 'Please Check Your Email to confirm your account',[
              [
	          'api_token'=>$users->api_token,
	       	    'users'=>$users
	        ]]);
	    
                 
      //   return $this->apiResponse(1 , 'تم الاضافه بنجاح' , 
	    	// [
	     //      'api_token'=>$users->api_token,
	     //   	    'users'=>$users
	     //    ]);
	    
   }

 //login
public function login(Request $request){
 
  	 $validator = validator()->make($request->all(), [
   	 	            'email'=> 'required',
                  'password'=>['required', 'min:6'],

          ]);

	    if($validator->fails())

	       {
             return $this->apiResponse(0,$validator->errors()->first(), $validator->errors() );
 
	       }

       $users = User::where('email' ,$request->email)->first();
            if($users){
                 if(Hash::check($request->password, $users->password))
                     {
                            return $this->apiResponse(1 ,'تم التسجيل بنجاح',[
                            'api_token' => $users->api_token,
                             'users' => $users
                     ]);
        }else
        {
            return $this->apiResponse(0,'البيانات المدخله غير صحيحه');
        }

    }else
    {
        return $this->apiResponse(0,'البيانات المدخله غير صحيحه');
    }
}


///=====================profile edit user ====================///
  public function editUser(Request $request)

  {
     
         $user= Auth::user()->id;
         $userdetails=User::where('id',$user)->first();
         return $this->apiResponse(1 , ' تم  تعديل   البيانات   بنجاح    ' ,$userdetails);
  }


 
    ///edit 

    public function updateUser(Request $request)

   {   
       $data = $request->all();
       $rules = [
        'phone' => 'required',
        'address' => 'required'
       ];
 
    $validator = validator()->make($request->all(),$rules);
      if($validator->fails()){
       return $this->apiResponse(0,$validator->errors()->first(), $validator->errors() );
       }

       
         $user= Auth::user()->id;
         
         $userUpdate=User::where('id',$user)->update([
             'phone'=>$data['phone'],
             'address'=>$data['address'],
             ]);
         //dd($user);

      //dd($update);
      return $this->apiResponse( 1 , 'edit true' ,$userUpdate);
      
   }
//==============reset================//////////
   public function reset(Request $request){
    
   $rules = [
        'phone' => 'required'
       ];
 
    $validator = validator()->make($request->all(),$rules);
      if($validator->fails()){
       return $this->apiResponse(0,$validator->errors()->first(), $validator->errors() );
       }

       $users =User::where('phone',$request->phone)->first();
          if ($users) {
           $code = rand(1111,9999);
           $update = $users->update(['pin_code'=>$code]);
           //$update->save();
           if ($update) {
               return $this->apiResponse(1,'الرجاء فحص هاتفك ',['pin_code'=>$code]);
           }
           else
           {

               return apiResponse(0,'حدث خطأ حاول مرة اخري');
           }
       }
       else
       {
          return apiResponse(0,'لايوجد حساب مرتبط بهذا الهاتف');
       }
   }


///password

  public function password(Request $request){

     $rules = [
         'pin_code' => 'required',
           'password'=>'required|confirmed'
       ];

        $validator = validator()->make($request->all(),$rules);
         if($validator->fails()){
       return $this->apiResponse(0,$validator->errors()->first(), $validator->errors() );

           }

       $user = User::where('pin_code',$request->pin_code)->where('pin_code','!=',0)->first();
       if ($user){
           $user->password = bcrypt($request->password);
           $user->pin_code = null;

           if ($user->save())
           {
               return $this->apiResponse(1,'تم تغير كلمة المرور بنجاح');
           }else
           {
               return $this->apiResponse(0,'حدث خطأ حاول مرة اخري');
           }
       }
       else
       {
           return $this->apiResponse(0,'هذا الكود غير صالح');
       }
   }








}


    
 
   

