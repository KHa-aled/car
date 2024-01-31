<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company_days extends Model 
{

    protected $table = 'company_day';
    public $timestamps = true;
    protected $fillable = array('company_id', 'day_id', 'start', 'end');

}