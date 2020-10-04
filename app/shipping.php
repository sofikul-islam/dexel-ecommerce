<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shipping extends Model
{
    protected $fillable = [
        'full_name', 'email', 'phone','address'
    ];
}
