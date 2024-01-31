<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Company;
use App\Comment;
use App\User;
use App\Addation;
use Auth;
class PostController extends Controller
{


    public function index()
    {
        $user = Auth::user() ;
          // dd($user);
        if ($user->id == 9) {
   
              $posts= Post::all();
            }
        else
        {
         $company = Company::where('user_id',$user->id)->first();
         $posts= Post::where('company_id',$company->id)->get();

        }

        // $company = Company::where('user_id',$user->id)->first();
      //   dd($company);
         //  $posts = json_encode(json_decode($posts));
           // echo "<pre>"; print_r($posts); die;
          return view('admin.posts.index',compact('posts'));
    }


    public function createPost()
    {

        $companies = Company::All();
    	return view('admin.posts.create',compact('companies'));
    }

    public function storePost(Request $request)
    {
    	 $this->validate($request, [
            'company_id' => 'required',
            'title' => 'required',
	    	'body'=>'required',
        ]);
 
        Post::create($request->all());
        
       return back()->with('success', 'تم  ارسال   المهمه  بنجاح');
    }


    public function showPost(Request $request ,$id)
    {
        $showPost = Post::find($id);
       return view('admin.posts.show',compact('showPost'));

    }

}
