<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Company;
use App\Order;
use Auth;

class ReservasionController extends Controller
{
   	public function reservasionCars(Request $request){
        $carDetails = Car::all();
        $cars =Car::orderBy('id', 'desc')->paginate(4);
     	$companies = Company::get();
     	$user = Auth::user();
     	$orders = Order::where('user_email',$user->email)->get();

     	//$company = Company::where('user_id',$orders->user_id)->first();
     	foreach ($orders as $key => $product) {
     		$car = Car::where('id',$product->car_id)->first();
            $productDetails = Company::where('id',$car->company_id)->first();
            $orders[$key]->logo = $productDetails->logo;
            $orders[$key]->name_company = $productDetails->name;

        }
       // $orders = json_decode(json_encode($orders));
         //echo "<pre>"; print_r($orders);die;
        return view('car.reservasion_car')->with(compact('cars','companies','orders','carDetails'));
    }
   	
}
