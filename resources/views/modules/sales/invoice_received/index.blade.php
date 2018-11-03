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
                        <h2>Received Invoice</h2>
                        <a href="{{ route('sales-invoice-received.create') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table  class="table table-bordered table-hover datatable-buttons">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="25">#</th>
                                        <th>Related Customer</th>
                                        <th>Invoice No</th>
                                        <th>Invoice Amount</th>
                                        <th>Received Date</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sales_invoice_receiveds as $key=>$row)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $row->customer->name }}</td> 
                                        <td>{{ $row->sales_invoice->sales_challan->sales_challan_no }}</td>
                                        <td>{{ $row->sales_invoice_amount }}</td>
                                        <td>{{ $row->sales_invoice_received_date->toFormattedDateString() }}</td>
                                        <td>{{ $row->remarks }}</td>
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
