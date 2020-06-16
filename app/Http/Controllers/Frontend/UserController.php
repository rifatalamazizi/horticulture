<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\User;
use Auth;
use App\Models\Division;
use App\Models\District;

class UserController extends Controller
{
    public function __construct()
    {
        /* $this->middleware('auth:web'); */
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $user = Auth::user();
        return view('frontend.pages.users.index',compact('user'));
    }

    public function profile()
    {
        $divisions = Division::orderBy('priority', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->get();

        $user = Auth::user();
        return view('frontend.pages.users.profile',compact('user', 'divisions', 'districts'));
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();
        /* Always remember that [ VALIDATION ] code will be before [ INSERTING DATA ] */
        /* Form VALIDATION */
        $validatedData = $request->validate([
            /* 'name' = comes from db-column name */
            /** 
             * 1-> 
             * 2-> required = you have to must insert
             * 3-> unique = one name one time you can't put same name for another time
             * 4-> max = maximum 25 character
             * 5-> min = minimum 4 character
             **/
            'first_name' => 'required|string|max:30',
            'last_name' => 'nullable|string|max:15',
            'username' => 'required|alpha_dash|max:100|unique:users,username,'.$user->id,
            'email' => 'required|string|email|max:100|unique:users,email,'.$user->id,
            
            
            'phone_no' => 'required|max:15|unique:users,phone_no,'.$user->id,
            'street_address' => 'required|max:100',
        ]);
        /* END OF Form VALIDATION */

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone_no = $request->phone_no;
        $user->street_address = $request->street_address;
        $user->shipping_address = $request->shipping_address;

        /* When someone try to update his password then use this */
        if ($request->password != NULL || $request->password != "") {
            
            $user->password = Hash::make($request->password);

        }

        $user->ip_address = request()->ip();
        $user->save();

        session()->flash('success', 'User profile has updated successfully !!');
        return back();
    }
    
}