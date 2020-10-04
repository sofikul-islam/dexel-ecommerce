<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class checkout extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email','phone','password','address'
    ];
}
