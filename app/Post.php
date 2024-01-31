<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
class Post extends Model
{
        protected $fillable = array('company_id', 'title', 'body');
        public $timestamps = false;

  public function comments()
  {
  	 return $this->hasMany(Comment::class);
  }

}
