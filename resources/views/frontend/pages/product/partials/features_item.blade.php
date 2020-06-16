@foreach($products as $product)
<div class="col-6 col-md-4 col-lg-4 col-xl-3">
    <div class="product product-7 text-center">
        <figure class="product-media">
            <span class="product-label label-new">New</span>
            <!-- <a href="product.html">
                <img src="{{ url('public/frontend/assets/images/products/product-4.jpg')}}" alt="Product image" class="product-image">
            </a> -->

            <!-- <img src="{{url('public/frontend/images/home/product1.jpg')}}" alt="" /> -->
            @php $i = 1; @endphp

            @foreach($product->images as $image)
            <!-- $images comes from Product Model function -->

            @if($i > 0)
            <a href="{{ route('products.show', $product->slug) }}">
                <img src="{{url('public/frontend/assets/images/products/' . $image->image)}}"
                    alt="{{ $product->title }} " />
            </a>
            @endif
            <!-- $image->image Here < image > comes from << product_images table >> -->

            @php $i--; @endphp

            @endforeach

            <!-- Short Note :::
                    
            1-> When i=1 then enter the foreach loop and check if condition and print image one time.

            2-> when it comes after passing if condition then it lose it's value [ one by one -- ] and now its value = 0
            
            3-> Then again it goes to i and when goes to check if condition again
            now [ its value is = 0 and 0 is not greater then 0 ]

            4-> So condition stop its journey and as it can't run so image can't print again. 
            
            -->

            <div class="product-action-vertical">
                <a href="#" class="btn-product-icon btn-wishlist btn-expandable" style="background-color:#A6C76C; color:white; border-color:#A6C76C;"><span>add
                        to wishlist</span></a>
                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view" style="background-color:#A6C76C; color:white; border-color:#A6C76C;"><span>Quick
                        view</span></a>
                <a href="#" class="btn-product-icon btn-compare" title="Compare" style="background-color:#A6C76C; color:white; border-color:#A6C76C;"><span>Compare</span></a>
            </div>

            <!-- <div class="product-action">
                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
            </div> -->
            @include('frontend.pages.product.partials.cart_button')
        </figure>

        <div class="product-body">
            <div class="product-cat">

                <!-- SHORT NOTE : -->
                <!-- Write $product->category->name after completing product select category part -->
                <P>{{ $product->category->name }}</P>

            </div><!-- End .product-cat -->
            <h3 class="product-title">
                <a href="{{ route('products.show', $product->slug) }}" class="h5">{{ $product->title }}</a>
            </h3>
            <div class="product-price" style="color:#A6C76C">
                {{ $product->price }} TK
            </div><!-- End .product-price -->
            <div class="ratings-container">
                <div class="ratings">
                    <div class="ratings-val" style="width: 90%;"></div>
                    <!-- End .ratings-val -->
                </div><!-- End .ratings -->
                <span class="ratings-text">( 2 Reviews )</span>
            </div><!-- End .rating-container -->

            <!-- <div class="product-nav product-nav-thumbs">
                <a href="#" class="active">
                    <img src="{{ url('public/frontend/assets/images/products/product-4-thumb.jpg')}}"
                        alt="product desc">
                </a>
                <a href="#">
                    <img src="{{ url('public/frontend/assets/images/products/product-4-2-thumb.jpg')}}"
                        alt="product desc">
                </a>

                <a href="#">
                    <img src="{{ url('public/frontend/assets/images/products/product-4-3-thumb.jpg')}}"
                        alt="product desc">
                </a>
            </div> -->
        </div>
    </div>
</div>
@endforeach


<ul class="pagination justify-content-center">
    {{ $products->links() }}
</ul>