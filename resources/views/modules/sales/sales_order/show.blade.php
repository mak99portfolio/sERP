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
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-4 hidden-xs"><h2 class="text-center">Sales Order No: {{$sales_order->sales_order_no}} </h2></div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        </div>
                        <div class="visible-xs col-xs-6"><button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</button></div>
                        <div class="visible-xs col-xs-6"><button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button></div>
                        <div class="visible-xs col-xs-12"><h2 class="text-center">Sales Order No:  {{$sales_order->sales_order_no}}</h2></div>
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
                                                <th colspan="3" class="text-center">Sales Order</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><strong>Sales Order No:</strong> {{$sales_order->sales_order_no}}</td>
                                            <td><strong>Sales Date:</strong> {{$sales_order->sales_date}}</td>
                                            <td><strong>Sales Reference:</strong> {{$sales_order->sales_reference->name}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Currency:</strong> {{$sales_order->currency->name}}</td>
                                            <td><strong>Conversion Rate:</strong> {{$sales_order->conversion_rate}}</td>
                                            <td><strong></strong></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th colspan="2">Terms and Conditions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><strong>Term & Condition:</strong></td>
                                            <td><strong>Description:</strong></td>
                                        </tr>
                                        @foreach ($sales_order->terms_and_condition as $item)                                        
                                        <tr>
                                            <td>{{$item->terms_and_condition_id}}</td>
                                            <td>{{$item->description}}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th colspan="11">Sales Order Items</th>
                                        </tr>
                                        <tr>
                                            <th width="30">#</th>
                                            <th>Product Name</th>
                                            <th class="text-center">UOM</th>
                                            <th class="text-center">Unit Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Bonus Quantity</th>
                                            <th class="text-center">Total Quantity</th>
                                            <th class="text-center">Net Price</th>
                                            <th class="text-center">Vat</th>
                                            <th class="text-center">Discont</th>
                                            <th class="text-center">Total Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($sales_order->items as $item)
                                            <tr>
                                                <td>01</td>
                                                <td>01</td>
                                                <td class="text-right">01</td>
                                                <td class="text-right">01</td>
                                                <td class="text-right">01</td>
                                                <td class="text-right">01</td>
                                                <td class="text-right">01</td>
                                                <td class="text-right">01</td>
                                                <td class="text-right">01</td>
                                                <td class="text-right">01</td>
                                                <td class="text-right">01</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td><strong>Remarks:</strong>125</td>
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
