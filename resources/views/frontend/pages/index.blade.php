@extends('frontend.layout.master')

@section('header-bottom')
@include('frontend.partials.header_bottom')
@endsection

@section('content')
<main class="main">

    <!-- slider-container Start -->
    <div class="intro-slider-container">

        <div class="intro-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" data-owl-options='{
                        "nav": false,
                        "responsive": {
                            "992": {
                                "nav": true
                            }
                        }
                    }'>

            @foreach($sliders as $slider)
            <div class="intro-slide"
                style="background-image: url('{{ url('public/backend/images/sliders/' . $slider->image) }}');">
                <div class="container intro-content">
                    <div class="row">
                        <div class="col-auto offset-lg-3 intro-col">

                            <h3 class="intro-subtitle" style="color:white;">Get Discount Offer</h3>

                            <h1 class="intro-title" style="color:white;">All Special <br>Plant Collection
                                <span>
                                    <sup class="font-weight-light" style="color:white;">from</sup>
                                    <span class="" style="color:white;">1000<sup>TK</sup></span>
                                </span>
                            </h1>

                            <a href="category.html" class="btn btn-outline-white-2" style="background-color:#A6C76C">
                                <span>Shop Now</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <span class="slider-loader"></span>
    </div>
    <!-- slider-container End -->

    <div class="mb-4"></div>

    <div class="container">
        <h2 class="title text-center mb-2">Explore Your Plants</h2><!-- End .title -->

        <div class="cat-blocks-container">
            <div class="row">
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="category.html" class="cat-block">
                        <figure>
                            <span>
                                <img src="{{ url('public/frontend/assets/images/demos/demo-13/cats/plannt1.jpg')}}"
                                    alt="Category image">
                            </span>
                        </figure>

                        <h3 class="cat-block-title">Aloe Vera</h3><!-- End .cat-block-title -->
                    </a>
                </div><!-- End .col-sm-4 col-lg-2 -->

                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="category.html" class="cat-block">
                        <figure>
                            <span>
                                <img src="{{ url('public/frontend/assets/images/demos/demo-13/cats/plannt2.jpg')}}"
                                    alt="Category image">
                            </span>
                        </figure>

                        <h3 class="cat-block-title">Argyroderma testiculare</h3><!-- End .cat-block-title -->
                    </a>
                </div><!-- End .col-sm-4 col-lg-2 -->

                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="category.html" class="cat-block">
                        <figure>
                            <span>
                                <img src="{{ url('public/frontend/assets/images/demos/demo-13/cats/plannt3.jpg')}}"
                                    alt="Category image">
                            </span>
                        </figure>

                        <h3 class="cat-block-title">Baby Rubber</h3><!-- End .cat-block-title -->
                    </a>
                </div><!-- End .col-sm-4 col-lg-2 -->

                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="category.html" class="cat-block">
                        <figure>
                            <span>
                                <img src="{{ url('public/frontend/assets/images/demos/demo-13/cats/plannt4.jpg')}}"
                                    alt="Category image">
                            </span>
                        </figure>

                        <h3 class="cat-block-title">Bunny Ear Cactus</h3><!-- End .cat-block-title -->
                    </a>
                </div><!-- End .col-sm-4 col-lg-2 -->

                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="category.html" class="cat-block">
                        <figure>
                            <span>
                                <img src="{{ url('public/frontend/assets/images/demos/demo-13/cats/plannt5.jpg')}}"
                                    alt="Category image">
                            </span>
                        </figure>

                        <h3 class="cat-block-title">Century Plant</h3><!-- End .cat-block-title -->
                    </a>
                </div><!-- End .col-sm-4 col-lg-2 -->

                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="category.html" class="cat-block">
                        <figure>
                            <span>
                                <img src="{{ url('public/frontend/assets/images/demos/demo-13/cats/plannt6.jpg')}}"
                                    alt="Category image">
                            </span>
                        </figure>

                        <h3 class="cat-block-title">Woodent Plant</h3><!-- End .cat-block-title -->
                    </a>
                </div><!-- End .col-sm-4 col-lg-2 -->
            </div><!-- End .row -->
        </div><!-- End .cat-blocks-container -->
    </div>
    <!-- container End -->

    <div class="mb-2"></div>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="banner banner-overlay">
                    <a href="#">

                        <img src="{{ url('public/frontend/assets/images/demos/demo-13/banners/left-banner.jpg')}}"
                            alt="Banner">
                    </a>

                    <div class="banner-content">
                        <!-- End .banner-subtitle -->
                        <h3 class="banner-title text-white"><a href="#">Flower <br>Garden Making <br><span>25%
                                    off</span></a></h3><!-- End .banner-title -->
                        <a href="#" class="banner-link">Enroll Now <i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-lg-3 -->

            <div class="col-sm-6 col-lg-3 order-lg-last">
                <div class="banner banner-overlay">
                    <a href="#">
                        <img src="{{ url('public/frontend/assets/images/demos/demo-13/banners/rightbanner.jpg')}}"
                            alt="Banner">
                    </a>

                    <div class="banner-content">
                        <!-- End .banner-subtitle -->
                        <h3 class="banner-title text-white"><a href="#">Basic <br>Planting <br><span>15%
                                    off</span></a></h3><!-- End .banner-title -->
                        <a href="#" class="banner-link">Enroll Now <i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-lg-3 -->

            <div class="col-lg-6">
                <div class="banner banner-overlay">
                    <a href="#">
                        <img src="{{ url('public/frontend/assets/images/demos/demo-13/banners/middle-banner.jpg')}}"
                            alt="Banner">
                    </a>

                    <div class="banner-content">
                        </h4><!-- End .banner-subtitle -->
                        <h3 class="banner-title text-white"><a href="#">Indoor <br>Gardening
                                2020 <br><span>from 2500 TK</span></a></h3><!-- End .banner-title -->
                        <a href="#" class="banner-link">Enroll Now <i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-lg-6 -->
        </div><!-- End .row -->
    </div>
    <!-- container End -->

    <div class="mb-3"></div>

    <div class="container electronics">
        <div class="heading heading-flex heading-border mb-3">
            <div class="heading-left">
                <h2 class="title">Featured Items</h2><!-- End .title -->
            </div>
        </div>

        <div class="products mb-3">
            <div class="row justify-content-center">
                @include('frontend.pages.product.partials.features_item')
            </div>
        </div>
    </div>

    <div class="mb-3"></div><!-- End .mb-3 -->

    

    <div class="mb-1"></div><!-- End .mb-1 -->

    <div class="mb-3"></div><!-- End .mb-3 -->

    
    <div class="mb-3"></div><!-- End .mb-3 -->

    

    <div class="cta cta-horizontal cta-horizontal-box" style="background-color:#A6C76C;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-2xl-5col">
                    <h3 class="cta-title text-white">Join Our Newsletter</h3><!-- End .cta-title -->
                    <p class="cta-desc text-white">Subcribe to get information about products and coupons</p>
                    <!-- End .cta-desc -->
                </div><!-- End .col-lg-5 -->

                <div class="col-3xl-5col">
                    <form action="#">
                        <div class="input-group">
                            <input type="email" class="form-control form-control-white"
                                placeholder="Enter your Email Address" aria-label="Email Adress" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-white-2" type="submit"><span>Subscribe</span><i
                                        class="icon-long-arrow-right"></i></button>
                            </div><!-- .End .input-group-append -->
                        </div><!-- .End .input-group -->
                    </form>
                </div><!-- End .col-lg-7 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .cta -->

    <div class="blog-posts bg-light pt-4 pb-7">
        <div class="container">
            <h2 class="title">From Our Blog</h2><!-- End .title-lg text-center -->

            <div class="owl-carousel owl-simple" data-toggle="owl" data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "items": 3,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "600": {
                                    "items":2
                                },
                                "992": {
                                    "items":3
                                },
                                "1280": {
                                    "items":4,
                                    "nav": true, 
                                    "dots": false
                                }
                            }
                        }'>
                <article class="entry">
                    <figure class="entry-media">
                        <a href="single.html">
                            <img src="{{ url('public/frontend/assets/images/demos/demo-13/blog/blog-1.jpg')}}"
                                alt="image desc">
                        </a>
                    </figure><!-- End .entry-media -->

                    <div class="entry-body">
                        <div class="entry-meta">
                            <a href="#">Nov 22, 2018</a>, 0 Comments
                        </div><!-- End .entry-meta -->

                        <h3 class="entry-title">
                            <a href="single.html">Sed adipiscing ornare.</a>
                        </h3><!-- End .entry-title -->

                        <div class="entry-content">
                            <p>Lorem ipsum dolor consectetuer adipiscing elit. Phasellus hendrerit. Pelletesque
                                aliquet nibh ...</p>
                            <a href="single.html" class="" style="color:#A6C76C;">Read More</a>
                        </div><!-- End .entry-content -->
                    </div><!-- End .entry-body -->
                </article><!-- End .entry -->

                <article class="entry">
                    <figure class="entry-media">
                        <a href="single.html">
                            <img src="{{ url('public/frontend/assets/images/demos/demo-13/blog/blog-2.jpg')}}"
                                alt="image desc">
                        </a>
                    </figure><!-- End .entry-media -->

                    <div class="entry-body">
                        <div class="entry-meta">
                            <a href="#">Dec 12, 2018</a>, 0 Comments
                        </div><!-- End .entry-meta -->

                        <h3 class="entry-title">
                            <a href="single.html">Vivamus vestibulum ntulla.</a>
                        </h3><!-- End .entry-title -->

                        <div class="entry-content">
                            <p>Phasellus hendrerit. Pelletesque aliquet nibh necurna In nisi neque, aliquet vel,
                                dapibus id ... </p>
                                <a href="single.html" class="" style="color:#A6C76C;">Read More</a>
                        </div><!-- End .entry-content -->
                    </div><!-- End .entry-body -->
                </article><!-- End .entry -->

                <article class="entry">
                    <figure class="entry-media">
                        <a href="single.html">
                            <img src="{{ url('public/frontend/assets/images/demos/demo-13/blog/blog-3.jpg')}}"
                                alt="image desc">
                        </a>
                    </figure><!-- End .entry-media -->

                    <div class="entry-body">
                        <div class="entry-meta">
                            <a href="#">Dec 19, 2018</a>, 2 Comments
                        </div><!-- End .entry-meta -->

                        <h3 class="entry-title">
                            <a href="single.html">Praesent placerat risus.</a>
                        </h3><!-- End .entry-title -->

                        <div class="entry-content">
                            <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget
                                blandit nunc ...</p>
                                <a href="single.html" class="" style="color:#A6C76C;">Read More</a>
                        </div><!-- End .entry-content -->
                    </div><!-- End .entry-body -->
                </article><!-- End .entry -->

                <article class="entry">
                    <figure class="entry-media">
                        <a href="single.html">
                            <img src="{{ url('public/frontend/assets/images/demos/demo-13/blog/blog-4.jpg')}}"
                                alt="image desc">
                        </a>
                    </figure><!-- End .entry-media -->

                    <div class="entry-body">
                        <div class="entry-meta">
                            <a href="#">Dec 19, 2018</a>, 2 Comments
                        </div><!-- End .entry-meta -->

                        <h3 class="entry-title">
                            <a href="single.html">Fusce pellentesque suscipit.</a>
                        </h3><!-- End .entry-title -->

                        <div class="entry-content">
                            <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus
                                libero augue. </p>
                                <a href="single.html" class="" style="color:#A6C76C;">Read More</a>
                        </div><!-- End .entry-content -->
                    </div><!-- End .entry-body -->
                </article><!-- End .entry -->

                <article class="entry">
                    <figure class="entry-media">
                        <a href="single.html">
                            <img src="{{ url('public/frontend/assets/images/demos/demo-13/blog/blog-1.jpg')}}"
                                alt="image desc">
                        </a>
                    </figure><!-- End .entry-media -->

                    <div class="entry-body">
                        <div class="entry-meta">
                            <a href="#">Nov 22, 2018</a>, 0 Comments
                        </div><!-- End .entry-meta -->

                        <h3 class="entry-title">
                            <a href="single.html">Sed adipiscing ornare.</a>
                        </h3><!-- End .entry-title -->

                        <div class="entry-content">
                            <p>Lorem ipsum dolor consectetuer adipiscing elit. Phasellus hendrerit. Pelletesque
                                aliquet nibh ...</p>
                            <a href="single.html" class="read-more">Read More</a>
                        </div><!-- End .entry-content -->
                    </div><!-- End .entry-body -->
                </article><!-- End .entry -->
            </div><!-- End .owl-carousel -->
        </div><!-- End .container -->
    </div><!-- End .blog-posts -->
</main><!-- End .main -->
@endsection

@section('icon-box')
<div class="icon-boxes-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="icon-box icon-box-side">
                    <span class="icon-box-icon">
                        <i class="icon-rocket"></i>
                    </span>

                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Free Shipping</h3><!-- End .icon-box-title -->
                        <p>Orders $50 or more</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-sm-6 col-lg-3 -->

            <div class="col-sm-6 col-lg-3">
                <div class="icon-box icon-box-side">
                    <span class="icon-box-icon">
                        <i class="icon-rotate-left"></i>
                    </span>

                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Free Returns</h3><!-- End .icon-box-title -->
                        <p>Within 30 days</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-sm-6 col-lg-3 -->

            <div class="col-sm-6 col-lg-3">
                <div class="icon-box icon-box-side">
                    <span class="icon-box-icon">
                        <i class="icon-info-circle"></i>
                    </span>

                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Get 20% Off 1 Item</h3><!-- End .icon-box-title -->
                        <p>When you sign up</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-sm-6 col-lg-3 -->

            <div class="col-sm-6 col-lg-3">
                <div class="icon-box icon-box-side">
                    <span class="icon-box-icon">
                        <i class="icon-life-ring"></i>
                    </span>

                    <div class="icon-box-content">
                        <h3 class="icon-box-title">We Support</h3><!-- End .icon-box-title -->
                        <p>24/7 amazing services</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-sm-6 col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .icon-boxes-container -->
@endsection

@section('popup')
@include('frontend.partials.popup')
<!-- Call this where you want to popup newsletter -->
@endsection