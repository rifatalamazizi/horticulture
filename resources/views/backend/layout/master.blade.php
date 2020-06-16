<!DOCTYPE html>
<html lang="en">

<head>

    @include('backend.partials.meta_title')

    @include('backend.partials.style')

</head>

<body>

    <!-- Loader start -->
    <!-- //... Write your loader include code if you want to run loader -->
    <!-- Loader End -->

    <!-- Start wrapper-->
    <div id="wrapper">

        @include('backend.partials.sidebar')

        @include('backend.partials.header')

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <div class="container-fluid">

                @yield('admin_content')

                <!--start overlay-->
                <div class="overlay toggle-menu"></div>
                <!--end overlay-->

            </div>
            <!-- End container-fluid-->

        </div>
        <!--End content-wrapper-->
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

        @include('backend.partials.footer')

        <!--start color switcher-->
        <div class="right-sidebar">
            <div class="right-sidebar-content">


                <p class="mb-0">Header Colors</p>
                <hr>

                <div class="mb-3">
                    <button type="button" id="default-header" class="btn btn-outline-primary">Default Header</button>
                </div>

                <ul class="switcher">
                    <li id="header1"></li>
                    <li id="header2"></li>
                    <li id="header3"></li>
                    <li id="header4"></li>
                    <li id="header5"></li>
                    <li id="header6"></li>
                </ul>

                <p class="mb-0">Sidebar Colors</p>
                <hr>

                <div class="mb-3">
                    <button type="button" id="default-sidebar" class="btn btn-outline-primary">Default Header</button>
                </div>

                <ul class="switcher">
                    <li id="theme1"></li>
                    <li id="theme2"></li>
                    <li id="theme3"></li>
                    <li id="theme4"></li>
                    <li id="theme5"></li>
                    <li id="theme6"></li>
                </ul>

            </div>
        </div>
        <!--end color switcher-->

    </div>
    <!--End wrapper-->

    @include('backend.partials.script')

    @yield('index_script')


</body>

</html>