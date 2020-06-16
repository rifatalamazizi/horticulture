@extends('backend.layout.master')

@section('admin_content')
<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Data Tables</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Order</li>
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
                <h4 style="color:#9057ff;">Manage Orders</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="default-datatable">
                        <thead>
                            <tr>
                                <th>Order Serial</th>
                                <th>Order Code</th>
                                <th>Orderer Name</th>
                                <th>Orderer Phone No</th>
                                <th>Orderer Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>#OLE{{ $order->id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->phone_no }}</td>
                                <td>
                                    <p>
                                        @if ($order->is_seen_by_admin)
                                        <button type="button" class="btn btn-success btn-sm">Seen</button>
                                        @else
                                        <button type="button" class="btn btn-info btn-sm">Unseen</button>
                                        @endif
                                    </p>

                                    <p>
                                        @if ($order->is_completed)
                                        <button type="button" class="btn btn-success btn-sm">Completed</button>
                                        @else
                                        <button type="button" class="btn btn-warning btn-sm">Not Completed</button>
                                        @endif
                                    </p>

                                    <p>
                                        @if ($order->is_paid)
                                        <button type="button" class="btn btn-success btn-sm">Paid</button>
                                        @else
                                        <button type="button" class="btn btn-danger btn-sm">Unpaid</button>
                                        @endif
                                    </p>
                                </td>

                                <td>

                                    <!-- here id="delete" ==> id pass for delete -->
                                    <a href="{{ route('admin.order.delete', $order->id) }}" class="btn btn-danger"
                                        id="delete">Delete</a>

                                    <a href="{{ route('admin.order.show', $order->id) }}"
                                        class="btn btn-warning">View</a>

                                </td>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Row-->
@endsection