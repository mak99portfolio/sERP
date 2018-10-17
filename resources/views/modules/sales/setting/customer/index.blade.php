@extends('layout')
@section('title', 'Customer Profile')
@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Sales</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Customer Profile</h2>
                        <a href="{{ route('customer.create') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Customer</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered table-hover">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="25">#</th>
                                        <th>Customer Name</th>
                                        <th>Customer Type</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th width="30">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customer_list as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->customer_name}}</td>
                                        <td>{{$item->customer_type->name}}</td>
                                        <td>{{$item->status}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('customer.show', $item) }}" class="btn btn-sm btn-default btn-xs btn-block">View</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end table-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection
