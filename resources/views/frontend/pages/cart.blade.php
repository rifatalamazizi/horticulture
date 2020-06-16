@extends('frontend.layout.master')

@section('header-bottom')
@include('frontend.partials.header_bottom')
@endsection

@section('content')
<main class="main">

    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Shopping Cart</h1>
        </div>
    </div>

    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <table class="table table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th style="margin-left:100px;">Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                $total_price = 0;
                                @endphp

                                @foreach(App\Models\Cart::totalCarts() as $cart)
                                <tr>
                                    <!-- product id start -->
                                    <td class="product-col">
                                        <p>{{ $loop->index + 1 }}</p>
                                        <!-- this will show item from 1 to .... if you write only $loop->then it will start from 0 -->
                                    </td>
                                    <!-- product id end -->

                                    <!-- product image start -->
                                    <td>
                                        <figure class="product-media" style="background:none;">
                                            @if ($cart->product->images->count() > 0)
                                            <a href="{{ route('products.show', $cart->product->slug) }}">
                                                <img src="{{ asset('public/frontend/assets/images/products/'. $cart->product->images->first()->image) }}"
                                                    width="50px" alt="Product image">
                                            </a>
                                            @endif
                                        </figure>

                                    </td>
                                    <!-- product image end -->

                                    <!-- product title start -->
                                    <td class="product-col">
                                        <h3 class="product-title">
                                            <a href="{{ route('products.show', $cart->product->slug) }}">{{ $cart->product->title }}
                                            </a>
                                        </h3>
                                    </td>
                                    <!-- product title End -->

                                    <!-- product price start -->
                                    <td class="price-col">{{ $cart->product->price }} Taka</td>
                                    <!-- product price end -->

                                    <!-- product quantity start -->
                                    <td class="quantity-col">
                                        <form action="{{ route('carts.update', $cart->id) }}" method="post">
                                            @csrf
                                            <!-- <a class="cart_quantity_up" href=""> + </a> -->
                                            <!-- FOR ADDING CART FROM HERE CALL UNDER CODE -->
                                            <!-- < frontend>frontend>frontend>pages>product>partials>cart > -->

                                            <div class="cart-product-quantity">
                                                <input type="number" value="{{ $cart->product_quantity }}"
                                                    name="product_quantity" class="form-control" min="1" max="" step="1"
                                                    data-decimals="0" required>

                                                <button type="submit" class="border-0" style="width:100px; background-color:#A6C76C; border-color:#A6C76C; color:white;">
                                                    UPDATE
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                    <!-- product quantity start -->

                                    <!-- product Total Price start -->
                                    <td class="price-col">
                                        @php
                                        $total_price += $cart->product->price * $cart->product_quantity;
                                        @endphp

                                        {{ $cart->product->price * $cart->product_quantity }} Taka
                                    </td>
                                    <!-- product Total Price End -->

                                    <!-- Remove Cart item start -->
                                    <td class="remove-col">
                                        <form class="form-inline" action="{{ route('carts.delete', $cart->id) }}"
                                            method="post">
                                            @csrf
                                            <input type="hidden" name="cart_id" />
                                            <button class="btn-remove"><i class="icon-close"></i></button>
                                        </form>
                                    </td>
                                    <!-- Remove Cart item End -->

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- CART BUTTON START -->
                        <div class="cart-bottom">
                            <div class="cart-discount">
                                <form action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control" required placeholder="coupon code">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary-2" type="submit" style="color:white; background-color:#A6C76C; border-color:#A6C76C;">
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <button type="submit" class="btn btn-outline-dark-2">
                                <span style="color:#A6C76C;">UPDATE CART</span>
                                <i class="icon-refresh" style="color:#A6C76C;"></i>
                            </button>
                        </div>
                        <!-- CART BUTTON END -->

                    </div>

                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <tbody>
                                    <!-- SUB-TOTAL PRICE START -->
                                    <tr class="">
                                        <td>Subtotal:</td>
                                        <td style=""><strong>{{ $total_price }} TK</strong></td>
                                    </tr>
                                    <!-- SUB-TOTAL PRICE END -->

                                    <tr class="summary-shipping">
                                        <td>Shipping:</td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <!-- FREE SHIPPING START -->
                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="free-shipping" name="shipping"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="free-shipping">Free
                                                    Shipping</label>
                                            </div>
                                        </td>
                                        <td>0 TK</td>
                                    </tr>
                                    <!-- FREE SHIPPING END -->

                                    <!-- STANDARD SHIPPING START -->
                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="standart-shipping" name="shipping"
                                                    class="custom-control-input">
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    <!-- STANDARD SHIPPING END -->

                                    <!-- EXPRESS SHIPPING START -->
                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="express-shipping" name="shipping"
                                                    class="custom-control-input">
                                                <label class="custom-control-label"
                                                    for="express-shipping">Express:</label>
                                            </div>
                                        </td>
                                        <td>300 TK</td>
                                    </tr>
                                    <!-- EXPRESS SHIPPING START -->

                                    <tr class="summary-shipping-estimate">
                                        <td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr class="summary-total">
                                        <td style="color:#A6C76C">Total:</td>
                                        <td style="color:#A6C76C"> TK</td>
                                    </tr>
                                </tbody>
                            </table>

                            <a href="{{ route('checkouts') }}" class="btn btn-outline-primary-2 btn-order btn-block" style="border-color:#A6C76C; color:white; background-color:#A6C76C">
                                PROCEED TO CHECKOUT
                            </a>

                        </div>

                        <a href="{{ route('product') }}" class="btn btn-outline-dark-2 btn-block mb-3" style="color:#A6C76C">
                            <span>CONTINUE SHOPPING</span>
                            <i class="icon-refresh"></i>
                        </a>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection