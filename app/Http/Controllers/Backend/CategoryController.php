<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        /* $this->middleware('auth:web'); */
        $this->middleware('auth:admin');
    }

    public function index() // For displaying all categories
    {
        $categories = Category::orderBy('id','desc')->get();
        return view('backend.pages.category.index',compact('categories'));
    }

    public function create()
    {
        // Here call the Product table and fetch all data from this table by --> get() <-- Method and orderby descending
        // desc = new to old / update to old
        $categories = Category::orderby('id','desc')->where('parent_id',NULL)->get();
        /* return view('frontend.pages.product.all_product',compact('products')); */
        return view('backend.pages.category.create',compact('categories'));
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
            'name' => 'required|max:45|min:4',
            'description' => 'required|max:1000|min:10',
            'image' => 'nullable|image',

            'name.required' => 'Please provide a category Name',
            'image.image' => 'Please provide a valid image with .jpg, .png, .gif, .jpeg extension',
        ]);
        /* END OF Form VALIDATION */
        
        // Call Product model for storing data into DB which you have taken from your form page.
        $category = new Category();

        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $request->category_image;
        $category->parent_id = $request->parent_id;
        
        $category->save();
        
        // Single Image Upload
        // ProductImage Model insert image
        // product_image --> comes from create.blade.php form page.
        if ($image=$request->hasFile('category_image')) {
            
            // Insert that Image
            $image = $request->file('category_image');
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/frontend/assets/images/category/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            $category->image = $image_full_name;
            $category->save();

        }

        /* If you want to show notification for any notification then write this code here */
        if ($category) {

            $notification = array(
                'message' => 'Category created successfully!',
                'alert-type' => 'success'
            );
            
            return Redirect()->back()->with($notification);
            /* return Redirect()->route('manage.category')->with($notification); */
        }else {

            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            
            return Redirect()->back()->with($notification);
            /* return Redirect()->route('manage.category')->with($notification); */

        }
    }

    public function edit($id)
    {
        $categories = Category::orderBy('name', 'desc')->where('parent_id',NULL)->get();

        $category = Category::find($id);
        return view('backend.pages.category.edit',compact('category','categories'));
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
            'name' => 'required|max:45|min:4',
            'description' => 'required|max:1000|min:10',
            'image' => 'nullable|image',

            'name.required' => 'Please provide a category Name',
            'image.image' => 'Please provide a valid image with .jpg, .png, .gif, .jpeg extension',
        ]);
        /* END OF Form VALIDATION */
        
        // Call Product model for storing data into DB which you have taken from your form page.
        $category = Category::find($id);

        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $request->category_image;
        $category->parent_id = $request->parent_id;
        
        $category->save();
        
        // Single Image Upload
        // ProductImage Model insert image
        // product_image --> comes from create.blade.php form page.
        if ($image=$request->hasFile('category_image')) {

            // Insert that Image
            $image = $request->file('category_image');
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/frontend/assets/images/category/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            $category->image = $image_full_name;
            $category->save();

        }

        /* If you want to show notification for any notification then write this code here */
        if ($category) {

            $notification = array(
                'message' => 'Category updated successfully!',
                'alert-type' => 'success'
            );
            
            return Redirect()->route('admin.category.manage')->with($notification);
            /* return Redirect()->route('manage.category')->with($notification); */
        }else {

            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            
            return Redirect()->route('admin.category.manage')->with($notification);
            /* return Redirect()->route('manage.category')->with($notification); */

        }
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        if ($category->parent_id == NULL ) {
            // Delete sub categories
            $sub_categories = Category::orderBy('name', 'desc')->where('parent_id',$category->id)->get();

            foreach ($sub_categories as $sub) {
                $sub->delete();
            }
        }

        /* If you want to show notification for any notification then write this code here */
        if ($category) {

            $notification = array(
                'message' => 'Category deleted successfully!',
                'alert-type' => 'success'
            );
            
            return Redirect()->route('admin.category.manage')->with($notification);
        }else {

            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            
            return Redirect()->route('admin.category.manage')->with($notification);

        }
    }


    public function show($id){

        $category = Category::find($id);
        return view('backend.pages.category.show',compact('category'));

    }
}