@extends('layout')
@section('title', 'Challan')
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
                        <h2>Challan</h2>
                        <a href="{{ route('sales-challan.create') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover datatable-buttons">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="25">#</th>
                                        <th>Sales Orders</th>
                                        <th>Challan No</th>
                                        <th>Challan Date</th>
                                        <th width="30">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($paginate as $index=>$row)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{!! labels($row->sales_orders->pluck('sales_order_no')) !!}</td>
                                        <td>{{ $row->sales_challan_no }}</td>
                                        <td>{{ $row->challan_date->diffForHumans() }}</td>
                                        <td class="text-center">
                                        <a href="{{ route('sales-challan.show', ['sales_challan'=>$row]) }}" class="btn btn-block btn-sm btn-default btn-xs"><i class="fa fa-eye"></i>View</a>
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
