<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Category;

class Category extends Model
{
    protected $fillable = [
        'name', 
        'description', 
        'image', 
        'parent_id',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /* When you will search product by category then use it */

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /* This is for showing category selected product after refresh but not fixed yet */
    public static function ParentOrNotCategory($parent_id, $child_id)
    {
        $categories = Category::where('id',$child_id)->where('parent_id',$parent_id)->get();

        if (!is_null($categories)) {
            
            return true;

        }else{

            return false;

        }
    }
    
}
