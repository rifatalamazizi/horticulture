<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Cart;

use Auth;

class CartController extends Controller
{
    public function index()
    {
        return view('frontend.pages.cart');
    }

    public function store(Request $request)
    {

        /* Always remember that [ VALIDATION ] code will be before [ INSERTING DATA ] */
        /* Form VALIDATION */
        $validatedData = $request->validate([
            /* 'name' = comes from db-column name */
            /** 
             * 1-> carts = table name 
             * 2-> required = you have to must insert
             * 3-> unique = one name one time you can't put same name for another time
             * 4-> max = maximum 25 character
             * 5-> min = minimum 4 character
             **/
            'product_id' => 'required',
        ],
        [
            'product_id.required' => 'Please provide a product',
        ]);
        /* END OF Form VALIDATION */
        
        if (Auth::check()) {

            $cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->where('order_id', NULL) // If cart not increment then add this line
            ->first();

        }else {

            $cart = Cart::where('ip_address', request()->ip())
            ->where('product_id', $request->product_id)
            ->where('order_id', NULL) // If cart not increment then add this line
            ->first();

        }     

        if (!is_null($cart)) {

            $cart->increment('product_quantity');
            
        }else{

            // Call Cart model for storing data into DB which you have taken from your form page.
            $cart = new Cart();

            if (Auth::check()) {
                
                $cart->user_id = Auth::id();

            }

            $cart->ip_address = request()->ip(); // If you make this $request then it will make error
            $cart->product_id = $request->product_id;

            /* if you need extra from add to cart then uncomment this */

            /* $cart->order_id = $request->order_id;
            $cart->product_quantity = $request->product_quantity;
            $cart->user_id = $request->user_id; */
            
            $cart->save();

        }

        session()->flash('success', 'New cart item has added successfully !!');
        return back();
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);

        if (!is_null($cart)) {
            
            $cart->product_quantity = $request->product_quantity;
            $cart->save();

        }else {

            return redirect()->route('carts');

        }

        session()->flash('success', 'Cart item has updated successfully !!');
        return redirect()->back();
    }

    public function delete($id)
    {
        $cart = Cart::find($id);
        if (!is_null($cart)) {

            $cart->delete();

        }else {

            return redirect()->route('carts');
            
        }

        session()->flash('success', 'Cart item has deleted !!');
        return Redirect()->back();
    }
}
