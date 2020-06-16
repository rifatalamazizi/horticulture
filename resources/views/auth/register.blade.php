@extends('frontend.layout.master')

@section('header-bottom')
@include('frontend.partials.header_bottom')
@endsection

@section('content')
<main class="main">

    <!-- Breadcrumb start -->
    <!-- <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ol>
        </div>
    </nav> -->
    <!-- Breadcrumb end -->

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
        style="background-image: url(' {{ url('public/frontend/assets/images/backgrounds/register-bg.jpg') }}')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">

                    <!-- header SIGN IN / SIGN UP / REGISTER START -->
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab"
                                aria-controls="signin-2" aria-selected="true">{{ __('SIGN IN') }}</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link active" id="register-tab-2" data-toggle="tab" href="#register-2"
                                role="tab" aria-controls="register-2" aria-selected="true" style="color:#A6C76C; background-color:white; border-bottom-color:#A6C76C">{{ __('SING UP') }}</a>
                        </li>
                    </ul>
                    <!-- header SIGN IN / SIGN UP / REGISTER END -->

                    <!-- SIGN IN / SIGN UP / REGISTER CONTENT START -->
                    <div class="tab-content">

                        <!-- SIGN IN PART START -->
                        <!-- if you want to show then copy from login page -->
                        <!-- SIGN IN PART END -->

                        <!-- SIGN UP / REGISTER PART START -->
                        <div class="tab-pane fade show active" id="register-2" role="tabpanel"
                            aria-labelledby="register-tab-2">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- First name start -->
                                <div class="form-group">
                                    <label for="first_name" class="">{{ __('First Name') }}</label>

                                    <div class="">
                                        <input id="first_name" type="text"
                                            class="form-control @error('first_name') is-invalid @enderror"
                                            name="first_name" value="{{ old('first_name') }}" required
                                            autocomplete="first_name" autofocus style="border-color:#A6C76C;">

                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- First name End -->

                                <!-- Last name start -->
                                <div class="form-group">
                                    <label for="last_name" class="">{{ __('Last Name') }}</label>

                                    <div class="">
                                        <input id="last_name" type="text"
                                            class="form-control @error('last_name') is-invalid @enderror"
                                            name="last_name" value="{{ old('last_name') }}" required
                                            autocomplete="last_name" autofocus style="border-color:#A6C76C;">

                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Last name End -->

                                <!-- Email start -->
                                <div class="form-group">
                                    <label for="email" class="">{{ __('E-Mail Address') }}</label>

                                    <div class="">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" style="border-color:#A6C76C;">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Email End -->

                                <!-- Phone start -->
                                <div class="form-group">
                                    <label for="phone_no" class="">{{ __('Phone No') }}</label>

                                    <div class="">
                                        <input id="phone_no" type="phone_no"
                                            class="form-control @error('phone_no') is-invalid @enderror" name="phone_no"
                                            value="{{ old('phone_no') }}" required autocomplete="phone_no" style="border-color:#A6C76C;">

                                        @error('phone_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Phone End -->

                                <!-- Division start -->
                                <div class="form-group" style="border-color:#A6C76C;">
                                    <label for="division_id" class="">{{ __('Division') }}</label>

                                    <div class="">
                                        <select class="form-control" name="division_id" id="division_id">
                                            <option value="">Please select your division</option>
                                            @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- Division End -->

                                <!-- Street Address start -->
                                <div class="form-group">
                                    <label for="street_address" class="">{{ __('Street Address') }}</label>

                                    <div class="">
                                        <input id="street_address" type="street_address"
                                            class="form-control @error('street_address') is-invalid @enderror"
                                            name="street_address" value="{{ old('street_address') }}" required
                                            autocomplete="street_address" style="border-color:#A6C76C;">

                                        @error('street_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Street Address End -->

                                <!-- Password start -->
                                <div class="form-group">
                                    <label for="password" class="">{{ __('Password') }}</label>

                                    <div class="">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password" style="border-color:#A6C76C;">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Password End -->

                                <!-- Confirm Password start -->
                                <div class="form-group">
                                    <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                                    <div class="">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password" style="border-color:#A6C76C;">
                                    </div>
                                </div>
                                <!-- Confirm Password End -->

                                <div class="form-footer">
                                    <!-- Register start -->
                                    <button type="submit" class="btn btn-outline-primary-2"  style="border-color:#A6C76C; background-color:#A6C76C">
                                        <span style="border-color:#A6C76C; color:white;">{{ __('SIGN UP') }}</span>
                                        <i class="icon-long-arrow-right" style="color:white;"></i>
                                    </button>
                                    <!-- Register End -->

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="register-policy-2"
                                            required>
                                        <label class="custom-control-label" for="register-policy-2">I agree to the <a
                                                href="#" style="color:#A6C76C">privacy policy</a> *</label>
                                    </div>
                                </div>

                            </form>

                            <div class="form-choice">
                                <p class="text-center">or sign in with</p>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-login btn-g">
                                            <i class="icon-google"></i>
                                            Login With Google
                                        </a>
                                    </div><!-- End .col-6 -->
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-login  btn-f">
                                            <i class="icon-facebook-f"></i>
                                            Login With Facebook
                                        </a>
                                    </div><!-- End .col-6 -->
                                </div><!-- End .row -->
                            </div>

                        </div>
                        <!-- SIGN UP / REGISTER PART END -->

                    </div>
                    <!-- SIGN IN / SIGN UP / REGISTER CONTENT END -->

                </div>
            </div>
        </div>
    </div>
</main>
@endsection


<!-- FOR GENERATE -- SELECT DIVISION WITH MULTIPLE DISTRICT -->
@section('scripts')
<script src="{{ asset('public/backend/assets/js/jquery.min.js') }}"></script>
<script>
$("#division_id").change(function() {
    var division = $("#division_id").val();
    $("#district-area").html("");
    var option = "";
    // send an ajax request to server with this division
    /* Here Ecom1 = Your project name */
    var url = "{{ url('/') }}"; //BUG FIXED FOR URL
    $.get( url+"/get-districts/"+division, function(data) { //BUG FIXED FOR URL

        data = JSON.parse(data)

        data.forEach(function(element) {
            option += "<option value='" + element.id + "'>" + element.name + "</option>";
        });

        $("#district-area").html(option);
    });
})
</script>
@endsection