<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'product_name', 'product_category_id', 'short_description','long_description','price','publication_status'
    ];
}
