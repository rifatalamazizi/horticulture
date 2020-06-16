<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'name', 
        'image', 
        'priority',
        'short_name', 
        'no', 
        'type',
    ];
}
