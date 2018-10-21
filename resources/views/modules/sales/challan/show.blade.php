@extends('layout')
@section('title', 'Sales Order Details')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-reply" aria-hidden="true"></i>&nbsp;Back</button>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-4 hidden-xs"><h2 class="text-center">Sales Challan No: {{$sales_challan->sales_challan_no}} </h2></div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        </div>
                        <div class="visible-xs col-xs-6"><button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</button></div>
                        <div class="visible-xs col-xs-6"><button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button></div>
                        <div class="visible-xs col-xs-12"><h2 class="text-center">Sales Challan No: {{$sales_challan->sales_challan_no}}</h2></div>
                    </div>
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive print-area">
                                <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="3" class="text-center">Sales Challan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><strong>Sales Challan No:</strong> {{ $sales_challan->sales_challan_no }}</td>
                                            <td><strong>Challan Date:</strong> {{ $sales_challan->challan_date->toFormattedDateString() }}</td>
                                            <td><strong>Mushak No:</strong> {{ $sales_challan->mushak_no->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Delivery Person:</strong> {{$sales_challan->delivery_person->name}}</td>
                                            <td><strong>Shipping Address:</strong> {{$sales_challan->shipping_address->address ?? 'Not Specified' }}</td>
                                            <td><strong></strong></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th colspan="4">Delivery Vehicle</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><strong>Medium</strong></td>
                                            <td><strong>Vehicle No</strong></td>
                                            <td><strong>Driver name</strong></td>
                                            <td><strong>Phone No</strong></td>
                                        </tr>
                                        @foreach($sales_challan->vehicles as $row)                                        
                                        <tr>
                                            <td>{{ title_case($row->delivery_medium) }}</td>
                                            <td>{{ $row->vehicle_no }}</td>
                                            <td>{{ $row->driver_name }}</td>
                                            <td>{{ $row->phone_no }}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th colspan="11">Sales Challan Items</th>
                                        </tr>
                                        <tr>
                                            <th width="30">#</th>
                                            <th>Product Name</th>
                                            <th class="text-center">Sales Order No</th>
                                            <th class="text-center">Sales Order Quantity</th>
                                            <th class="text-center">Receive Quantity</th>
                                            <th class="text-center">Intransit</th>
                                            <th class="text-center">Pending</th>
                                            <th class="text-center">Challan Quantity</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($sales_challan->items as $index=>$row)
                                                <tr>
                                                    <td>{{ $index+1 }}</td>
                                                    <td>{{ $row->product->name }}</td>
                                                    <td>{{ $row->sales_order->sales_order_no }}</td>
                                                    <td class="text-right">{{ $row->sales_order->items()->where('product_id', $row->product_id)->sum('quantity') }}</td>
                                                    <td class="text-right">0</td>
                                                    <td class="text-right">0</td>
                                                    <td class="text-right">0</td>
                                                    <td class="text-right">{{ $row->quantity }}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="7" class="text-right">Total Challan Quantity:</td>
                                                <td class="text-right">
                                                    {{ $sales_challan->items()->sum('quantity') }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                
                            <!--start approved by-->
                            <table id="print-footer" style="margin-top: 200px; width: 100%; display: none;">
                                <tr>
                                    <td style="text-align: center; font-weight: bold;">
                                        <span style="border-top: 2px solid black;"> Prepared By</span>
                                    </td>
                                    <td style="text-align: center; font-weight: bold;">
                                        <span style="border-top: 2px solid black;"> Checked By</span>
                                    </td>
                                    <td style="text-align: center; font-weight: bold;">
                                        <span style="border-top: 2px solid black;"> Approved By</span>
                                    </td>
                                </tr>
                            </table>
                            <!--end approved by-->
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
