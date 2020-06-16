<div class="header-top">
    <div class="container">
        <div class="header-left">
            <a href="tel:#"><i class="icon-phone"></i>Call: +880 13056 92279</a>
        </div>

        <div class="header-right">
            <ul class="top-menu">
                <li>
                    <a href="#">Links</a>
                    <ul>
                        <li>
                            <div class="header-dropdown">
                                <a href="#">USD</a>
                                <div class="header-menu">
                                    <ul>
                                        <li><a href="#">Eur</a></li>
                                        <li><a href="#">Usd</a></li>
                                    </ul>
                                </div><!-- End .header-menu -->
                            </div><!-- End .header-dropdown -->
                        </li>

                        <li>
                            <div class="header-dropdown">
                                <a href="#">Engligh</a>
                                <div class="header-menu">
                                    <ul>
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">French</a></li>
                                        <li><a href="#">Spanish</a></li>
                                    </ul>
                                </div><!-- End .header-menu -->
                            </div><!-- End .header-dropdown -->
                        </li>

                        

                        <li>
                            <div class="header-dropdown">
                                @guest
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" v-pre>
                                    Sing In
                                </a>
                                <div class="header-menu">
                                    <ul>
                                        <li>
                                            <!-- dropdown-item for bg color into Logout -->
                                            <a class="" href="{{ route('admin.login') }}"  style="color:#A6C76C;">
                                                {{ __('Admin') }}
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ route('login') }}"  style="color:#A6C76C;">
                                                {{ __('User') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="header-dropdown">
                                @if (Route::has('register'))
                                <!-- it was in guest -->
                                <a class="nav-link" href="{{ route('register') }}" style="color:#A6C76C;">{{ __('SIGN UP') }}</a>
                                @endif
                            </div>
                        </li>

                        @else
                        <div class="header-dropdown">
                            <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre>

                                <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" alt=""
                                    style="margin-right:7px; width:40px;" class="rounded-circle">

                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <span class="caret"></span>
                            </a>
                            <div class="header-menu">
                                <ul>
                                    <li>
                                        <!-- dropdown-item for bg color into Logout -->
                                        <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('user.dashboard') }}">
                                            {{ __('My Dashboard') }}
                                        </a>
                                    </li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        </div>
                        @endguest

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="header-middle">
    <div class="container">
        <div class="header-left">
            <button class="mobile-menu-toggler">
                <span class="sr-only">Toggle mobile menu</span>
                <i class="icon-bars"></i>
            </button>

            <a href="{{ route('index') }}" class="logo">
                <img src="{{ url('public/frontend/assets/images/demos/demo-13/site-logo.png')}}" alt="Horticulture Center" width="70%"
                    height="50%"">
            </a>
        </div><!-- End .header-left -->

        <div class="header-center">
            <div
                class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                <!-- Search Start -->
                <form action="{{ route('search') }}" method="get">
                    @csrf
                    <div class="header-search-wrapper search-wrapper-wide  border-success">
                        <div class="select-custom">

                            <select name="category_id" class="custom-select" id="category_id">
                                <option value="">Choose...</option>
                                <!-- Parent Category Start -->
                                @foreach(App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as
                                $parent)
                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>

                                <!-- Sub Category Start -->
                                @foreach(App\Models\Category::orderBy('name', 'asc')->where('parent_id',
                                $parent->id)->get() as $child)
                                <option value="{{ $child->id }}">- {{ $child->name }}</option>
                                @endforeach
                                <!-- Sub Category End -->

                                @endforeach
                                <!-- Parent Category End -->
                            </select>

                        </div>
                        <label for="q" class="sr-only">Search</label>
                        <input name="search" type="search" class="form-control" id="search"
                            placeholder="Search product ...">
                        <button class="btn" type="submit" style="background-color:#A6C76C"><i class="icon-search"></i></button>
                    </div>
                </form>
                <!-- Search End -->
            </div>
        </div>

        <div class="header-right">
            <div class="header-dropdown-link">
                <div class="dropdown compare-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" data-display="static" title="Compare Products"
                        aria-label="Compare Products">
                        <i class="icon-random" style="color:#A6C76C;"></i>
                        <span class="compare-txt" style="color:#A6C76C;">Compare</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="compare-products">
                            <li class="compare-product">
                                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                <h4 class="compare-product-title"><a href="product.html" style="color:#A6C76C;">Mini Tree Plant</a></h4>
                            </li>
                            <li class="compare-product">
                                <a href="#" class="btn-remove" title="Remove Product" style="color:#A6C76C;"><i class="icon-close"></i></a>
                                <h4 class="compare-product-title"><a href="product.html" style="color:#A6C76C;">Big Tree Plant</a></h4>
                            </li>
                        </ul>

                        <div class="compare-actions">
                            <a href="#" class="action-link">Clear All</a>
                            <a href="#" class="btn btn-outline-primary-2" style="border-color:#A6C76C; background-color:#A6C76C; color:white;"><span>Compare</span><i
                                    class="icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <a href="wishlist.html" class="wishlist-link" style="color:#A6C76C;">
                    <i class="icon-heart-o"></i>
                    <span class="wishlist-count" style="background-color:#A6C76C">3</span>
                    <span class="wishlist-txt" style="color:#A6C76C;">Wishlist</span>
                </a>

                <div class="dropdown cart-dropdown">

                    <!-- This will be into class -->
                    <!-- aria-haspopup="true" aria-expanded="false" data-display="static"  role="button" ata-toggle="dropdown" -->
                    <a href="{{ route('carts') }}" class="dropdown-toggle" style="color:#A6C76C;">
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-count" id="totalItems" style="background-color:#A6C76C">{{ App\Models\Cart::totalItems() }}</span>
                        <span class="cart-txt" style="color:#A6C76C;">{{ __('Cart') }}</span>
                    </a>

                    <!-- Cart Dropdown Start -->
                    <div class="dropdown-menu dropdown-menu-right">
                        @php
                        $total_price = 0;
                        @endphp

                        @foreach(App\Models\Cart::totalCarts() as $cart)
                        <div class="dropdown-cart-products">

                            <div class="product">
                                <div class="product-cart-details">
                                    <h4 class="product-title">
                                        <a href="">{{ $cart->product->title }}</a>
                                    </h4>

                                    <span class="cart-product-info">
                                        <span class="cart-product-qty">{{ $cart->product_quantity }}</span>
                                        x {{ $cart->product->price }} Taka
                                    </span>
                                </div>

                                <figure class="product-media product-image-container" style="background:none;">
                                    @if ($cart->product->images->count() > 0)
                                    <a href="{{ route('products.show', $cart->product->slug) }}">
                                        <img src="{{ asset('public/frontend/assets/images/products/'. $cart->product->images->first()->image) }}"
                                            width="50px" alt="Product image">
                                    </a>
                                    @endif
                                </figure>

                                <form class="form-inline" action="{{ route('carts.delete', $cart->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="cart_id" />
                                    <!-- <button class="btn-remove"><i class="icon-close"></i></button> -->
                                    <button href="#" class="btn-remove" title="Remove Product"><i
                                            class="icon-close"></i></button>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown-cart-total">
                            <span>Sub Total</span>
                            @php
                            $total_price = 0;
                            @endphp

                            <span class="cart-total-price">
                                @php
                                $total_price += $cart->product->price * $cart->product_quantity;
                                @endphp

                                {{ $total_price }} TK
                            </span>
                        </div>
                        @endforeach

                        <div class="dropdown-cart-action">
                            <a href="{{ route('carts') }}" class="btn" style="background-color:#A6C76C; color:white;">View Cart</a>
                            <a href="{{ route('checkouts') }}" class="btn btn-outline-primary-2" style="border-color:#A6C76C; color:#a6c76c;"><span>Checkout</span><i
                                    class="icon-long-arrow-right" style="color:white;"></i></a>
                        </div>
                    </div>
                    <!-- Cart Dropdown End -->

                </div>
            </div>
        </div>
    </div>
</div>