<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marker extends Model 
{

    protected $table = 'markers';
    public $timestamps = true;
    protected $fillable = array('name');

}