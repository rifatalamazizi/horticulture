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
        style="background-image: url(' {{ url('public/frontend/assets/images/backgrounds/login-bg.jpg')}}')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">

                    <!-- header SIGN IN / SIGN UP / REGISTER START -->
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab"
                                aria-controls="signin-2" aria-selected="true">{{ __('ADMIN SIGN IN') }}</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="register-tab-2" data-toggle="tab" href="#register-2"
                                role="tab" aria-controls="register-2" aria-selected="true">{{ __('SING UP') }}</a>
                        </li> -->
                    </ul>
                    <!-- header SIGN IN / SIGN UP / REGISTER END -->

                    <!-- SIGN IN / SIGN UP / REGISTER CONTENT START -->
                    <div class="tab-content">

                        <!-- SIGN IN PART START -->
                        <div class="tab-pane fade show active" id="signin-2" role="tabpanel"
                            aria-labelledby="signin-tab-2">
                            <form method="POST" action="{{ route('admin.login.submit') }}">
                                @csrf

                                <!-- EMAIL -->
                                <div class="form-group">
                                    <label for="email" class="">{{ __('E-Mail Address') }}</label>

                                    <div class="">
                                        <input id="email" type="email"
                                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" placeholder="Email Address" value="{{ old('email') }}" required
                                            autofocus>

                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- PASSWORD -->
                                <div class="form-group">
                                    <label for="password" class="">{{ __('Password') }}</label>

                                    <div class="">
                                        <input id="password" type="password"
                                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            placeholder="Password" name="password" required>

                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Login-Remember Me-Forget Your Password ? Start -->
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>{{ __('LOG IN') }}</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>

                                    <div class="custom-control custom-checkbox">
                                        <input name="remember" type="checkbox" class="custom-control-input"
                                            id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="remember">{{ __('Remember Me') }}
                                        </label>
                                    </div>

                                    @if (Route::has('password.request'))
                                    <a href="{{ route('admin.password.request') }}" class="forgot-link">{{ __('Forgot Your Password ?') }}</a>
                                    @endif

                                </div>
                                <!-- Login-Remember Me-Forget Your Password ? End -->

                            </form>

                            <!-- SIGN IN WITH SOCIAL START -->
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
                                        <a href="#" class="btn btn-login btn-f">
                                            <i class="icon-facebook-f"></i>
                                            Login With Facebook
                                        </a>
                                    </div><!-- End .col-6 -->
                                </div><!-- End .row -->
                            </div>
                            <!-- SIGN IN WITH SOCIAL END -->

                        </div>
                        <!-- SIGN IN PART END -->

                        <!-- SIGN UP / REGISTER PART START -->
                        <!-- if you want to show then copy from register page -->
                        <!-- SIGN UP / REGISTER PART END -->

                    </div>
                    <!-- SIGN IN / SIGN UP / REGISTER CONTENT END -->

                </div>
            </div>
        </div>
    </div>
</main>
@endsection