<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title', 
        'image', 
        'button_text',
        'button_link', 
        'priority',
    ];
}
