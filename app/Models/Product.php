<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\ProductImage;

class Product extends Model
{
    protected $fillable = [
        'title', 
        'description', 
        
        'quantity', 
        'price', 
        
        'offer_price',
        'slug', 
        
        /* 'status', */
        'category_id', 
        'brand_id',
        'admin_id',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class); // This is for multiple images show
    }

    public function singleImage()
    {
        return $this->hasOne(ProductImage::class);  // This is for single image show and you have to must use for single product view.
    }

    /**
     * 
     * ------------------------------------------------------------------------------------------
     * SHORT NOTE : This two functions are must need for product select category and select brand
     * ------------------------------------------------------------------------------------------
     * 
    **/
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    
}
