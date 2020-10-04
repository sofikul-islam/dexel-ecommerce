<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $fillable = [
         'checkout_id','shepping_id','total_price','payment_type','order_status','payment_status'
    ];
}
