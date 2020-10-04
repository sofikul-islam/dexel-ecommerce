<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_deteils extends Model
{
    protected $fillable = [
        'order_id','','product_id','product_name','product_price','product_image','product_quantity'
   ];
}
