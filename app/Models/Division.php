<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Districts;

class Division extends Model
{
    protected $fillable = [
        'name', 
        'priority',
    ];

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
