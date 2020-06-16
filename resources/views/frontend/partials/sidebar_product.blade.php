<!-- Product Left sidebar start -->
<aside class="col-lg-3 order-lg-first">
    <div class="sidebar sidebar-shop">
        <!-- <div class="widget widget-clean">
            <label>Filters:</label>
            <a href="#" class="sidebar-filter-clear">Clean All</a>
        </div> --><!-- End .widget widget-clean -->
        <div class="mb-5"></div>

        <!--category-productsr-->
        @foreach(App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
        <div class="widget widget-collapsible">
            <h3 class="widget-title">
                <a data-toggle="collapse" href="#widget-{{ $parent->id }}" role="button" aria-expanded="true" aria-controls="widget-1">
                    {{ $parent->name }}
                    <!-- <img src="{{ asset('public/frontend/assets/images/category/' . $parent->image) }}" alt="" width="30px" height="auto" style="margin-right:5px;" class="float-left"> -->
                </a>
            </h3><!-- End .widget-title -->
            <div class="collapse show
                @if (Route::is('category.show'))
                    @if (App\Models\Category::ParentOrNotCategory($parent->id, $category->id))
                        show
                    @endif
                @endif " id="widget-{{ $parent->id }}">

                <!-- in this div>class> some code will be insert -->
                @foreach(App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
                <div class="widget-body">
                    <div class="filter-items filter-items-count">
                        <div class="filter-item">
                            <div class="custom-control">
                                <!-- Here when user click child category product then show category items -->
                                <a href="{{ route('category.show', $child->id) }}" 
                                class=" @if (Route::is('category.show'))
                                            @if ($child->id == $category->id)
                                            active 
                                            @endif
                                        @endif ">

                                {{ $child->name }}
                                <!-- <img src="{{ asset('public/frontend/assets/images/category/' . $parent->image) }}" alt="" width="30px" height="auto" style="margin-right:5px;" class="float-left"> -->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach

        <!-- <div class="widget widget-collapsible">
            <h3 class="widget-title">
                <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true" aria-controls="widget-2">
                    Size
                </a>
            </h3>

            <div class="collapse show" id="widget-2">
                <div class="widget-body">
                    <div class="filter-items">
                        <div class="filter-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="size-1">
                                <label class="custom-control-label" for="size-1">XS</label>
                            </div>
                        </div>

                        <div class="filter-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="size-2">
                                <label class="custom-control-label" for="size-2">S</label>
                            </div>
                        </div>

                        <div class="filter-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" checked id="size-3">
                                <label class="custom-control-label" for="size-3">M</label>
                            </div>
                        </div>

                        <div class="filter-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" checked id="size-4">
                                <label class="custom-control-label" for="size-4">L</label>
                            </div>
                        </div>

                        <div class="filter-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="size-5">
                                <label class="custom-control-label" for="size-5">XL</label>
                            </div>
                        </div>

                        <div class="filter-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="size-6">
                                <label class="custom-control-label" for="size-6">XXL</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="widget widget-collapsible">
            <h3 class="widget-title">
                <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                    Price
                </a>
            </h3>

            <div class="collapse show" id="widget-5">
                <div class="widget-body">
                    <div class="filter-price">
                        <div class="filter-price-text">
                            Price Range:
                            <span id="filter-price-range"></span>
                        </div><

                        <div id="price-slider"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
<!-- Product Left sidebar end -->