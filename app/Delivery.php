<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model 
{

    protected $table = 'deliveries';
    public $timestamps = true;
    protected $fillable = array('receiving_address', 'receiving_date', 'return_car', 'delivery_address', 'delivery_date', 'delivery_time', 'car_place', 'client_id', 'company_id');

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

}