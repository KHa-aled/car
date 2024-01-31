<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use DB;
use Image;
use App\Car;
use App\Company;
use App\Marker;
use App\Mode;
use App\Order;
use App\User;
use Notification;
use App\Addation;
use App\Coupon;
use App\Day;
use DateTime;
use Yajra\Datatables\Datatables;
use App\Notifications\NewPost;



class CarController extends Controller
{
    public function addCar(Request $request){
        
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

             $this->validate($request,[                 
                'car_name'=> 'required',
                 'car_type' => 'required',
                 'conditioner'=>['required'],
                 'gear'=> 'required',
                 'number_seat'=> 'required',
                 'kilometer'=> 'required',
                 'price'=> 'required',
                 'number_car'=> 'required',
                 'company_id'=> 'required',
                 'marker'=> 'required',
                 'mode'=> 'required',
                 'distance'=> 'required',
                 'image'=> 'required',
            ]);

             // if($validator->fails())
             //     {

             //    return redirect('/')->with('flash_message_error', 'الرجاء ا');

             //     }
      
            $car = new Car;
            $car->car_name =$data['car_name'];
            $car->car_type =$data['car_type'];
            $car->conditioner =$data['conditioner'];
            $car->gear =$data['gear'];
            $car->number_seat =$data['number_seat'];
            $car->kilometer =$data['kilometer'];
            $car->price =$data['price'];
            $car->number_car =$data['number_car'];
            $car->company_id =$data['company_id'];
            $car->marker =$data['marker'];
            $car->mode =$data['mode'];
            $car->distance =$data['distance'];
            // Upload Image
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

                    // Store image name in products table
                    $car->image = $filename;
                }
            }

            if (empty($data['status'])) {
                $status = 0;
            }else{
                $status = 1;
            }
            $car->status = $status;

            $car->save();
            $user_email = Auth::user();
            $company = Company::where('user_id',$user_email->id)->first();
            $addation = new Addation;
                $addation->provide_driver ='0';
                $addation->additional_driver ='0';
                $addation->age_driver ='0';
                $addation->add_insurance ='0';
                $addation->connect_car_place ='0';
                $addation->tax ='0';
                $addation->company_id =$company->id;
                $addation->user_email =$user_email->email;
                $addation->save();


            return redirect('admin/view-cars')->with('flash_message_success', 'تم اضافة السيارة بنجاح');
        }
        $user = Auth::user();
        $companies = Company::where('user_id',$user->id)->first();
        $markes = Marker::all();
        $models = Mode::all();
        return view('admin.car.add_car')->with(compact('companies','markes','models'));
    }



public function editCar(Request $request , $id){
        if ($request->isMethod('post')) {
            $data = $request->all();
           // echo "<pre>"; print_r($data); die;
            if (empty($data['status'])) {
                $status = 0;
            }else{
                $status = 1;
            }

      // Upload Image
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

           
            Car::where(['id'=>$id])->update([
                'car_name'=>$data['car_name'],
                'car_type'=>$data['car_type'],
                'status'=>$status,
                'conditioner'=>$data['conditioner'],
                'gear'=>$data['gear'],
                'number_seat'=>$data['number_seat'],
                'kilometer'=>$data['kilometer'],
                'price'=>$data['price'],
                'number_car'=>$data['number_car'],    
                //'company_id'=>$data['company_id'],
                'marker'=>$data['marker'],
                'mode'=>$data['mode'],
                'distance'=>$data['distance'],
                'image'=>$filename,
            ]);
   
              return redirect()->back()->with('flash_message_success','Company Has Been Update Successfuly');
        }

        $carDetails = Car::where('id',$id)->first();    
        return view('admin.car.edit_car')->with(compact('carDetails'));
    }





    public function viewCars(){
        $user = Auth::user();
        $company = Company::where('user_id',$user->id)->first();
        $cars = Car::where('company_id',$company->id)->with('marker','company')->get();
        return view('admin.car.view_car')->with('cars',$cars);
    }

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

        $massage=[
        'from_date.required'=> 'االرجاء  ادخال  وقت  البدايه ',
        'to_date.required'=> 'الرجاء  ادخال  تاريخ  نهايه  التس',

      ];
      $this->validate($request,[                 
                'from_date'=> 'required',          
                'to_date'=> 'required',          
                  
            ], $massage);

        $from_date = $data['from_date'];
            $to_date = $data['to_date'];
            $datetime1 = new DateTime($from_date);
            $datetime2 = new DateTime($to_date); 
            $interval = $datetime1->diff($datetime2); 
            $days = $interval->format('%a'); 
            //echo "<pre>"; print_r($days); die; 

        DB::table('cart')->insert([
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
       return redirect('cart')->with('flash_message_success', 'تمت عمليه  الاضافه بنجاح ');
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
       // echo "<pre>"; print_r($userCart);
       $cars =Car::orderBy('id', 'desc')->paginate(4);
       $companies = Company::get();
       $session_id = Session::get('session_id');
       $usercar = DB::table('cart')->where(['session_id'=>$session_id])->first();
       $car_company = Car::where('id',$usercar->car_id)->first();
       $addation = Addation::where('company_id',$car_company->company_id)->first();
        return view('car.cart')->with(compact('userCart','cars','companies','addation','usercar'));
    }

public function order(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            $user_id = Auth::user()->id;
            $user_email = Auth::user()->email;
            $userDetails = User::where(['email'=>$user_email])->first();
            $cartProducts = DB::table('cart')->where(['user_email'=>$user_email])->first();
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
            $order->payment_method = $data['payment_method'];
            $order->grand_total = $data['grand_total'];
            $order->save();
            $user_email = Auth::user()->email;
            DB::table('cart')->where('user_email',$user_email)->delete();
        }
         return redirect('/')->with('flash_message_sucess','تم الحجز بنجاح !');
    }

    public function addCoupon(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $user_id = Auth::user();
            $company = Company::where('user_id',$user_id->id)->first();
            $coupon = new Coupon;
            $coupon->company_id = $company->id;
            $coupon->user_id = $user_id->id;
            $coupon->coupon_code = $data['coupon_code'];
            $coupon->amount = $data['amount'];
            $coupon->amount_type = $data['amount_type'];
            $coupon->expiry_date = $data['expiry_date'];
            if (empty($data['status'])) {
            $data['status'] = '';
            }else{
                $coupon->status = $data['status'];
            }
            
            $coupon->save();
            return redirect()->action('CarController@viewCoupons')->with('flash_message_success', 'Coupon Has Been added Successfully.');
        }
        return view('admin.coupons.add_coupon');     
    }

    public function editCoupon(Request $request ,$id=null){
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $coupon = Coupon::find($id);
            $coupon->coupon_code = $data['coupon_code'];
            $coupon->amount = $data['amount'];
            $coupon->amount_type = $data['amount_type'];
            $coupon->expiry_date = $data['expiry_date'];
            if (empty($data['status'])) {
            $data['status'] = 0;
            }
            $coupon->status = $data['status'];
            $coupon->save();
            return redirect()->action('CarController@viewCoupons')->with('flash_message_success', 'Coupon Has Been Updated Successfully.');
        }


        $couponDetails = Coupon::find($id);
        /*$couponDetails = json_decode(json_encode($couponDetails));
        echo "<pre>"; print_r($couponDetails); die;*/
        return view('admin.coupons.edit_coupon')->with(compact('couponDetails'));
    }

    public function viewCoupons(){
        $user = Auth::user();
        $coupons = Coupon::where('user_id',$user->id)->get();
        return view('admin.coupons.view_coupons')->with(compact('coupons'));
    }

     public function deleteCoupon($id){
        Coupon::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Coupon Has Been deleted Successfully.');

    }

    public function applyCoupon(Request $request){

        Session::forget('CouponAmount');
        Session::forget('CouponCode');

        $data = $request->all();
        //echo "<pre>"; print_r($data); die;
        $user_email = Auth::user()->email;
        $userCart = DB::table('cart')->where(['user_email'=>$user_email])->first();
        //echo "<pre>"; print_r($userCart); die;
        $company_id = Car::where(['id'=>$userCart->car_id])->first();
        //echo "<pre>"; print_r($company_id->company_id); die;
        $couponCount = Coupon::where(['coupon_code'=> $data['coupon_code'],'company_id'=>$company_id->company_id])->count();
        //echo "<pre>"; print_r($couponCount); die;
        if ($couponCount == 0) {
            return redirect()->back()->with('flash_message_success','Coupon does not exits !');
        }else{
            // with perform other checks like Active /Inactive, Expirydate
            // Get Coupon Details
            $couponDetails = Coupon::where('coupon_code', $data['coupon_code'])->first();

            // If coupon is Inactive
            if ($couponDetails->status == 0) {
                return redirect()->back()->with('flash_message_error','This Coupon Is not active !');
            }

            // If coupon IS Expired
            $expiry_date  = $couponDetails->expiry_date;  
            $current_date =  date('Y-m-d');
            if ($expiry_date < $current_date) {
                return redirect()->back()->with('flash_message_error','This Coupon Is expired !');
            }

            // Coupon Is Valid For Discount

            // Get Card Total Amount
            $session_id = Session::get('session_id');
            $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();

             if (Auth::check()) {
            $user_email = Auth::user()->email;
            $userCart = DB::table('cart')->where(['user_email'=>$user_email])->get();
        }else{
            $session_id = Session::get('session_id');
            $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
        }




            $total_amount = 0;
            foreach ($userCart as $item) {
                $total_amount = $total_amount + ($item->price * $item->number_days);
            }

            // Check if amount type is Fixed or Percentage
            if ($couponDetails->amount_type == "Fixed") {
                $couponAmount = $couponDetails->amount;
            }else{
                $couponAmount = $total_amount * ($couponDetails->amount/100);
            }


            // Add Coupon Code  & Amount In Session
            Session::put('CouponAmount', $couponAmount);
            Session::put('CouponCode', $data['coupon_code']);

            return redirect()->back()->with('flash_message_success','Coupon Code Successfuly Applied. You Are Avaling Discount !');
        }   
    }


   public function searchCars(Request $request){
       //return $request->all();
            
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


    
    
        
            
    
        $carDetails = Car::all();
            $companies = Company::all();
            $cars =Car::get();
            return view('car.car_listing')->with(compact('carAll','companies','cars','search_marker','carDetails'));
        
    }
    


    public function viewOrders(Request $request){
        $user = Auth::user();
        $company = Company::where('user_id',$user->id)->first();
        //echo "<pre>"; print_r($company); die;
        //$cars = Car::where('company_id',$company->id)->get();
   // echo "<pre>"; print_r($car); die;
        
        $carsCount = Car::where('company_id',$company->id)->count();
        if ($carsCount >0) {
            $cars = Car::where('company_id',$company->id)->get();
            foreach ($cars as $key => $car) {
            $orders = Order::where('car_id',$car->id)->get();
        }
        }
         
            //echo "<pre>"; print_r($cars); die;

        return view('admin.orders.view_orders')->with(compact('orders','orderss','carsCount'));
    }


        public function deleteCar(Request $request ,$id)
        {
        Car::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'تمت عمليه حذف  السياره بنجاح  ');

    }



    public function addImages(Request $request)
    {
        $images = new images();
        $images->image_name = request('image_name');
        $images->car_id = request('car_id');
       $x= $images->save();

        dd($x);
  
    }
}
