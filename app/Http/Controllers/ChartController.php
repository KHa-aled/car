<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Charts;
use Auth;
use App\Company;
use App\Car;
use App\Order;

class ChartController extends Controller
{
     public function index()

      {

         //   $charts = Charts::multiDatabase('users', 'ordars')
        //     ->title('My nice chart')
        //     ->colors(['#ff0000', '#ffffff'])
        //     ->labels(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday','Saturday', 'Sunday'])
        //     ->dataset('Hired', $user1s)
        //     ->dataset('Not Hired', $user2s);
        // return view('admin.posts.chart',compact('chart'));
        //    if ($user->id == 9) {
   
        //       $posts= Post::all();
        //     }
        // else
        // {
                  // $user = Auth::user() ;

        $user = Auth::user() ;
          // dd($user);
        if ($user->id == 9) {
   
            $orders = Order::all();
         $chart = Charts::database($orders, 'line', 'highcharts')
                                ->title("Monthly new Register Users")
                                ->elementLabel("Total Users")
                                ->dimensions(1000, 500)
                                ->responsive(false)
                                ->groupByMonth(date('Y'), true);
          return view('admin.posts.chart',compact('chart'));


            }
        else
        {

        $company = Company::where('user_id',$user->id)->first();
        //echo "<pre>"; print_r($company); die;
        $cars = Car::where('company_id',$company->id)->count();
       // echo "<pre>"; print_r($cars); die;
        if ($cars > 0) {
          $cars = Car::where('company_id',$company->id)->get();
          foreach ($cars as $key => $car) {
            $orders = Order::where('car_id',$car->id)->get();
        }
        // $orders = Order::where('car_id',$car->id)->get();
            //echo "<pre>"; print_r($car); die;

         $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
                                   ->get();
                                   //donutbar
        $chart = Charts::database($orders, 'line', 'highcharts')
                                ->title("Monthly new Register Users")
                                ->elementLabel("Total Users")
                                ->dimensions(1000, 500)
                                ->responsive(false)
                                ->groupByMonth(date('Y'), true);
}
        return view('admin.posts.chart',compact('chart'));
        
    
        
  
    }
  }//END CLASS
}
