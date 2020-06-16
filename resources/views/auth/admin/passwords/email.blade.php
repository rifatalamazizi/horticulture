@extends('frontend.layout.master')

@section('header-bottom')
@include('frontend.partials.header_bottom')
@endsection

@section('content')
<main class="main">

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
        style="background-image: url(' {{ url('public/frontend/assets/images/backgrounds/login-bg.jpg')}}')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">

                    <!-- header PASSWORD RESET START -->
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab"
                                aria-controls="signin-2" aria-selected="true">{{ __('ADMIN RESET PASSWORD') }}</a>
                        </li>
                    </ul>
                    <!-- header PASSWORD RESET END -->

                    <!-- PASSWORD RESET LINK START -->
                    <div class="tab-content">

                        <!-- SIGN IN PART START -->
                        <div class="tab-pane fade show active" id="signin-2" role="tabpanel"
                            aria-labelledby="signin-tab-2">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            <form method="POST" action="{{ route('admin.password.email') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="email" class="">{{ __('E-Mail Address') }}</label>

                                    <div class="">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <div class="">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- SIGN IN PART END -->

                </div>
                <!-- PASSWORD RESET LINK END -->

            </div>
        </div>
    </div>
    </div>
</main>
@endsection