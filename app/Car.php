<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model 
{

    protected $table = 'cars';
    public $timestamps = true;


    public function marker()
    {
        return $this->belongsTo('App\Marker');
    }

    public function mode()
    {
        return $this->belongsTo('App\Mode');
    }

      public function company()
    {
        return $this->belongsTo('App\Company');
    }


       public function rating()
    {
        return $this->hasMany('App\Rating');
    }

}