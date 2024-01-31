<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function admin(){
    	return $this->belongsTo('App\Admin','id');
    }
}
