<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Company;
use App\About;

class AboutUs extends Controller
{
    public function aboutUs(Request $request){
    if ($request->isMethod('post')) {
      $data = $request->all();
      //echo "<pre>";print_r($data);die;

      $whoare = new About;
      $whoare->ar_titel =$data['ar_titel'];
      $whoare->en_titel =$data['en_titel'];
      $whoare->ar_description =$data['ar_description'];
      $whoare->en_description =$data['en_description'];
      $whoare->save();
      return redirect()->back()->with('flash_message_success', 'تم التحديث بنجاح');
    }
    return view('admin.whoare');
  }
  
  
  
  //=========================================================front========
     public function about()
     {
          $carDetails = Car::all();
         $cars =Car::orderBy('id', 'desc')->paginate(4);
          $companies = Company::get();
          $abouts = About::get();
     	 return view('about-us')->with(compact('cars','companies','carDetails','abouts'));
     }
}
