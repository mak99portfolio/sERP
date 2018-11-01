@extends('layout')
@section('title', 'Local Purchase List')
@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Procurement</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Local Purchase Order</h2>
                    <a href="{{ route('local-purchase-order.create') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover datatable-buttons">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="25">#</th>
                                        <th>Purchase Order No</th>
                                        <th>Purchase Order Date</th>
                                        <th>Create time</th>
                                        <th>Vendor</th>
                                        <th width="40">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($local_purchase_order_list as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->purchase_order_no }}</td>
                                        <td>{{ $item->purchase_order_date }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->order_vendor->vendor->name ?? "not specified"}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('local-purchase-order.show', $item) }}" class="btn btn-default btn-xs btn-block"><i class="fa fa-eye"></i>View</a>
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
