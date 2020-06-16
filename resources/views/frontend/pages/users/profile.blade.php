@extends('frontend.layout.master')

@section('header-bottom')
@include('frontend.partials.header_bottom')
@endsection

@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">My Account<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Account</li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    <aside class="col-md-4 col-lg-3">
                        <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                            
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-account-link" data-toggle="tab" href="#"
                                    role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Sign Out</a>
                            </li>

                        </ul>
                    </aside>
                    
                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="" id="" role="tabpanel"
                                aria-labelledby="tab-account-link">
                                
                                <form method="POST" action="{{ route('user.profile.update') }}"
                                    aria-label="{{ __('Register') }}">
                                    @csrf
                                    
                                    <div class="row">
                                    
                                        <div class="col-sm-6">
                                            <label for="first_name" class="">{{ __('First Name') }}</label>
                                            <input id="first_name" type="text"
                                                class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                                name="first_name" value="{{ $user->first_name }}"
                                                autocomplete="first_name" autofocus required>

                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="last_name" class="">{{ __('Last Name') }}</label>
                                            <input id="last_name" type="text"
                                                class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                                name="last_name" value="{{ $user->last_name }}" autocomplete="last_name"
                                                autofocus required>

                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div>
                                        <label>{{ __('Username') }}</label>
                                        <input id="username" type="text"
                                            class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                            name="username" value="{{ $user->username }}" required autofocus>
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                        @enderror
                                        <small class="form-text">This will be how your name will be displayed in the
                                            account
                                            section and in reviews</small>
                                    </div>

                                    <div>
                                        <label for="email" class="">{{ __('E-Mail Address') }}</label>
                                        <input id="email" type="email"
                                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" value="{{ $user->email }}" required>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="phone_no" class="">{{ __('Phone No') }}</label>
                                        <input id="phone_no" type="text"
                                            class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}"
                                            name="phone_no" value="{{ $user->phone_no }}" required>

                                        @error('phone_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="division_id" class="">{{ __('Division') }}</label>
                                        <select class="form-control" name="division_id">
                                            <option value="">Please select your division</option>
                                            @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}" {{ $user->division_id == $division->id ? 'selected' : '' }}>
                                                {{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label for="district_id" class="">{{ __('District') }}</label>
                                        <select class="form-control" name="district_id">
                                            <option value="">Please select your district</option>
                                            @foreach ($districts as $district)
                                            <option value="{{ $district->id }}"
                                                {{ $user->district_id == $district->id ? 'selected' : '' }}>
                                                {{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label for="street_address" class="">{{ __('Street Address') }}</label>
                                        <input id="street_address" type="text"
                                            class="form-control{{ $errors->has('street_address') ? ' is-invalid' : '' }}"
                                            name="street_address" value="{{ $user->street_address }}" required>

                                        @error('street_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="street_address" class="">{{ __('Shipping Address (Optional)') }}</label>
                                        <textarea id="shipping_address" type="text"
                                            class="form-control{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}"
                                            name="shipping_address" value=""
                                            rows="5">{{ $user->shipping_address }}</textarea>

                                        @error('shipping_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="password" class="">{{ __('New Password (Optional)') }}</label>
                                        <input id="password" type="password"
                                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>UPDATE PROFILE</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>

                            </div>

                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div>
    </div>
</main>

<script src="{{ asset('public/frontend/assets/js/wNumb.js')}}"></script>
<script src="{{ asset('public/frontend/assets/js/nouislider.min.js')}}"></script>
@endsection