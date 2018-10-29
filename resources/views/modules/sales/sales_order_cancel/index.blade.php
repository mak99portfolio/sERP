@extends('layout')
@section('title', 'Sales Order Cancel')
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
                        <h2>Sales Order Cancel</h2>
                        <a href="{{ route('sales-order-cancel.create') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover datatable-buttons">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="35">#</th>
                                        <th>Sales Order Cancel No</th>
                                        <th>Sales Order No</th>
                                        <th>Reason</th>
                                        <th width="35" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sales_order_cancel_list as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->sales_order_cancel_no }}</td>
                                        <td>{{ $item->sales_order->sales_order_no}}</td>
                                        <td>{{ $item->sales_order_cancel_reason->name}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('sales-order-cancel.show', $item ) }}" class="btn btn-block btn-sm btn-default btn-xs"><i class="fa fa-eye"></i>View</a>
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
