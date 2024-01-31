<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
class CommentsController extends Controller
{

    public function storeComment(Request $request ,$id)
    
    {
    		 $this->validate($request, [
            'body' => 'required',
            
        ]);
 
    	 Comment::create([
    	 	'body' =>Request('body'),
    	 	'post_id' =>$id,
    	 ]);
        
       return back()->with('success', 'تم اضافه  تعليق بنجاح ');
    }
}
