<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Brand;
use File;

class BrandController extends Controller
{
    public function __construct()
    {
        /* $this->middleware('auth:web'); */
        $this->middleware('auth:admin');
    }

    public function index()
    {
        // Here call the Product table and fetch all data from this table by --> get() <-- Method and orderby descending
        // desc = new to old / update to old
        $brands = Brand::orderBy('id', 'desc')->get();
        /* return view('frontend.pages.product.all_product',compact('products')); */
        return view('backend.pages.brand.index',compact('brands'));
    }

    public function create()
    {
        return view('backend.pages.brand.create');
    }

    public function store(Request $request)
    {

        /* Always remember that [ VALIDATION ] code will be before [ INSERTING DATA ] */
        /* Form VALIDATION */
        $validatedData = $request->validate([
            /* 'name' = comes from db-column name */
            /** 
             * 1-> brands = table name 
             * 2-> required = you have to must insert
             * 3-> unique = one name one time you can't put same name for another time
             * 4-> max = maximum 25 character
             * 5-> min = minimum 4 character
             **/
            'name' => 'required|max:45|min:4',
            'description' => 'required|max:1000|min:10',
            'image' => 'nullable|image',

            'name.required' => 'Please provide a brand Name',
            'image.image' => 'Please provide a valid image with .jpg, .png, .gif, .jpeg extension',
        ]);
        /* END OF Form VALIDATION */
        
        // Call Product model for storing data into DB which you have taken from your form page.
        $brand = new Brand();

        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->image = $request->brand_image;
        
        $brand->save();
        
        // Single Image Upload
        // ProductImage Model insert image
        // product_image --> comes from create.blade.php form page.
        if ($image=$request->hasFile('brand_image')) {
            
            // Insert that Image
            $image = $request->file('brand_image');
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/frontend/assets/images/brands/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            $brand->image = $image_full_name;
            $brand->save();

        }

        /* If you want to show notification for any notification then write this code here */
        if ($brand) {

            $notification = array(
                'message' => 'Brand created successfully!',
                'alert-type' => 'success'
            );
            
            return Redirect()->back()->with($notification);
            /* return Redirect()->route('manage.brand')->with($notification); */
        }else {

            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            
            return Redirect()->back()->with($notification);
            /* return Redirect()->route('manage.brand')->with($notification); */

        }
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('backend.pages.brand.edit',compact('brand'));
        /* return view('backend.pages.product.create')->with('products',$product); */
    }

    public function update(Request $request,$id)
    {

        /* Always remember that [ VALIDATION ] code will be before [ INSERTING DATA ] */
        /* Form VALIDATION */
        $validatedData = $request->validate([
            /* 'name' = comes from db-column name */
            /** 
             * 1-> brands = table name 
             * 2-> required = you have to must insert
             * 3-> unique = one name one time you can't put same name for another time
             * 4-> max = maximum 25 character
             * 5-> min = minimum 4 character
             **/
            'name' => 'required|max:45|min:4',
            'description' => 'required|max:1000|min:10',
            /* 'image' => 'nullable|image', */
            'image' => 'image',

            'name.required' => 'Please provide a brand Name',
            'image.image' => 'Please provide a valid image with .jpg, .png, .gif, .jpeg extension',
        ]);
        /* END OF Form VALIDATION */
        
        // Call Product model for storing data into DB which you have taken from your form page.
        $brand = Brand::find($id);

        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->image = $request->brand_image;
        
        $brand->save();
        
        // Single Image Upload
        // ProductImage Model insert image
        // product_image --> comes from create.blade.php form page.
        if ($image=$request->hasFile('brand_image')) {

            // Insert that Image
            $image = $request->file('brand_image');
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/frontend/assets/images/brands/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            
            $brand->image = $image_full_name;
            $brand->save();

            /* Problem not fixed for deleting exist photo

            if(file_exists('frontend/images/brands/'. $brand->image)){

                delete('frontend/images/brands/'. $brand->image);

            }; */
        }

        /* If you want to show notification for any notification then write this code here */
        if ($brand) {

            $notification = array(
                'message' => 'Product updated successfully!',
                'alert-type' => 'success'
            );
            
            return Redirect()->route('admin.brand.manage')->with($notification);
        }else {

            $notification = array(
                'message' => 'Nothing to change!',
                'alert-type' => 'error'
            );
            
            return Redirect()->route('admin.brand.manage')->with($notification);

        }
    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        

        /* If you want to show notification for any notification then write this code here */
        if ($brand) {

            $brand->delete();
            $notification = array(
                'message' => 'Brand deleted successfully!',
                'alert-type' => 'success'
            );
            
            return Redirect()->route('admin.brand.manage')->with($notification);
        }else {

            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            
            return Redirect()->route('admin.brand.manage')->with($notification);

        }
    }

    public function show($id)
    {
        $brand = Brand::find($id);
        return view('backend.pages.brand.show',compact('brand'));
    }
}