<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Car;
use Auth;
use Session;
use DB;
use App\Day;
use DateTime;
use App\User;
use App\Company;
use App\Addation;
use App\Order;

class MainController extends Controller
{

  //serach
    //   public function ssss(Request $request){
  
    //         $data = $request->all();
    //         //echo "<pre>"; print_r($data); die;
    //         $search_company = $data['company'];
    //         $search_marker  = $data['marker'];
    //         $search_mode    = $data['mode'];
    //         $search_number_seat = $data['number_seat'];
    //         $carAll = Car::where([['company_id','like','%'.$search_company.'%'],['status',1]])->orwhere('marker','like','%'.$search_marker.'%')->orwhere('mode','like','%'.$search_mode.'%')->orwhere('number_seat','like','%'.$search_number_seat.'%')->get();
    //         $companies = Company::get();
    //         $cars =Car::get();

    //          return $this->apiResponse(1,"تم اظاهر الن صحيح تائج بشكل");
        
    // }

    //cities
public function searchCars(Request $request){

$carAll = Car::where(function($query) use($request){
                if($request->input('number_seat')){
                    $query->where('number_seat',$request->number_seat);
                }
                
                if($request->input('marker')){
                    $query->where('marker',$request->marker);
                }
                
                if($request->input('mode')){
                    $query->where('mode',$request->mode);
                }
                
                if($request->input('company')){
                    $query->where('company_id',$request->company);
                }
        
    
    })
     ->where('status','=',1)
    ->paginate(10);
     
return $this->apiResponse(1,"تم اظاهر الن صحيح تائج بشكل" , $carAll);
}




   public function viewCar($id,Request $request)
   {
      $orders=Car::with('company')->find($id);

       if(is_null($orders))

        {
          return $this->apiResponse(0 , 'error here ');

        }

           return $this->apiResponse(1 , 'تم عرض البيانات', $orders);

   }
   
   

   public function viewAddition(Request $request , $id){

      $addation = Addation::where('company_id',$id)->first();
      //dd($addation);
      return $this->apiResponse(1 , 'تم عرض البيانات', $addation);
   }


     ////////////////////////////////////////////////////

public function addtocart(Request $request){

        $data = $request->all();
        



        if (empty(Auth::user()->email)) {
            $data['user_email'] = '';
        }else{
           $data['user_email'] = Auth::user()->email;
        }
  
        $session_id = Session::get('session_id');
        if (empty($session_id)) {
            $session_id = str_random(40);
            Session::put('session_id',$session_id);
        }
        $countCars = DB::table('cart')->where(['car_id'=>$data['car_id'],'car_name'=>$data['car_name'],'session_id'=>$session_id])->count();
        if ($countCars > 0) {
            return redirect()->back()->with('flash_message_error', 'Car already Exist');
        }else{
        if (empty($data['provide_driver'])) {
            $provide_driver = 0;
        }else{
           $provide_driver = $data['provide_driver'];
        }
        if (empty($data['additional_driver'])) {
            $additional_driver = 0;
        }else{
           $additional_driver = $data['additional_driver'];
        }
        if (empty($data['age_driver'])) {
            $age_driver = 0;
        }else{
           $age_driver = $data['age_driver'];
        }
        if (empty($data['add_insurance'])) {
            $add_insurance = 0;
        }else{
           $add_insurance = $data['add_insurance'];
        }
        if (empty($data['connect_car_place'])) {
            $connect_car_place = 0;
        }else{
           $connect_car_place = $data['connect_car_place'];
        }
        if (empty($data['child_seat'])) {
            $child_seat = 0;
        }else{
           $child_seat = $data['child_seat'];
        }

        $from_date = $data['from_date'];
            $to_date = $data['to_date'];
            $datetime1 = new DateTime($from_date);
            $datetime2 = new DateTime($to_date); 
            $interval = $datetime1->diff($datetime2); 
            $days = $interval->format('%a'); 
            //echo "<pre>"; print_r($days); die; 

       $order = DB::table('cart')->insert([
            'car_id'=>$data['car_id'],
            'car_name'=>$data['car_name'],
            'car_type'=>$data['car_type'],
            'price'=>$data['price'],
            'provide_driver'=>$provide_driver,
            'additional_driver'=>$additional_driver,
            'age_driver'=>$age_driver,
            'add_insurance'=>$add_insurance,
            'connect_car_place'=>$connect_car_place,
            'child_seat'=>$child_seat,
            'user_email'=>$data['user_email'],  
            'from_date'=>$from_date,
            'to_date'=>$to_date,
            'number_days'=>$days,
            'session_id'=>$session_id]);
       }
       return $this->apiResponse(1 , 'تم الاضافه بنجاح' ,['order'=>$order]);
    }

   

    public function cart(){
        if (Auth::check()) {
            $user_email = Auth::user()->email;
            $userCart = DB::table('cart')->where(['user_email'=>$user_email])->get();
        }else{
            $session_id = Session::get('session_id');
            $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
        }
         
        foreach ($userCart as $key => $product) {
            $productDetails = Car::where('id',$product->car_id)->first();
            $userCart[$key]->image = $productDetails->image;

        }
      
       
       $session_id = Session::get('session_id');
       $usercar = DB::table('cart')->where(['session_id'=>$session_id])->first();
       $car_company = Car::where('id',$usercar->car_id)->first();
       $addation = Addation::where('company_id',$car_company->company_id)->first();
       $user = Auth::user();
       $date = Order::where('user_email',$user->email)->first();
       //======================================================================
       $total_amount = 0;
       foreach ($userCart as $cart) {
         $total_amount = $total_amount + ($cart->price*$cart->number_days) + $cart->provide_driver + $cart->additional_driver + $addation->tax;
       }
        return $this->apiResponse(1 , 'sucess' ,$usercar,$car_company,$addation,$user,$date,$total_amount);
    }

    public function order(Request $request){
            $data = $request->all();
            $user_id = Auth::user()->id;
            $user_email = Auth::user()->email;
            $userDetails = User::where(['email'=>$user_email])->first();
            $cartProducts = DB::table('cart')->where(['user_email'=>$user_email])->first();
            $usercar = DB::table('cart')->where(['user_email'=>$user_email])->first();
            $car_company = Car::where('id',$usercar->car_id)->first();
       $addation = Addation::where('company_id',$car_company->company_id)->first();
            
            $user_email = Auth::user()->email;
            $userCart = DB::table('cart')->where(['user_email'=>$user_email])->get();
        
        $total_amount = 0;
       foreach ($userCart as $cart) {
         $total_amount = $total_amount + ($cart->price*$cart->number_days) + $cart->provide_driver + $cart->additional_driver + $addation->tax;
       }
            $order = new Order;
            $order->user_id = $user_id;
            $order->user_email = $user_email;
            $order->name = $userDetails->name;
            $order->address = $userDetails->address;
            $order->phone = $userDetails->phone;
            $order->car_id = $cartProducts->car_id;
            $order->car_name = $cartProducts->car_name;
            $order->child_seat = $cartProducts->child_seat;
            $order->additional_driver = $cartProducts->additional_driver;
            $order->from_date = $cartProducts->from_date;
            $order->to_date = $cartProducts->to_date;
            $order->payment_method = '1';
            $order->grand_total = $total_amount;
            $order->save();
            $user_email = Auth::user()->email;
            DB::table('cart')->where('user_email',$user_email)->delete();
        
         return $this->apiResponse(1 ,'sucess' ,$userDetails,$cartProducts,$userCart,$addation);
    }
  public function reservasion(){
    $user = Auth::user();
    $orders = Order::where('user_email',$user->email)->get();
    return $this->apiResponse(1,'success',
      [$orders]);
  }


      public function reservasionCar(Request $request)
   {
       $reservasionCar=Car::with('company')->where(function($query)use($request)
        {
          if($request->has('id'))
          {
               $query->where('id',$request->id);

          }
           })->get();
        return $this->apiResponse(1,'success',$reservasionCar);

   }




     
  




}
