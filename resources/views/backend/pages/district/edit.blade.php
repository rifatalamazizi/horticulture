@extends('backend.layout.master')

@section('admin_content')
<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Form Layouts</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.district.manage') }}">Manage District</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $district->title }}</li>
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
                <div class="card-title">
                    <h4 style="color:#9057ff;">Edit Districts</h4>
                </div>
                <hr>
                <form action="{{ route('admin.district.update', $district->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @include('backend.partials.message')
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input name="name" type="text" class="form-control" id="name"
                                value="{{ $district->name }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <!-- Complete this after completing category and brand section -->
                        <label name="division_id" for="input-25" class="col-sm-2 col-form-label">Division</label>
                        <div class="col-sm-10">
                            <select name="division_id" class="custom-select">
                                <option value="">Please select a division for the district</option>
                                <!-- Parent Brand Start -->
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}" {{ $district->division->id == $division->id ? 'selected' : '' }}>
                                        {{ $division->name }}
                                    </option>
                                @endforeach
                                <!-- Parent Brand End -->
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary px-5"><i class="icon-lock"></i>Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
<!--End Row-->
@endsection