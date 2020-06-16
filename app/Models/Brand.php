<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name', 
        'description', 
        'image',
    ];

    /* When you will search product by brand then use it */

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
