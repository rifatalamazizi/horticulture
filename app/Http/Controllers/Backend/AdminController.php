<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Product;
use App\Models\ProductImage;
use Image;

class AdminController extends Controller
{
    public function __construct()
    {
        /* $this->middleware('auth:web'); */
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('backend.pages.index');
    }
}
