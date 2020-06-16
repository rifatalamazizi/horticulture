@extends('frontend.layout.master')

@section('header-bottom')
@include('frontend.partials.header_bottom')
@endsection

@section('content')
<main class="main">
    <div class="page-header text-center"
        style="background-image: url('{{ url('public/frontend/assets/images/page-header-bg.jpg')}}')">
        <div class="container">
            <h1 class="page-title">Checkout</h1>
        </div>
    </div>
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <div class="checkout-discount">
                    <form action="#">
                        <input type="text" class="form-control" required id="checkout-discount-input">
                        <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span style="color:#A6C76C">Click here to
                                enter your code</span>
                        </label>
                    </form>
                </div>
                <form method="POST" action="{{ route('checkouts.store') }}">
                    @csrf
                    <div class="row">

                        <!-- Billing Address Start -->
                        <div class="col-lg-9">
                            <h2 class="checkout-title">Billing Details</h2>

                            <!-- User Name start -->
                            <div class="">
                                <div class="">
                                    <label>Name *</label>
                                    <input name="name" id="name" type="text"
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        value="{{ Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name : '' }}"
                                        required style="border-color:#A6C76C;">

                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!-- User Name end -->

                            <!-- User Email start -->
                            <div class="">
                                <div class="">
                                    <label>Email *</label>
                                    <input name="email" type="email" id="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        value="{{ Auth::check() ? Auth::user()->email : '' }}" required style="border-color:#A6C76C;">

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div><!-- User Email End -->

                            <!-- User Phone start -->
                            <div class="">
                                <div class="">
                                    <label>Phone No *</label>
                                    <input name="phone_no" type="phone_no" id="phone_no"
                                        class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}"
                                        value="{{ Auth::check() ? Auth::user()->phone_no : '' }}" required style="border-color:#A6C76C;">

                                    @if ($errors->has('phone_no'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!-- User Phone End -->

                            <!-- User Message start -->
                            <div class="">
                                <div class="">
                                    <label>Additional Message (optional)</label>
                                    <textarea id="message"
                                        class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" rows="4"
                                        name="message" style="border-color:#A6C76C;"></textarea>

                                    @if ($errors->has('message'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!-- User Message End -->

                            <!-- User Shipping Address start -->
                            <div class="">
                                <div class="">
                                    <label>Shipping Address *</label>
                                    <textarea id="shipping_address"
                                        class="form-control{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}"
                                        rows="4"
                                        name="shipping_address" style="border-color:#A6C76C;">{{ Auth::check() ? Auth::user()->shipping_address : '' }}</textarea>

                                    @if ($errors->has('shipping_address'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('shipping_address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!-- User Shipping Address End -->

                            <!-- User Payment Method start -->
                            <div class="">
                                <label for="payment_method" class="">Payment Method *</label>
                                <div class="">
                                    <select class="form-control" name="payment_method_id" required id="payments" style="border-color:#A6C76C;">
                                        <option value="">Select a payment method please</option>
                                        @foreach ($payments as $payment)
                                        <option value="{{ $payment->short_name }}">{{ $payment->name }}</option>
                                        @endforeach
                                    </select>

                                    @foreach($payments as $payment)
                                    <div>
                                        @if($payment->short_name == "cash_in")
                                        <div id="payment_{{ $payment->short_name }}" class="alert alert-success text-center hidden">
                                            <h4>
                                                For Cash in there is nothing necessary. Just click finish order.
                                            </h4>
                                            <br>
                                            <h5>Your will get your product in two or three days</h5>
                                        </div>
                                        @else
                                        <div id="payment_{{ $payment->short_name }}" class="alert alert-success text-center hidden">
                                            <h3> {{ $payment->name }} Payment</h3>
                                            <p>
                                                <strong> {{ $payment->name }} No : {{ $payment->no }} </strong>
                                                <br>
                                                <strong>Account Type : {{ $payment->type }} </strong>
                                            </p>
                                            <div class="alert alert-success">
                                                Please send the above money to this Bkash No and write your transaction code below there.
                                            </div>

                                            <!-- <input type="text" name="transaction_id" id="transaction_id" class="form-control hidden" placeholder="Enter transaction code"> -->
                                        </div>
                                        @endif
                                    </div>
                                    @endforeach
                                    <input type="text" name="transaction_id" id="transaction_id" class="form-control hidden" placeholder="Enter transaction code">
                                </div>
                            </div>
                            <!-- User Payment Method End -->
                        </div>
                        <!-- Billing Address End -->

                        <!-- Sidebar Start -->
                        <aside class="col-lg-3">
                            <div class="summary">
                                <h3 class="summary-title">Your Order</h3>

                                <!-- PRODUCT PRICE START -->
                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                        $total_price = 0;
                                        @endphp

                                        @foreach(App\Models\Cart::totalCarts() as $cart)
                                        <tr>
                                            <td>
                                                <a href="{{ route('products.show', $cart->product->slug) }}">
                                                    {{ $cart->product->title }}
                                                </a>
                                            </td>
                                            <td>
                                                @php
                                                $total_price += $cart->product->price * $cart->product_quantity;
                                                @endphp
                                                {{ $cart->product->price * $cart->product_quantity }} Taka
                                            </td>
                                        </tr>
                                        @endforeach

                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td><strong>{{ $total_price }} TK</strong></td>
                                        </tr>

                                        <tr>
                                            <td>Shipping:</td>
                                            
                                        </tr>

                                        <tr class="summary-total">
                                            <td style="color:#A6C76C;">Total:</td>
                                            
                                        </tr>

                                    </tbody>
                                </table>
                                <!-- PRODUCT PRICE END -->

                                <!-- PAYMENT ACCORDION START -->
                                <div class="accordion-summary" id="accordion-payment">
                                    <div class="card">
                                        <div class="card-header" id="heading-1">
                                            <h2 class="card-title">
                                                <a role="button" data-toggle="collapse" href="#collapse-1"
                                                    aria-expanded="true" aria-controls="collapse-1">
                                                    Direct bank transfer
                                                </a>
                                            </h2>
                                        </div>
                                        <div id="collapse-1" class="collapse show" aria-labelledby="heading-1"
                                            data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Make your payment directly into our bank account. Please use your Order
                                                ID as the payment reference. Your order will not be shipped until the
                                                funds have cleared in our account.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="heading-2">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse"
                                                    href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                                    Check payments
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-2" class="collapse" aria-labelledby="heading-2"
                                            data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque
                                                volutpat mattis eros. Nullam malesuada erat ut turpis.
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-3">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse"
                                                    href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                    Cash on delivery
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-3" class="collapse" aria-labelledby="heading-3"
                                            data-parent="#accordion-payment">
                                            <div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor sit
                                                amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis
                                                eros.
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-4">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse"
                                                    href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                                    PayPal <small class="float-right paypal-link">What is
                                                        PayPal?</small>
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-4" class="collapse" aria-labelledby="heading-4"
                                            data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non,
                                                semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis
                                                fermentum.
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-5">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse"
                                                    href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                                                    Credit Card (Stripe)
                                                    <img src="{{ url('public/frontend/assets/images/payments-summary.png')}}"
                                                        alt="payments cards">
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-5" class="collapse" aria-labelledby="heading-5"
                                            data-parent="#accordion-payment">
                                            <div class="card-body"> Donec nec justo eget felis facilisis fermentum.Lorem
                                                ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque
                                                volutpat mattis eros. Lorem ipsum dolor sit ame.
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->
                                </div>
                                <!-- PAYMENT ACCORDION END -->

                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block" style="border-color:#A6C76C; background-color:#A6C76C; color:white;">
                                    <span class="btn-text" style="color:#white;">Place Order</span>
                                    <span class="btn-hover-text">Proceed to Checkout</span>
                                </button>
                            </div>
                        </aside>
                        <!-- Sidebar End -->

                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
<script type="text/javascript">
$("#payments").change(function() {
    $("#payment_cash_in").removeClass('hidden');
    $payment_method = $("#payments").val();
    if ($payment_method == "cash_in") {
        $("#payment_cash_in").removeClass('hidden');
        $("#payment_bkash").addClass('hidden');
        $("#payment_rocket").addClass('hidden');
    } else if ($payment_method == "bkash") {
        $("#payment_bkash").removeClass('hidden');
        $("#payment_cash_in").addClass('hidden');
        $("#payment_rocket").addClass('hidden');
        $("#transaction_id").removeClass('hidden');
    } else if ($payment_method == "rocket") {
        $("#payment_rocket").removeClass('hidden');
        $("#payment_bkash").addClass('hidden');
        $("#payment_cash_in").addClass('hidden');
        $("#transaction_id").removeClass('hidden');
    }
})
</script>
@endsection

<!-- -$payment->short_name -->