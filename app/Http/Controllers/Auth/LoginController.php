<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $userSocial = Socialite::driver('facebook')->user();
        $findUser= User::where('email',$userSocial->email)->first();
        if ($findUser) {
            Auth::login($findUser);
             return redirect('/');
        }else{
        $user =new User;
        $user->name = $userSocial->name;
        $user->email = $userSocial->email;
        $user->password = bcrypt(123456);
        $user->save(); 
        Auth::login($user);
            return redirect('/');
        }   

    }





///////////////////////============= api ======================================////////////////////


   public function ApiredirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function ApihandleProviderCallback()
    {
        $userSocial = Socialite::driver('facebook')->user();
        $findUser= User::where('email',$userSocial->email)->first();
        if ($findUser) {
            Auth::login($findUser);
              return $this->apiResponse(1,'الذهاب  الى   الؤئيسيه  ');
        }else{
        $user =new User;
        $user->name = $userSocial->name;
        $user->email = $userSocial->email;
        $user->password = bcrypt(123456);
        $user->save(); 
        Auth::login($user);
              return $this->apiResponse(1,'الذهاب  الى   الؤئيسيه  ');
        }   

    }

        

}
