@extends('backend.layout.master')

@section('admin_content')
<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Form Layouts</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.product.manage') }}">Manage Product</a></li>
        </ol>
    </div>
    <div class="col-sm-3">
        <div class="btn-group float-sm-right">
            <button type="button" class="btn btn-light waves-effect waves-light"><i class="fa fa-cog mr-1"></i>
                Setting</button>
            <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split waves-effect waves-light"
                data-toggle="dropdown">
                <span class="caret"></span>
            </button>
            <div class="dropdown-menu">
                <a href="javaScript:void();" class="dropdown-item">Action</a>
                <a href="javaScript:void();" class="dropdown-item">Another action</a>
                <a href="javaScript:void();" class="dropdown-item">Something else here</a>
                <div class="dropdown-divider"></div>
                <a href="javaScript:void();" class="dropdown-item">Separated link</a>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb-->

<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <div class="card-title">Add Product</div>
                <hr>
                <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('backend.partials.message')
                    <div class="form-group row">
                        <label for="input-21" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input name="title" type="text" class="form-control" id="input-21"
                                placeholder="Product title">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input-22" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" type="text" class="form-control" id="summernoteEditor"
                                placeholder="">
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input-23" class="col-sm-2 col-form-label">Quantity</label>
                        <div class="col-sm-10">
                            <input name="quantity" type="number" class="form-control" id="input-23"
                                placeholder="Quantity">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input-24" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input name="price" type="number" class="form-control" id="input-24" placeholder="Price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input-25" class="col-sm-2 col-form-label">Offer Price</label>
                        <div class="col-sm-10">
                            <input name="offer_price" type="number" class="form-control" id="input-25"
                                placeholder="Offer Price">
                        </div>
                    </div>

                    <div class="form-group row">
                        <!-- Complete this after completing category and brand section -->
                        <label for="input-25" class="col-sm-2 col-form-label">Select Category</label>
                        <div class="col-sm-10">
                            <select name="category_id" class="custom-select" id="category_id">
                                <option value="">Choose...</option>
                                <!-- Parent Category Start -->
                                @foreach(App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as
                                $parent)
                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>

                                <!-- Sub Category Start -->
                                @foreach(App\Models\Category::orderBy('name', 'asc')->where('parent_id',
                                $parent->id)->get() as $child)
                                <option value="{{ $child->id }}">----->{{ $child->name }}</option>
                                @endforeach
                                <!-- Sub Category End -->

                                @endforeach
                                <!-- Parent Category End -->
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <!-- Complete this after completing category and brand section -->
                        <label name="brand_id" for="input-25" class="col-sm-2 col-form-label">Select Brand</label>
                        <div class="col-sm-10">
                            <select name="brand_id" class="custom-select">
                                <option value="">Choose...</option>
                                <!-- Parent Brand Start -->
                                @foreach(App\Models\Brand::orderBy('name', 'asc')->get() as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                                <!-- Parent Brand End -->
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input-21" class="col-sm-2">Product Image</label>
                        <div class="col-sm-10 custom-file">
                            <input name="product_image" type="file" class="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary px-5"><i class="icon-lock"></i>Add
                                Product</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
<!--End Row-->
@endsection