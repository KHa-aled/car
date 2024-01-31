<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Car;
use App\User;
use App\Addation;
use App\Company;
use App\Marker;
use App\Mode;
use Auth;
use App\Rating;
class WelcomeController extends Controller
{
   
        public function categoryCar()
          {
    	      
              $carDetails = Car::all();
    	      $cars =Car::orderBy('id', 'desc')->paginate(6);
            $user = User::where('super_admin','1')->first();
            $companies = Company::where('user_id','!=',$user->id)->orderBy('id', 'desc')->paginate(4);
            return view('welcome')->with(compact('cars','companies','carDetails'));
        
          }

    public function detailsCar(Request $request , $id ){
       //$user_email = Auth::user()->email;
      //$userDetails = User::where(['email'=>$user_email])->first();

       $star = Rating::where('car_id',$id)->avg('rate');
       $car  = Car::with('company')->find($id);
       //echo "<pre>"; print_r($car->company_id); die;
        $addation = Addation::where('company_id',$car->company_id)->first();
        //echo "<pre>"; print_r($addation); die;
        $companies = Company::get();
       $cars =Car::orderBy('id', 'desc')->paginate(4);
        return view('detailsCar',compact('car','addation','companies','cars','star'));
    }
}
