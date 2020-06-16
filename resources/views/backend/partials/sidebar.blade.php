<!--Start sidebar-wrapper-->
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="index.html">
            <img src="{{ url('public/backend/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
            <h5 class="logo-text">Dashtreme Admin</h5>
        </a>
    </div>
    <div class="user-details">
        <div class="media align-items-center user-pointer collapsed" data-toggle="collapse"
            data-target="#user-dropdown">
            <div class="avatar"><img class="mr-3 side-user-img" src="https://via.placeholder.com/110x110"
                    alt="user avatar"></div>
            <div class="media-body">
                <h6 class="side-user-name">Mark Johnson</h6>
            </div>
        </div>
        <div id="user-dropdown" class="collapse">
            <ul class="user-setting-menu">
                <li><a href="javaScript:void();"><i class="icon-user"></i> My Profile</a></li>
                <li><a href="javaScript:void();"><i class="icon-settings"></i> Setting</a></li>
                <li><a href="javaScript:void();"><i class="icon-power"></i> Logout</a></li>
            </ul>
        </div>
    </div>
    <ul class="sidebar-menu">
        <li class="sidebar-header">MAIN NAVIGATION</li>
        <!-- Dashboard start -->
        <li>
            <a href="javaScript:void();" class="waves-effect">
                <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span><i
                    class="fa fa-angle-left float-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="{{ route('admin.index') }}"><i class="zmdi zmdi-dot-circle-alt"></i> eCommerce</a></li>
                </li>
            </ul>
        </li>
        <!-- Dashboard end -->

        <!-- Product start -->
        <li>
            <a href="javaScript:void();" class="waves-effect">
                <i class="zmdi zmdi-view-dashboard"></i> <span>Product</span><i
                    class="fa fa-angle-left float-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="{{ route('admin.product.create') }}"><i class="zmdi zmdi-dot-circle-alt"></i>Add Product</a></li>
                <li><a href="{{ route('admin.product.manage') }}"><i class="zmdi zmdi-dot-circle-alt"></i>Manage Product</a></li>
            </ul>
        </li>
        <!-- Product end -->

        <!-- Order start -->
        <li class="bg-warning">
            <a href="{{ route('admin.order') }}" class="waves-effect text-white">
                <i class="zmdi zmdi-view-dashboard"></i> <span>Manage Order</span>
            </a>
        </li>
        <!-- Order end -->

        <!-- Category start -->
        <li>
            <a href="javaScript:void();" class="waves-effect">
                <i class="zmdi zmdi-view-dashboard"></i> <span>Category</span><i
                    class="fa fa-angle-left float-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="{{ route('admin.category.create') }}"><i class="zmdi zmdi-dot-circle-alt"></i>Add Category</a></li>
                <li><a href="{{ route('admin.category.manage') }}"><i class="zmdi zmdi-dot-circle-alt"></i>Manage Category</a></li>
            </ul>
        </li>
        <!-- Category end -->

        <!-- Brand start -->
        <li>
            <a href="javaScript:void();" class="waves-effect">
                <i class="zmdi zmdi-view-dashboard"></i> <span>Brand</span><i
                    class="fa fa-angle-left float-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="{{ route('admin.brand.create') }}"><i class="zmdi zmdi-dot-circle-alt"></i>Add Brand</a></li>
                <li><a href="{{ route('admin.brand.manage') }}"><i class="zmdi zmdi-dot-circle-alt"></i>Manage Brand</a></li>
            </ul>
        </li>
        <!-- Brand end -->

        <!-- Division start -->
        <li>
            <a href="javaScript:void();" class="waves-effect">
                <i class="zmdi zmdi-view-dashboard"></i> <span>Division</span><i
                    class="fa fa-angle-left float-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="{{ route('admin.division.create') }}"><i class="zmdi zmdi-dot-circle-alt"></i>Add Division</a></li>
                <li><a href="{{ route('admin.division.manage') }}"><i class="zmdi zmdi-dot-circle-alt"></i>Manage Division</a></li>
            </ul>
        </li>
        <!-- Division end -->

        <!-- District start -->
        <li>
            <a href="javaScript:void();" class="waves-effect">
                <i class="zmdi zmdi-view-dashboard"></i> <span>District</span><i
                    class="fa fa-angle-left float-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="{{ route('admin.district.create') }}"><i class="zmdi zmdi-dot-circle-alt"></i>Add District</a></li>
                <li><a href="{{ route('admin.district.manage') }}"><i class="zmdi zmdi-dot-circle-alt"></i>Manage District</a></li>
            </ul>
        </li>
        <!-- District end -->

        <!-- Slider start -->
        <li class="bg-warning">
            <a href="{{ route('admin.slider.manage') }}" class="waves-effect text-white">
                <i class="zmdi zmdi-view-dashboard"></i> <span>Manage Slider</span>
            </a>
        </li>
        <!-- Slider end -->

    </ul>

</div>
<!--End sidebar-wrapper-->