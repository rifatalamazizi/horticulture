<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Image;
use Str;

class ProductController extends Controller
{
    public function __construct()
    {
        /* $this->middleware('auth:web'); */
        $this->middleware('auth:admin');
    }

    public function index() // For displaying all products
    {
        $products = Product::orderBy('id','desc')->get();
        return view('backend.pages.product.index',compact('products'));
    }

    public function create()
    {
        return view('backend.pages.product.create');
    }

    public function store(Request $request)
    {

        /* Always remember that [ VALIDATION ] code will be before [ INSERTING DATA ] */
        /* Form VALIDATION */
        $validatedData = $request->validate([
            /* 'name' = comes from db-column name */
            /** 
             * 1-> categories = table name 
             * 2-> required = you have to must insert
             * 3-> unique = one name one time you can't put same name for another time
             * 4-> max = maximum 25 character
             * 5-> min = minimum 4 character
             **/
            'title' => 'required|max:45|min:4',
            'description' => 'required|max:1000|min:10',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
        ]);
        /* END OF Form VALIDATION */
        
        // Call Product model for storing data into DB which you have taken from your form page.
        $product = new Product;

        $product->title = $request->title;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        /* $product->status = $request->status; */      // If you make it open then you must put value.
        $product->offer_price = $request->offer_price;

        // str_slug function will generate a slug from your title for your url.
        $product->slug = Str::slug($request->title);

        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->admin_id = 1;

        $product->save();
        
        // Single Image Upload
        // ProductImage Model insert image
        // product_image --> comes from create.blade.php form page.
        if ($image=$request->hasFile('product_image')) {
            
            // Insert that Image
            $image = $request->file('product_image');
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/frontend/assets/images/products/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            // Call ProductImage model for storing data into DB which you have taken from your form page.
            // same as storing method.
            $product_image = new ProductImage;
            $product_image->product_id = $product->id;
            $product_image->image = $image_full_name;

            $product_image->save();

            
            //------------------------------
            // Insert that Image
            //$image = $request->file('product_image');
            // when we found one image then it has to be naming by time and image extension and keep it in any variable.
            //$img = time(). '.' .$image->getClientOriginalExtension();
            //$location = public_path('frontend/images/home'. $img);
            //Image::make($image)->save($location); // here image will save.
            //------------------------------

        }

        /**
         * ====================
         * PROBLEM IS NOT FIXED
         * ====================
         */
        //Multiple Image Upload
        /* if (count([$request->product_image]) > 0) {
                
            foreach ($request->product_image as $image) {
                
                // Insert that Image
                $image = $request->file('product_image');
                $image_name=hexdec(uniqid());
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/frontend/images/home/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);

            }

        } */

        /* If you want to show notification for any notification then write this code here */
        if ($product) {

            $notification = array(
                'message' => 'Product created successfully!',
                'alert-type' => 'success'
            );
            
            return Redirect()->back()->with($notification);
            /* return Redirect()->route('create')->with($notification); */
        }else {

            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            
            return Redirect()->back()->with($notification);
            /* return Redirect()->route('create')->with($notification); */

        }
    }

    public function edit($id)
    {
        /* $products = Product::findorfail(); */
        $product = Product::find($id);
        return view('backend.pages.product.edit',compact('product'));
        /* return view('backend.pages.product.create')->with('products',$product); */
    }

    public function update(Request $request,$id)
    {

        /* Always remember that [ VALIDATION ] code will be before [ INSERTING DATA ] */
        /* Form VALIDATION */
        $validatedData = $request->validate([
            /* 'name' = comes from db-column name */
            /** 
             * 1-> categories = table name 
             * 2-> required = you have to must insert
             * 3-> unique = one name one time you can't put same name for another time
             * 4-> max = maximum 25 character
             * 5-> min = minimum 4 character
             **/
            'title' => 'required|max:45|min:4',
            'description' => 'required|max:1000|min:10',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            /* 'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric', */
            'image' => 'nullable|image',
        ]);
        /* END OF Form VALIDATION */
        
        // Call Product model for storing data into DB which you have taken from your form page.
        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        /* $product->status = $request->status; */      // If you make it open then you must put value.
        $product->offer_price = $request->offer_price;

        // str_slug function will generate a slug from your title for your url.
        $product->slug = Str::slug($request->title);

        /* $product->category_id = 1;
        $product->brand_id = 1; */
        // First this section don't need to update
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->admin_id = 1;

        $product->save();
        
        // Single Image Upload
        // ProductImage Model insert image
        // product_image --> comes from create.blade.php form page.
        if ($image=$request->hasFile('product_image')) {

            // Insert that Image
            $image = $request->file('product_image');
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/frontend/assets/images/products/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            // Call ProductImage model for storing data into DB which you have taken from your form page.
            // same as storing method.
            $product_image = new ProductImage;
            $product_image->product_id = $product->id;
            $product_image->image = $image_full_name;
            $product_image->save();

            
            //------------------------------
            // Insert that Image
            //$image = $request->file('product_image');
            // when we found one image then it has to be naming by time and image extension and keep it in any variable.
            //$img = time(). '.' .$image->getClientOriginalExtension();
            //$location = public_path('frontend/images/home'. $img);
            //Image::make($image)->save($location); // here image will save.
            //------------------------------

        }

        /**
         * ====================
         * PROBLEM IS NOT FIXED
         * ====================
         */
        //Multiple Image Upload
        /* if (count([$request->product_image]) > 0) {
                
            foreach ($request->product_image as $image) {
                
                // Insert that Image
                $image = $request->file('product_image');
                $image_name=hexdec(uniqid());
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/frontend/images/home/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);

            }

        } */

        /* If you want to show notification for any notification then write this code here */
        if ($product) {

            $notification = array(
                'message' => 'Product updated successfully!',
                'alert-type' => 'success'
            );
            
            return Redirect()->route('admin.product.manage')->with($notification);
            /* return Redirect()->route('create')->with($notification); */
        }else {

            $notification = array(
                'message' => 'Nothing to change!',
                'alert-type' => 'warning'
            );
            
            return Redirect()->route('admin.product.manage')->with($notification);
            /* return Redirect()->route('create')->with($notification); */

        }
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        /* If you want to show notification for any notification then write this code here */
        if ($product) {

            $notification = array(
                'message' => 'Product deleted successfully!',
                'alert-type' => 'success'
            );
            
            return Redirect()->back()->with($notification);
        }else {

            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            
            return Redirect()->back()->with($notification);

        }

        //Delete all images
        foreach ($product->images as $img) {
                        
            //Delete from path
            $file_name = $img->image;
            if (file_exists("public/frontend/assets/images/products/".$file_name)) {
                unlink("public/frontend/assets/images/products/".$file_name);
            }

            $img->delete();

        }
    }

    public function show($id){

        $product = Product::find($id);
        return view('backend.pages.product.show',compact('product'));

    }
}