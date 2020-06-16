<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\District;
use App\Models\Division;

class DivisionController extends Controller
{
    public function __construct()
    {
        /* $this->middleware('auth:web'); */
        $this->middleware('auth:admin');
    }

    public function index()// Show all items
    {
        // Here call the Division table and fetch all data from this table by --> get() <-- Method and orderby descending
        // desc = new to old / update to old
        $divisions = Division::orderBy('priority', 'asc')->get();
        /* return view('frontend.pages.product.all_product',compact('products')); */
        return view('backend.pages.division.index',compact('divisions'));
    }

    public function create()
    {
        return view('backend.pages.division.create');
    }

    public function store(Request $request)
    {

        /* Always remember that [ VALIDATION ] code will be before [ INSERTING DATA ] */
        /* Form VALIDATION */
        $validatedData = $request->validate([
            /* 'name' = comes from db-column name */
            /** 
             * 1-> divisions = table name 
             * 2-> required = you have to must insert
             * 3-> unique = one name one time you can't put same name for another time
             * 4-> max = maximum 25 character
             * 5-> min = minimum 4 character
             **/
            'name' => 'required|max:45|min:4',
            'priority'  => 'required',
        ],

        [
            'name.required'  => 'Please provide a division name',
            'priority.required'  => 'Please provide a division priority', 
        ]);
        /* END OF Form VALIDATION */
        
        // Call Product model for storing data into DB which you have taken from your form page.
        $division = new Division();

        $division->name = $request->name;
        $division->priority = $request->priority;
        
        $division->save();

        /* IF YOU WANT TO SHOW FLASH MESSAGE THEN USE THIS TWO CODES */
        /* session()->flash('success', 'A new division has added successfully !!');
        return redirect()->back(); */

        /* OR you can use sweet alert */

        /* If you want to show notification for any notification then write this code here */
        if ($division) {

            $notification = array(
                'message' => 'Division created successfully!',
                'alert-type' => 'success'
            );
            
            return Redirect()->back()->with($notification);
            /* return Redirect()->route('manage.division')->with($notification); */
        }else {

            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            
            return Redirect()->back()->with($notification);
            /* return Redirect()->route('manage.division')->with($notification); */

        }
    }

    public function edit($id)
    {
        $division = Division::find($id);
        return view('backend.pages.division.edit',compact('division'));
        /* return view('backend.pages.product.create')->with('products',$product); */
    }

    public function update(Request $request,$id)
    {

        /* Always remember that [ VALIDATION ] code will be before [ INSERTING DATA ] */
        /* Form VALIDATION */
        $validatedData = $request->validate([
            /* 'name' = comes from db-column name */
            /** 
             * 1-> divisions = table name 
             * 2-> required = you have to must insert
             * 3-> unique = one name one time you can't put same name for another time
             * 4-> max = maximum 25 character
             * 5-> min = minimum 4 character
             **/
            'name' => 'required|max:45|min:4',
            'priority'  => 'required',
        ],

        [
            'name.required'  => 'Please provide a division name',
            'priority.required'  => 'Please provide a division priority',  
        ]);
        /* END OF Form VALIDATION */
        
        // Call Product model for storing data into DB which you have taken from your form page.
        $division = Division::find($id);

        $division->name = $request->name;
        $division->priority = $request->priority;
        
        $division->save();

        /* IF YOU WANT TO SHOW FLASH MESSAGE THEN USE THIS TWO CODES */
        /* session()->flash('success', 'A new division has added successfully !!');
        return redirect()->route('admin.division.manage'); */

        //OR use under code tweester alert

        /* If you want to show notification for any notification then write this code here */
        if ($division) {

            $notification = array(
                'message' => 'Product updated successfully!',
                'alert-type' => 'success'
            );
            
            return Redirect()->route('admin.division.manage')->with($notification);
        }else {

            $notification = array(
                'message' => 'Nothing to change!',
                'alert-type' => 'error'
            );
            
            return Redirect()->route('admin.division.manage')->with($notification);

        }
    }

    public function delete($id)
    {
        $division = Division::find($id);
        $division->delete();

        /* If you want to show notification for any notification then write this code here */
        if ($division) {

            $notification = array(
                'message' => 'Division deleted successfully!',
                'alert-type' => 'success'
            );
            
            return Redirect()->route('admin.division.manage')->with($notification);
        }else {

            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            
            return Redirect()->route('admin.division.manage')->with($notification);

        }
    }

    public function show($id)
    {
        $division = Division::find($id);
        return view('backend.pages.division.show',compact('division'));
    }
}
