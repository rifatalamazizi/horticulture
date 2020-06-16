<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Slider;

class PagesController extends Controller
{
    public function index(){

        /* $sliders = Slider::orderby('priority', 'asc')->paginate(3); */
        $sliders = Slider::orderby('priority', 'asc')->get();
        // Here call the Product table and fetch all data from this table by --> get() <-- Method and orderby descending
        // desc = new to old / update to old
        $products = Product::orderby('id', 'desc')->paginate(8);
        /* $products = Product::orderby('id', 'desc')->get(); */

        return view('frontend.pages.index',compact('products', 'sliders'));  // When you call slider then use it
        /* return view('frontend.pages.index',compact('products')); */ // When you didn't call slider then use it

    }

    public function search(Request $request)
    {
        $search = $request->search;
        // Here call the Product table and fetch all data from this table by --> get() <-- Method and orderby descending
        // desc = new to old / update to old

        /* orWhere('title', 'like', '%' . $search . '%') -> this method search front & back all project elements */
        $products = Product::orWhere('title', 'like', '%' . $search . '%')
        ->orWhere('description', 'like', '%' . $search . '%')
        ->orWhere('slug', 'like', '%' . $search . '%')
        ->orWhere('price', 'like', '%' . $search . '%')
        ->orWhere('quantity', 'like', '%' . $search . '%')
        ->orWhere('category_id', 'like', '%' . $search . '%')
        ->orWhere('brand_id', 'like', '%' . $search . '%')
        ->orderby('id', 'desc')
        ->paginate(12);
        /* $products = Product::orderby('id', 'desc')->get(); */

        return view('frontend.pages.product.search', compact('search' , 'products'));
        /* return view('frontend.pages.product.index',compact('products')); */
    }

    
}
