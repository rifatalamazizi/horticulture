<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        //
    }

    public function show($id)
    {
        $category = Category::find($id);
        /* return view('frontend.pages.category.index', compact('category')); */

        /* If you want to show notification for any notification then write this code here */
        if ($category) {

            return view('frontend.pages.category.index', compact('category'));
            
            return Redirect()->back();
            /* return Redirect()->route('manage.category')->with($notification); */
        }else {

            session()->flash('errors', 'Sorry !! There is no category by this ID ');
            
            return Redirect()->back();
            /* return Redirect()->route('manage.category')->with($notification); */

        }
    }
}
