<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    
    <!-- Real Time Add To Cart -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Real Time Add To Cart -->

    @include('frontend.partials.style')
</head>

<body>
    <div class="page-wrapper">

        <!-- Every page call this and delete or keep bottom left header as you need -->
        <header class="header header-10 header-intro-clearance">

            @include('frontend.partials.top_middle_header')

            @yield('header-bottom')

        </header><!-- End .header -->

        @yield('content')

        <footer class="footer footer-2">

            @yield('icon-box')

            @include('frontend.partials.footer')
        </footer><!-- End .footer -->

    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    @include('frontend.partials.mobile_menu')

    @include('frontend.partials.signin_signup')

    @yield('popup')

    @include('frontend.partials.script')

    @yield('scripts')
</body>

</html>