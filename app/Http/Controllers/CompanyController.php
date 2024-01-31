<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Company;
use Image;
use App\Notifications\NewFollower;
use App\User;
use App\Addation;
use Auth;

class CompanyController extends Controller
{
    public function addCompany(Request $request){
    	if ($request->isMethod('post')) {
    		$data = $request->all();
    		//echo "<pre>"; print_r($data); die;
    		$Company = new Company;
    		$Company->name =$data['name'];
    		$Company->address =$data['address'];
    		$Company->details =$data['details'];
    		// Upload Image
            if($request->hasFile('logo')){
                $image_tmp = Input::file('logo');
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
                    $Company->logo = $filename;
                }
            }
    		$Company->save();
            return redirect('admin/view-companies')->with('flash_message_success', 'company added Successfully');
    	}
    	return view('admin.company.add_company');
    }

    public function editCompany(Request $request, $id=null ){

        if ($request->isMethod('post')) {
            $data = $request->all();

          // Upload Image
            if($request->hasFile('logo')){
                $image_tmp = Input::file('logo');
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

            Company::where(['id'=>$id])->update(['name'=>$data['name'],'address'=>$data['address'],'details'=>$data['details'],'logo'=>$filename]);
            return redirect()->back()->with('flash_message_success','Company Has Been Update Successfuly');
        }
        // Get Products Details

        $companyDetails = Company::where(['id'=>$id])->first();

        return view('admin.company.edit_company')->with(compact('companyDetails'));
    }

    public function viewCompanies(){
        $companies = Company::get();
        return view('admin.company.view_companies')->with(compact('companies'));
    }

    public function deleteCompany($id= null){

        Company::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Company Has Been Deleted Successfuly');
    }

    public function sendMassage($id= null){
    $user = Auth::user();
    $user->notify(new NewFollower(User::findOrFail($id)));
        foreach (Auth::user()->unreadNotifications as $notification) {
            //dd($notification);
            $notification->markAsRead();
        }
    }

    public function addation(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $user_email = Auth::user();
            $company = Company::where('user_id',$user_email->id)->first();
            $addationCount = Addation::where('user_email',$user_email->email)->count();
            //echo "<pre>"; print_r($addationCount); die;
            if ($addationCount > 0) {
                 Addation::where('user_email',$user_email->email)->update(['provide_driver'=>$data['provide_driver'],'additional_driver'=>$data['additional_driver'],'age_driver'=>$data['age_driver'],'add_insurance'=>$data['add_insurance'],'connect_car_place'=>$data['connect_car_place'],'tax'=>$data['tax'],'company_id'=>$company->id,'user_email'=>$user_email->email]);
            }else{
                $addation = new Addation;
                $addation->provide_driver =$data['provide_driver'];
                $addation->additional_driver =$data['additional_driver'];
                $addation->age_driver =$data['age_driver'];
                $addation->add_insurance =$data['add_insurance'];
                $addation->connect_car_place =$data['connect_car_place'];
                $addation->tax =$data['tax'];
                $addation->company_id =$company->id;
                $addation->user_email =$user_email->email;
                $addation->save();
            }
        }
        $user_email = Auth::user();
        $addation = Addation::where('user_email',$user_email->email)->first();
        return view('admin.company.addation')->with(compact('addation'));    
    }


}


