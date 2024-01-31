<?php

namespace App;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

		public $fillable = ['id','body','post_id'];
		 public $timestamps = false;

      public function comments()
  {
  	 return $this->belongsTo('Post');
  }
}
