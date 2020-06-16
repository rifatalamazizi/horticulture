@extends('backend.layout.master')

@section('admin_content')
<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Data Tables</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Slider</li>
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
            <div class="card-header">
                <h4 style="color:#9057ff;">Manage Sliders</h4>
            </div>
            <div class="card-body">

                <!-- Add Modal Start -->
                <div class="add-slider-wrapper">
                    <a href="#addSliderModal" data-toggle="modal" class="btn btn-info float-left mb-2">
                        <i class="fa fa-plus"></i> Add New Slider
                    </a>
                    <div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add new
                                        slider</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form action="{{ route('admin.slider.store') }}" method="post"
                                        enctype="multipart/form-data">

                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="title">Slider Title <small
                                                    class="text-danger">(required)</small></label>
                                            <input type="text" class="form-control" name="title" id="title"
                                                placeholder="Slider Title" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="image">Slider Image <small
                                                    class="text-danger">(required)</small></label>

                                            <input type="file" class="form-control" name="image" id="image"
                                                placeholder="Slider Image" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="button_text">Slider Button Text
                                                <small class="text-info">(optional)</small></label>
                                            <input type="text" class="form-control" name="button_text" id="button_text"
                                                placeholder="Slider Button Text (if need)">
                                        </div>

                                        <div class="form-group">
                                            <label for="button_link">Slider Button Link
                                                <small class="text-info">(optional)</small></label>
                                            <input type="url" class="form-control" name="button_link" id="button_link"
                                                placeholder="Slider Button Text (if need)">
                                        </div>

                                        <div class="form-group">
                                            <label for="priority">Slider Priority <small
                                                    class="text-info">(required)</small></label>
                                            <input type="number" class="form-control" name="priority" id="priority"
                                                placeholder="Slider Priority; e.g: 10" value="10" required>
                                        </div>

                                        <button type="submit" class="btn btn-success">Add
                                            New</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Modal End -->

                <!-- Edit Modal Start-->
                @foreach($sliders as $slider)
                <div class="modal fade" id="editModal{{ $slider->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are sure to
                                    update ?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.slider.update', $slider->id) }}" method="post"
                                    enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="title">Slider Title <small
                                                class="text-danger">(required)</small></label>
                                        <input type="text" class="form-control" name="title" id="title"
                                            placeholder="Slider Title" required value="{{ $slider->title }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Slider Old Image</label>
                                        <br>
                                        <img src="{{ asset('public/backend/images/sliders/' . $slider->image) }}" alt=""
                                            height="250" width="">
                                        <br><br>
                                        <label for="image">Slider New Image (optional)</label>
                                        <!-- For Single Image upload -->
                                        <input name="image" type="file" class="form-control" id="image"
                                            placeholder="Slider Image">

                                    </div>

                                    <div class="form-group">
                                        <label for="button_text">Slider Button Text (optional)</label>
                                        <input type="text" class="form-control" name="button_text" id="button_text"
                                            placeholder="Slider Button Text (if need)"
                                            value="{{ $slider->button_text }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="button_link">Slider Button Link (optional)</label>
                                        <input type="url" class="form-control" name="button_link" id="button_link"
                                            placeholder="Slider Button Text (if need)"
                                            value="{{ $slider->button_link }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="priority">Slider Priority (required)</label>
                                        <input type="number" class="form-control" name="priority" id="priority"
                                            placeholder="Slider Priority; e.g: 10" required
                                            value="{{ $slider->priority }}">
                                    </div>

                                    <button type="submit" class="btn btn-success">Update</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Edit Modal end -->

                <!-- Slider Table Start -->
                <div class="table-responsive">
                    <table id="default-datatable" class="table table-bordered datatable">
                        <thead>
                            <tr>
                                <th>Slider Serial</th>
                                <th>Slider Title</th>
                                <th>Slider Image</th>
                                <th>Slider Priority</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sliders as $slider)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $slider->title }}</td>
                                <td><img src="{{ url('public/backend/images/sliders/' . $slider->image) }}" alt=""
                                        height="100"></td>
                                <td>{{ $slider->priority }}</td>
                                <td>

                                    <!-- Here when you will go by use this url then you also go with this $row->id  -->
                                    <!-- <a href="{{ url('admin/slider/edit/' . $slider->id) }}" class="btn btn-success">Edit</a> -->

                                    <!-- Edit Slider Called on Edit Modal -->
                                    <a href="#editModal{{ $slider->id }}" data-toggle="modal"
                                        class="btn btn-success">Edit</a>

                                    <!-- here id="delete" ==> id pass for delete -->
                                    <a href="{{ route('admin.slider.delete', $slider->id) }}" class="btn btn-danger"
                                        id="delete">Delete</a>

                                    <a href="{{ route('admin.slider.show', $slider->id) }}"
                                        class="btn btn-warning">View</a>

                                </td>
                            </tr>
                            @endforeach
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
                <!-- Slider Table End -->

            </div>
        </div>
    </div>
</div><!-- End Row-->
@endsection