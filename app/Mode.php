<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mode extends Model 
{

    protected $table = 'modes';
    public $timestamps = true;
    protected $fillable = array('name');

}