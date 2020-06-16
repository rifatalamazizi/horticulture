<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use PDF;


class OrderController extends Controller
{
    public function __construct()
    {
        /* $this->middleware('auth:web'); */
        $this->middleware('auth:admin');
    }

    public function index() // All order show
    {
        // Here call the Order table and fetch all data from this table by --> get() <-- Method and orderby descending
        // desc = new to old / update to old
        $orders = Order::orderBy('id', 'desc')->get();
        /* return view('frontend.pages.product.all_product',compact('products')); */
        return view('backend.pages.order.index',compact('orders'));
    }

    public function show($id) // Single order show
    {
        // Here call the Order table and fetch all data from this table by --> get() <-- Method and orderby descending
        // desc = new to old / update to old
        $order = Order::find($id);
        /* return view('frontend.pages.product.all_product',compact('products')); */
        $order->is_seen_by_admin = 1; // when admin enter show / view page that means admin already seen it.
        $order->save();
        return view('backend.pages.order.show',compact('order'));
    }

    public function completed($id)
    {
        $order = Order::find($id);
        if ($order->is_completed) {
            
            $order->is_completed = 0; // order is canceled

        }else {

            $order->is_completed = 1; // order is approved

        }

        $order->save();
        session()->flash('success', 'Order completed status changed ..!');
        return back();
    }

    public function paid($id)
    {
        $order = Order::find($id);
        if ($order->is_paid) {
            $order->is_paid = 0;
        }
        else {
            $order->is_paid = 1;
        }
        $order->save();
        session()->flash('success', 'Order paid status changed ..!');
        return back();
    }

    public function chargeUpdate(Request $request, $id)
    {
        $order = Order::find($id);

        $order->shipping_charge = $request->shipping_charge; // charge is approved
        $order->custom_discount = $request->custom_discount; // order is approved

        $order->save();
        session()->flash('success', 'Order charge and discount has changed ..!');
        return back();
    }

    public function generateInvoice($id)
    {
        $order = Order::find($id);

        $pdf = PDF::loadView('backend.pages.order.invoice', compact('order'));
        $pdf->stream('invoice.pdf'); // for view
        return $pdf->download('invoice.pdf'); // for download
    }

    public function delete($id)
    {
        $order = Order::find($id);
        $order->delete();

        /* If you want to show notification for any notification then write this code here */
        if ($order) {

            $notification = array(
                'message' => 'Order deleted successfully!',
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
    }
}
