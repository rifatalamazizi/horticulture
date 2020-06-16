@extends('frontend.layout.master')

@section('header-bottom')
@include('frontend.partials.header_bottom')
@endsection

@section('content')
<main class="main">

    <!-- <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Grid 4 Columns<span>Shop</span></h1>
        </div>
    </div> -->

    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}" style="color:#3399ff;">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product') }}" style="color:#3399ff;">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="{{ route('product') }}">Featured Product</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="toolbox" style="background:none; padding:0;">
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                <h2 class="title">All Products In - <span class="badge badge-warning">{{ $category->name }}</span></h2>
                            </div>
                        </div>

                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sort by:</label>
                                <div class="select-custom">
                                    <select name="sortby" id="sortby" class="form-control">
                                        <option value="popularity" selected="selected">Most Popular</option>
                                        <option value="rating">Most Rated</option>
                                        <option value="date">Date</option>
                                    </select>
                                </div>
                            </div><!-- End .toolbox-sort -->
                        </div>
                    </div>

                    <div class="products mb-3">
                        <div class="row justify-content-center">
                            <!-- here $category is for category table and < products > is a method where all products comes from product table -->
                            @php
                                $products = $category->products()->paginate(12);
                            @endphp

                            @if($products->count() > 0)
                                @include('frontend.pages.product.partials.features_item')
                            @else
                            <div class="alert alert-warning">
                                No Products has added yet in this category !!
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                @include('frontend.partials.sidebar_product')

            </div>
        </div>
    </div>
</main>

<script src="{{ asset('public/frontend/assets/js/wNumb.js')}}"></script>
<script src="{{ asset('public/frontend/assets/js/nouislider.min.js')}}"></script>
@endsection