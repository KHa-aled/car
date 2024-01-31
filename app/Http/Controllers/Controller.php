<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Admin;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

           public  function apiResponse($status,$message,$data=null)

            {
                     $response=[
                       'status'=>$status,
                       'message'=>$message,
                       'data'=>$data
                      ];
                      
                 return response()->json($response,200);
            }


    public static  function adminConnect(){
    	$admin = Admin::where(['name'=>Session::get('adminSession')])->get();
    	return $admin;
    }
}
