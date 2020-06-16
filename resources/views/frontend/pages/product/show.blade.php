@extends('frontend.layout.master')

@section('title')
{{ $product->title }} | Ecommerce Site
@endsection

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
                <li class="breadcrumb-item"><a href="{{ route('index') }}" style="color:#A6C76C;">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product') }}" style="color:#A6C76C;">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="{{ route('product') }}">{{ $product->title }}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    @include('frontend.pages.product.partials.details')
</main><!-- End .main -->
@endsection