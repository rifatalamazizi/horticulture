<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Models\Cart;
use App\Models\Payment;

class Order extends Model
{
    protected $fillable = [
        'user_id', 
        'payment_id', 
        'ip_address', 
        'name', 
        'phone_no', 
        'shipping_address',
        'shipping_charge',
        'custom_discount',
        'email', 'message', 
        'is_paid', 
        'is_completed', 
        'is_seen_by_admin', 
        'transaction_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    /* public function carts()
    {
        return $this->belongsTo(Cart::class);
    } */

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
