@extends('backend.layout.master')

@section('admin_content')
<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Data Tables</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.order') }}">Manage Order</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $order->name }}</li>
        </ol>
    </div>
    <div class="col-sm-3">
        <div class="btn-group float-sm-right">
            <button type="button" class="btn btn-light waves-effect waves-light"><i class="fa fa-cog mr-1"></i>
                Setting</button>
            <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split waves-effect waves-light"
                data-toggle="dropdown">
                <span class="caret"></span>
            </button>
            <div class="dropdown-menu">
                <a href="javaScript:void();" class="dropdown-item">Action</a>
                <a href="javaScript:void();" class="dropdown-item">Another action</a>
                <a href="javaScript:void();" class="dropdown-item">Something else here</a>
                <div class="dropdown-divider"></div>
                <a href="javaScript:void();" class="dropdown-item">Separated link</a>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb-->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 style="color:#9057ff;">Orderer Details</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="default-datatable" class="table table-bordered datatable">
                        <thead>
                            <tr>
                                <th class="">Orderer Name</th>
                                <td>{{ $order->name }}</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="">Orderer Phone No</th>
                                <td>{{ $order->phone_no }}</td>
                            </tr>

                            <tr>
                                <th class="">Orderer Email</th>
                                <td>{{ $order->email }}</td>
                            </tr>

                            <tr>
                                <th class="">Orderer Shipping Address</th>
                                <td>{{ $order->shipping_address }}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="">Order Payment Method</th>
                                <td>{{ $order->payment->name }}</td>
                            </tr>

                            <tr>
                                <th class="">Order Payment Transaction</th>
                                <td>{{ $order->transaction_id }}</td>
                            </tr>
                        </tfoot>
                    </table>

                    <hr>

                    <!-- Ordered items info start -->
                    <div class="ordered-items-wrapper">
                        <h3>Ordered Items</h3>

                        <!-- This will show when user order will be more then 1 -->
                        @if ( $order->carts->count() > 0 )
                        <table class="table table-condensed">
                            <thead>
                                <tr class="cart_menu">
                                    <th class="" style="text-align:center;">Item</th>
                                    <th class="image">Image</th>
                                    <th class="description">Title</th>
                                    <th class="price">Price</th>
                                    <th class="quantity">Quantity</th>
                                    <th class="total">Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total_price = 0;
                                @endphp

                                @foreach($order->carts as $cart)
                                <tr>
                                    <!-- product id start -->
                                    <td class="cart_item" style="text-align:center;">
                                        <p>{{ $loop->index + 1 }}</p>
                                        <!-- this will show item from 1 to .... if you write only $loop->then it will start from 0 -->
                                    </td>
                                    <!-- product id end -->

                                    <!-- product image start -->
                                    <td class="cart_product">
                                        @if ($cart->product->images->count() > 0)
                                        <a href="{{ route('products.show', $cart->product->slug) }}"
                                            style="color:#696763;">
                                            <img src="{{ asset('public/frontend/assets/images/products/'. $cart->product->images->first()->image) }}"
                                                width="50px" style="margin-left:22px;">
                                        </a>

                                        @endif
                                    </td>
                                    <!-- product image end -->

                                    <!-- product title start -->
                                    <td class="cart_title">
                                        <a href="{{ route('products.show', $cart->product->slug) }}"
                                            style="color:#696763">{{ $cart->product->title }}</a>
                                        <!-- <h4><a href="">Colorblock Scuba</a></h4>
                                                                    <p>Web ID: 1089772</p> -->
                                    </td>
                                    <!-- product image end -->

                                    <!-- product price start -->
                                    <td class="cart_price">
                                        <p>{{ $cart->product->price }} Taka</p>
                                    </td>
                                    <!-- product price end -->

                                    <!-- product quantity start -->
                                    <td class="cart_quantity">
                                        <form action="{{ route('carts.update', $cart->id) }}" method="post">
                                            {{ csrf_field() }}

                                            <!-- <a class="cart_quantity_up" href=""> + </a> -->
                                            <!-- FOR ADDING CART FROM HERE CALL UNDER CODE -->
                                            <!-- < frontend>frontend>frontend>pages>product>partials>cart > -->
                                            <input type="number" name="product_quantity"
                                                class="cart_quantity_input text-center"
                                                value="{{ $cart->product_quantity }}" style="width:70px;">
                                            <!-- <a class="cart_quantity_up" href=""> - </a> -->
                                            <button type="submit" class="btn btn-warning ml-1 btn-sm"
                                                style="border-radius:none;">Update</button>

                                        </form>
                                    </td>
                                    <!-- product quantity end -->

                                    <!-- product total price start -->
                                    <td class="cart_total">
                                        <h5 class="cart_total_price"
                                            style="margin-top: 10px; font-size:18px; color:#696763; font-weight:400;">
                                            @php
                                            $total_price += $cart->product->price *
                                            $cart->product_quantity;
                                            @endphp

                                            {{ $cart->product->price * $cart->product_quantity }}
                                            Taka
                                        </h5>
                                    </td>
                                    <!-- product total price end -->

                                    <!-- product delete start -->
                                    <td class="cart_delete">
                                        <form class="form-inline" action="{{ route('carts.delete', $cart->id) }}"
                                            method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="cart_id" />
                                            <button type="submit" class="btn btn-danger" style="border:none;">
                                                Remove
                                            </button>
                                        </form>
                                    </td>
                                    <!-- product delete end -->
                                </tr>
                                @endforeach

                            </tbody>
                            <tfooter>
                                <tr>
                                    <td colspan="4"></td>
                                    <td>
                                        <h4><strong>Total Amount:</strong></h4>
                                    </td>
                                    <td colspan="2">
                                        <h4 style="color:#FE980F"><strong>
                                                {{ $total_price }} Taka</strong></h4>
                                    </td>
                                </tr>
                            </tfooter>
                        </table>
                        @endif
                    </div>
                    <!-- Ordered items info e n d -->

                    <hr>

                    <!-- Shippin Cost , Custom Discount & Generate Invoice Start -->
                    <form action="{{ route('admin.order.charge', $order->id) }}" class=""
                        style="display: inline-block!important;" method="post">
                        @csrf
                        <label for="shipping_charge">Shipping Cost</label>
                        <input type="number" name="shipping_charge" id="shipping_charge" class="form-control" 
                        value="{{ $order->shipping_charge }}">
                        <br>
                        <label for="custom_discount">Custom Discount</label>
                        <input type="number" name="custom_discount" id="custom_discount" class="form-control" 
                        value="{{ $order->custom_discount }}">
                        <br>
                        <input type="submit" value="Update" class="btn btn-success">
                        <a href="{{ route('admin.order.invoice', $order->id) }}" class="btn btn-warning">Generate Invoice</a>
                    </form>
                    <!-- Shippin Cost , Custom Discount & Generate Invoice End -->

                    <hr>

                    <!-- Admin Action start -->
                    <form action="{{ route('admin.order.completed', $order->id) }}" class="form-inline"
                        style="display: inline-block!important;" method="post">
                        @csrf
                        @if ($order->is_completed)
                        <input type="submit" value="Cancel Order" class="btn btn-danger">
                        @else
                        <input type="submit" value="Complete Order" class="btn btn-success">
                        @endif
                    </form>


                    <form action="{{ route('admin.order.paid', $order->id) }}" class="form-inline"
                        style="display: inline-block!important;" method="post">
                        @csrf
                        @if ($order->is_paid)
                        <input type="submit" value="Cancel Payment " class="btn btn-danger">
                        @else
                        <input type="submit" value="Paid Order" class="btn btn-success">
                        @endif
                    </form>
                    <!-- Admin Action e n d -->

                </div>
            </div>
        </div>
    </div>
</div><!-- End Row-->
@endsection