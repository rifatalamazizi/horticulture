<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="product-details-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-gallery">
                                <figure class="product-main-image">
                                    <span class="product-label label-top">Top</span>
                                    <!-- <img id="product-zoom"
                                            src="{{ url('public/frontend/assets/images/products/single/sidebar-gallery/1.jpg')}}"
                                            data-zoom-image="{{ url('public/frontend/assets/images/products/single/sidebar-gallery/1-big.jpg')}}"
                                            alt="product image"> -->

                                    @php $i = 1; @endphp

                                    @foreach($product->images as $image)
                                    <!-- $images comes from Product Model function -->

                                    @if($i > 0)
                                    <a href="{{ route('products.show', $product->slug) }}">
                                        <img src="{{url('public/frontend/assets/images/products/' . $image->image)}}"
                                            alt="{{ $product->title }}" />
                                    </a>
                                    @endif
                                    <!-- $image->image Here < image > comes from << product_images table >> -->

                                    @php $i--; @endphp

                                    @endforeach

                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </figure><!-- End .product-main-image -->

                                @php $i = 1; @endphp
                                @foreach($product->images as $image)
                                <div id="product-zoom-gallery" class="product-image-gallery">
                                    <!-- active -->
                                    <a class="product-gallery-item {{ $i == 1 ? 'active' : '' }}" href="#"
                                        data-image="{{ url('public/frontend/assets/images/products/'. $image->image) }}"
                                        data-zoom-image="{{ url('public/frontend/assets/images/products/'. $image->image) }}">
                                        <img src="{{ url('public/frontend/assets/images/products/'. $image->image) }}"
                                            alt="{{ $product->title }}">
                                    </a>
                                </div>
                                @endforeach
                                @php $i++; @endphp
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="product-details product-details-sidebar">
                                <h1 class="product-title">{{ $product->title }}</h1>
                                <!-- End .product-title -->

                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews
                                        )</a>
                                </div><!-- End .rating-container -->

                                <div class="product-price" style="color:#A6C76C">
                                    {{ $product->price }} TK
                                </div><!-- End .product-price -->

                                <div class="product-content">
                                    <p>{{ $product->description }}</p>
                                </div><!-- End .product-content -->


                                <div class="product-details-action">
                                    <div class="details-action-col">
                                        <label for="qty">Qty:</label>
                                        <div class="product-details-quantity">
                                            <input type="number" id="qty" class="form-control"
                                                value="{{ $product->quantity }}" min="1" max="" step="1"
                                                data-decimals="0">
                                        </div><!-- End .product-details-quantity -->

                                        

                                        <form class="form-inline" action="{{ route('carts.store') }}" method="post">
                                            @csrf
                                            
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <button type="submit" href="#" class="btn-product btn-cart" style="background-color:#A6C76C; color:white; border-color:#A6C76C;"><span>add to cart</span></button>
                                           
                                        </form>
                                    </div><!-- End .details-action-col -->
                                </div><!-- End .product-details-action -->

                                <div class="product-details-footer details-footer-col">
                                    <div class="product-cat">
                                        <span>Category:</span>

                                        <!-- SHORT NOTE : -->
                                        <!-- Write $product->category->name after completing product select category part -->
                                        <a href="#">{{ $product->category->name }}</a>

                                    </div><!-- End .product-cat -->

                                    <div class="product-cat">
                                        <span>Brand:</span>

                                        <!-- SHORT NOTE : -->
                                        <!-- Write $product->category->name after completing product select category part -->
                                        <a href="#">{{ $product->brand->name }}</a>

                                    </div>

                                    <div class="product-cat">
                                        <span>Stock:</span>
                                        <!-- put category name after category is added into add product and edit product into admin panel -->
                                        <a>{{ $product->quantity < 1 ? ' No Item is Available' : $product->quantity.' Item in stock' }}</a>
                                    </div><!-- End .product-cat -->

                                    <div class="social-icons social-icons-sm">
                                        <span class="social-label">Share:</span>
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                                class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                                class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                                class="icon-instagram"></i></a>
                                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i
                                                class="icon-pinterest"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Details Start -->
                <div class="product-details-tab">
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                                role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab"
                                role="tab" aria-controls="product-info-tab" aria-selected="false">Additional
                                information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-shipping-link" data-toggle="tab"
                                href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab"
                                aria-selected="false">Shipping & Returns</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab"
                                role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                            aria-labelledby="product-desc-link">
                            <div class="product-desc-content">
                                <h3>Product Information</h3>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque
                                    volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra
                                    non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis
                                    fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque
                                    felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer
                                    ligula vulputate sem tristique cursus. </p>
                                <ul>
                                    <li>Nunc nec porttitor turpis. In eu risus enim. In vitae mollis elit. </li>
                                    <li>Vivamus finibus vel mauris ut vehicula.</li>
                                    <li>Nullam a magna porttitor, dictum risus nec, faucibus sapien.</li>
                                </ul>

                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque
                                    volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra
                                    non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis
                                    fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque
                                    felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer
                                    ligula vulputate sem tristique cursus. </p>
                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade" id="product-info-tab" role="tabpanel"
                            aria-labelledby="product-info-link">
                            <div class="product-desc-content">
                                <h3>Information</h3>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque
                                    volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra
                                    non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis
                                    fermentum. Aliquam porttitor mauris sit amet orci. </p>

                                <h3>Fabric & care</h3>
                                <ul>
                                    <li>Faux suede fabric</li>
                                    <li>Gold tone metal hoop handles.</li>
                                    <li>RI branding</li>
                                    <li>Snake print trim interior </li>
                                    <li>Adjustable cross body strap</li>
                                    <li> Height: 31cm; Width: 32cm; Depth: 12cm; Handle Drop: 61cm</li>
                                </ul>

                                <h3>Size</h3>
                                <p>one size</p>
                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel"
                            aria-labelledby="product-shipping-link">
                            <div class="product-desc-content">
                                <h3>Delivery & returns</h3>
                                <p>We deliver to over 100 countries around the world. For full details of the
                                    delivery options we offer, please view our <a href="#">Delivery
                                        information</a><br>
                                    We hope you’ll love every purchase, but if you ever need to return an item you
                                    can do so within a month of receipt. For full details of how to make a return,
                                    please view our <a href="#">Returns information</a></p>
                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                            aria-labelledby="product-review-link">
                            <div class="reviews">
                                <h3>Reviews (2)</h3>
                                <div class="review">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <h4><a href="#">Samanta J.</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 80%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                            </div><!-- End .rating-container -->
                                            <span class="review-date">6 days ago</span>
                                        </div><!-- End .col -->
                                        <div class="col">
                                            <h4>Good, perfect size</h4>

                                            <div class="review-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus
                                                    cum dolores assumenda asperiores facilis porro reprehenderit
                                                    animi culpa atque blanditiis commodi perspiciatis doloremque,
                                                    possimus, explicabo, autem fugit beatae quae voluptas!</p>
                                            </div><!-- End .review-content -->

                                            <div class="review-action">
                                                <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                                <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                            </div><!-- End .review-action -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .row -->
                                </div><!-- End .review -->

                                <div class="review">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <h4><a href="#">John Doe</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 100%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                            </div><!-- End .rating-container -->
                                            <span class="review-date">5 days ago</span>
                                        </div><!-- End .col -->
                                        <div class="col">
                                            <h4>Very good</h4>

                                            <div class="review-content">
                                                <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum
                                                    blanditiis laudantium iste amet. Cum non voluptate eos enim, ab
                                                    cumque nam, modi, quas iure illum repellendus, blanditiis
                                                    perspiciatis beatae!</p>
                                            </div><!-- End .review-content -->

                                            <div class="review-action">
                                                <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                                <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                            </div><!-- End .review-action -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .row -->
                                </div><!-- End .review -->
                            </div><!-- End .reviews -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div>
                <!-- Product Details end -->

                <!-- Suggestion product start -->
                
                <!-- Suggestion product End -->
            </div>

            <!-- Right sidebar start -->
            
            <!-- Right sidebar end -->

        </div>

    </div>
</div>