<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\District;
use App\Models\Division;

class DistrictController extends Controller
{
    public function __construct()
    {
        /* $this->middleware('auth:web'); */
        $this->middleware('auth:admin');
    }

    public function index()// Show all items
    {
        // Here call the District table and fetch all data from this table by --> get() <-- Method and orderby descending
        // desc = new to old / update to old
        $districts = District::orderBy('name', 'asc')->get();
        /* return view('frontend.pages.product.all_product',compact('products')); */
        return view('backend.pages.district.index',compact('districts'));
    }

    public function create()
    {
        /* Here call Division table for transfer data into district create page */
        $divisions = Division::orderBy('priority', 'asc')->get();
        return view('backend.pages.district.create',compact('divisions'));
    }

    public function store(Request $request)
    {

        /* Always remember that [ VALIDATION ] code will be before [ INSERTING DATA ] */
        /* Form VALIDATION */
        $validatedData = $request->validate([
            /* 'name' = comes from db-column name */
            /** 
             * 1-> districts = table name 
             * 2-> required = you have to must insert
             * 3-> unique = one name one time you can't put same name for another time
             * 4-> max = maximum 25 character
             * 5-> min = minimum 4 character
             **/
            'name' => 'required|max:45|min:4',
            'division_id'  => 'required',
        ],

        [
            'name.required'  => 'Please provide a district name',
            'division_id.required'  => 'Please provide a division for the district',  
        ]);
        /* END OF Form VALIDATION */
        
        // Call Product model for storing data into DB which you have taken from your form page.
        $district = new District();

        $district->name = $request->name;
        $district->division_id = $request->division_id;
        
        $district->save();

        /* IF YOU WANT TO SHOW FLASH MESSAGE THEN USE THIS TWO CODES */
        /* session()->flash('success', 'A new district has added successfully !!');
        return redirect()->route('admin.districts'); */

        /* OR you can use sweet alert */

        /* If you want to show notification for any notification then write this code here */
        if ($district) {

            $notification = array(
                'message' => 'District created successfully!',
                'alert-type' => 'success'
            );
            
            return Redirect()->back()->with($notification);
            /* return Redirect()->route('manage.district')->with($notification); */
        }else {

            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            
            return Redirect()->back()->with($notification);
            /* return Redirect()->route('manage.district')->with($notification); */

        }
    }

    public function edit($id)
    {
        /* Here call Division table for transfer data into district edit page */
        $divisions = Division::orderBy('priority', 'asc')->get();
        $district = District::find($id);
        return view('backend.pages.district.edit',compact('district', 'divisions'));
        /* return view('backend.pages.product.create')->with('products',$product); */
    }

    public function update(Request $request,$id)
    {

        /* Always remember that [ VALIDATION ] code will be before [ INSERTING DATA ] */
        /* Form VALIDATION */
        $validatedData = $request->validate([
            /* 'name' = comes from db-column name */
            /** 
             * 1-> districts = table name 
             * 2-> required = you have to must insert
             * 3-> unique = one name one time you can't put same name for another time
             * 4-> max = maximum 25 character
             * 5-> min = minimum 4 character
             **/
            'name' => 'required|max:45|min:4',
            'division_id'  => 'required',
        ],

        [
            'name.required'  => 'Please provide a district name',
            'division_id.required'  => 'Please provide a division for the district',  
        ]);
        /* END OF Form VALIDATION */
        
        // Call Product model for storing data into DB which you have taken from your form page.
        $district = District::find($id);

        $district->name = $request->name;
        $district->division_id = $request->division_id;
        
        $district->save();

        /* If you want to show notification for any notification then write this code here */
        if ($district) {

            $notification = array(
                'message' => 'Product updated successfully!',
                'alert-type' => 'success'
            );
            
            return Redirect()->route('admin.district.manage')->with($notification);
        }else {

            $notification = array(
                'message' => 'Nothing to change!',
                'alert-type' => 'error'
            );
            
            return Redirect()->route('admin.district.manage')->with($notification);

        }
    }

    public function delete($id)
    {
        $district = District::find($id);
        $district->delete();

        /* If you want to show notification for any notification then write this code here */
        if ($district) {

            $notification = array(
                'message' => 'District deleted successfully!',
                'alert-type' => 'success'
            );
            
            return Redirect()->route('admin.district.manage')->with($notification);
        }else {

            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            
            return Redirect()->route('admin.district.manage')->with($notification);

        }
    }

    public function show($id)
    {
        $district = District::find($id);
        return view('backend.pages.district.show',compact('district'));
    }
}
