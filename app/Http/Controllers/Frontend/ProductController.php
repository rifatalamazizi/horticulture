<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function product(){

        // Here call the Product table and fetch all data from this table by --> get() <-- Method and orderby descending
        // desc = new to old / update to old
        $products = Product::orderby('id', 'desc')->paginate(12);
        /* $products = Product::orderby('id', 'desc')->get(); */

        return view('frontend.pages.product.index')->with('products',$products);
        /* return view('frontend.pages.product.index',compact('products')); */

    }

    public function show($slug){
    
        $product = Product::where('slug', $slug)->first();

        return view('frontend.pages.product.show',compact('product'));
        
        if (!is_null($product)) {

            return view('frontend.pages.product.show',compact('product'));
            
            /* $notification = array(
                'message' => 'Product Founed successfully!',
                'alert-type' => 'success'
            ); */
            
            /* return Redirect()->route()->with($notification); */
            /* return Redirect()->back('create')->with($notification); */
        }else {

            /* $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            ); */
            /* session()->flash('errors', 'Sorry !! There is no product by this URL..'); */
            return Redirect()->route('product')->with($notification);
            /* return Redirect()->back('create')->with($notification); */

        }
    
    }
}