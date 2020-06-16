@extends('backend.layout.master')

@section('admin_content')
<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Data Tables</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.product.manage') }}">Manage Product</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
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
            <div class="card-header"><h4 style="color:#9057ff;">Manage Products</h4></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="default-datatable" class="table table-bordered datatable">
                        <thead>

                        </thead>
                        <tbody>

                            <tr>
                                <th>Product Code</th>
                                <td>#PLE{{ $product->id }}</td>
                            </tr>

                            <tr>
                                <th>Product Title</th>
                                <td>{{ $product->title }}</td>
                            </tr>
                                
                            <tr>
                                <th>Product Price</th>
                                <td>{{ $product->price }}</td>
                            </tr>
                                
                            <tr>
                                <th>Product Quantity</th>
                                <td>{{ $product->quantity }}</td>
                            </tr>

                            <tr>
                                <th>Product Image</th>
                                <td>
                                    <img src="{{ asset('public/frontend/assets/images/products/' . $product->singleImage->image) }}" alt="" height="400">
                                </td>
                            </tr>
                        </tbody>
                        <!-- <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot> -->
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Row-->
@endsection