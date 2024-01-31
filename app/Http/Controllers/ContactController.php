<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUS;
use App\Company;
use App\Car;
use Mail;

class ContactController extends Controller
{

  public function contactUS(Request $request){
    if ($request->isMethod('post')) {
      $data = $request->all();
      // echo "<pre>";print_r($data);die;
      // send Concact Email
      $email = "mohm4325@gmail.com";
      $messageData = array(
        'name'=>$data['name'],
        'email'=>$data['email'],
        'subject'=>$data['subject'],
        'comment'=>$data['message'],
      );
      Mail::send('emails.comment', $messageData, function($message) use ($email){
        $message->to($email);
        $message->subject('subject');
      });
            return redirect()->back()->with('flash_message_success','تم ارسال رسالتك بنجاح');
    }
    $carDetails = Car::all();
    $companies = Company::get();
    $cars =Car::orderBy('id', 'desc')->paginate(4);
    return view('contactus')->with(compact('companies','cars','carDetails'));
  }

}
