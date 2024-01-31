<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model 
{

    protected $table = 'companies';
    public $timestamps = true;
    protected $fillable = array('name', 'logo', 'address', 'details');


    public function company()
    {
        return $this->hasMany('App\Car');
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }


}