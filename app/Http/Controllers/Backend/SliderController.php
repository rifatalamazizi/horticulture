<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Slider;

use Image;
use File;

class SliderController extends Controller
{
    public function __construct()
    {
        /* $this->middleware('auth:web'); */
        $this->middleware('auth:admin');
    }

/*     public function create()
    {
        return view('backend.pages.slider.create');
    } */

    public function store(Request $request)
    {

        /* Always remember that [ VALIDATION ] code will be before [ INSERTING DATA ] */
        /* Form VALIDATION */
        $validatedData = $request->validate([
            /* 'name' = comes from db-column name */
            /** 
             * 1-> sliders = table name 
             * 2-> required = you have to must insert
             * 3-> unique = one name one time you can't put same name for another time
             * 4-> max = maximum 25 character
             * 5-> min = minimum 4 character
             **/
            'title' => 'required|max:45|min:4',
            'image' => 'required|image',
            'priority'  => 'required',
            'button_link' => 'nullable|url',
        ],

        [
            'title.required'  => 'Please provide a slider title',
            'priority.required'  => 'Please provide a slider priority',
            'image.required'  => 'Please provide a slider image',
            'image.required'  => 'Please provide a valid slider image',
            'button_link.url'  => 'Please provide a valid slider button link',
        ]);
        /* END OF Form VALIDATION */
        
        // Call Product model for storing data into DB which you have taken from your form page.
        $slider = new Slider();

        $slider->title = $request->title;
        $slider->image = $request->image;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->priority = $request->priority;
        
        $slider->save();

        // Single Image Upload
        // ProductImage Model insert image
        // product_image --> comes from create.blade.php form page.
        if ($image=$request->hasFile('image')) {
            
            // Insert that Image
            $image = $request->file('image');
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/backend/images/sliders/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            $slider->image = $image_full_name;
            $slider->save();

        }

        /* IF YOU WANT TO SHOW FLASH MESSAGE THEN USE THIS TWO CODES */
        /* session()->flash('success', 'A new slider has added successfully !!');
        return redirect()->back(); */

        /* OR you can use sweet alert */

        /* If you want to show notification for any notification then write this code here */
        if ($slider) {

            $notification = array(
                'message' => 'Slider created successfully!',
                'alert-type' => 'success'
            );
            
            return Redirect()->back()->with($notification);
            /* return Redirect()->route('manage.slider')->with($notification); */
        }else {

            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            
            return Redirect()->back()->with($notification);
            /* return Redirect()->route('manage.slider')->with($notification); */

        }
    }

    public function manage()// Show all items
    {
        // Here call the Slider table and fetch all data from this table by --> get() <-- Method and orderby descending
        // desc = new to old / update to old
        $sliders = Slider::orderBy('priority', 'asc')->get();
        /* return view('frontend.pages.product.all_product',compact('products')); */
        return view('backend.pages.slider.index',compact('sliders'));
    }

    /* public function edit($id)
    {
        $slider = Slider::find($id);
        return view('backend.pages.slider.edit',compact('slider'));
    } */

    public function update(Request $request,$id)
    {

        /* Always remember that [ VALIDATION ] code will be before [ INSERTING DATA ] */
        /* Form VALIDATION */
        $validatedData = $request->validate([
            /* 'name' = comes from db-column name */
            /** 
             * 1-> sliders = table name 
             * 2-> required = you have to must insert
             * 3-> unique = one name one time you can't put same name for another time
             * 4-> max = maximum 25 character
             * 5-> min = minimum 4 character
             **/
            'title' => 'required',
            'image' => 'nullable|image',
            'priority'  => 'required',
            'button_link' => 'nullable|url',
        ],

        [
            'title.required'  => 'Please provide a slider title',
            'priority.required'  => 'Please provide a slider priority',
            'image.image'  => 'Please provide a valid slider image',
            'button_link.url'  => 'Please provide a valid slider button link',
        ]);
        /* END OF Form VALIDATION */
        
        // Call Product model for storing data into DB which you have taken from your form page.
        $slider = Slider::find($id);

        $slider->title = $request->title;
        /* $slider->image = $request->image; */ // if it is uncomment then after edit your image don't show.
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->priority = $request->priority;
        
        $slider->save();

        // Single Image Upload
        // ProductImage Model insert image
        // product_image --> comes from create.blade.php form page.
        if ($image=$request->hasFile('image')) {
            
            // Insert that Image
            $image = $request->file('image');
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/backend/images/sliders/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            $slider->image = $image_full_name;
            $slider->save();

        }

        /* IF YOU WANT TO SHOW FLASH MESSAGE THEN USE THIS TWO CODES */
        /* session()->flash('success', 'A new slider has added successfully !!');
        return redirect()->route('admin.slider.manage'); */

        //OR use under code tweester alert

        /* If you want to show notification for any notification then write this code here */
        if ($slider) {

            $notification = array(
                'message' => 'Product updated successfully!',
                'alert-type' => 'success'
            );
            
            return Redirect()->route('admin.slider.manage')->with($notification);
        }else {

            $notification = array(
                'message' => 'Nothing to change!',
                'alert-type' => 'error'
            );
            
            return Redirect()->route('admin.slider.manage')->with($notification);

        }
    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        $slider->delete();

        /* If you want to show notification for any notification then write this code here */
        if ($slider) {

            $notification = array(
                'message' => 'Slider deleted successfully!',
                'alert-type' => 'success'
            );
            
            return Redirect()->route('admin.slider.manage')->with($notification);
        }else {

            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            
            return Redirect()->route('admin.slider.manage')->with($notification);

        }
    }

    public function show($id)
    {
        $slider = Slider::find($id);
        return view('backend.pages.slider.show',compact('slider'));
    }
}