@extends('layout')
@section('title', 'Invoice')
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
                        <h2>Invoice</h2>
                        <a href="{{ route('sales-invoice.create') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table  class="table table-bordered table-hover datatable-buttons">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="25">#</th>
                                        <th>Invoice No</th>
                                        <th>Challan No</th>
                                        <th>Challan Date</th>
                                        <th>Sales Order No</th>
                                        <th width="30">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sales_invoices as $key=>$row)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $row->sales_invoice_no }}</td> 
                                        <td>{{ $row->sales_challan->sales_challan_no }}</td>
                                        <td>{{ $row->sales_challan->challan_date->toFormattedDateString() }}</td>
                                        <td>{!! labels($row->sales_challan->sales_orders->pluck('sales_order_no')) !!}</td>
                                        <td class="text-center">
                                        <a href="{{ route('sales-invoice.show', ['sales_invoice'=>$row]) }}" class="btn btn-block btn-sm btn-default btn-xs"><i class="fa fa-eye"></i>View</a>
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
