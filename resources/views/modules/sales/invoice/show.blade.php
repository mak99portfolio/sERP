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
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-4 hidden-xs"><h2 class="text-center">Sales Invoice No: {{$sales_invoice->sales_invoice_no}} </h2></div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        </div>
                        <div class="visible-xs col-xs-6"><button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</button></div>
                        <div class="visible-xs col-xs-6"><button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button></div>
                        <div class="visible-xs col-xs-12"><h2 class="text-center">Sales Invoice No: {{$sales_invoice->sales_invoice_no}}</h2></div>
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
                                                <th colspan="3" class="text-center">Sales Invoice</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><strong>Sales Invoice No:</strong> {{ $sales_invoice->sales_invoice_no }}</td>
                                            <td><strong>Sales Invocie Date:</strong> {{ $sales_invoice->sales_invoice_date->toFormattedDateString() }}</td>
                                            <td><strong>Delivery Person:</strong> {{$sales_invoice->delivery_person->name}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Invoice Address:</strong> {{$sales_invoice->shipping_address->address ?? 'Not Specified' }}</td>
                                            <td><strong>Shipping Address:</strong> {{$sales_invoice->invoice_address->address ?? 'Not Specified' }}</td>
                                            <td></td>
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
                                        @foreach($sales_invoice->vehicles as $row)                                        
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
                                            <th colspan="11">Sales Invoice Items</th>
                                        </tr>
                                        <tr>
                                            <th width="30">#</th>
                                            <th>Product Name</th>
                                            <th class="text-center">Sales Order No</th>
                                            <th class="text-center">Sales Challan No</th>
                                            <th class="text-center">Bonus Quantity</th>
                                            <th class="text-center">Discount</th>
                                            <th class="text-center">Invoice Quantity</th>
                                            <th class="text-center">Unit Price</th>
                                            <th class="text-center">Net Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($sales_invoice->items as $index=>$row)
                                                <tr>
                                                    <td>{{ $index+1 }}</td>
                                                    <td>{{ $row->product->name }}</td>
                                                    <td>{{ $row->sales_order->sales_order_no }}</td>
                                                    <td>{{ $row->sales_challan->sales_challan_no }}</td>
                                                    <td class="text-right">{{ $row->bonus_quantity }}</td>
                                                    <td class="text-right">{{ $row->discount_amount }}</td>
                                                    <td class="text-right">{{ $row->invoice_quantity }}</td>
                                                    <td class="text-right">{{ $row->unit_price }}</td>
                                                    <td class="text-right">{{ $row->unit_price * $row->invoice_quantity }}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="8" class="text-right">Net Total:</td>
                                                <td class="text-right">
                                                    {{ number_format($sales_invoice->items->sum(function($inner_row){
                                                        return $inner_row->invoice_quantity * $inner_row->unit_price;
                                                    }), 2) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="8" class="text-right">Total Vat:</td>
                                                <td class="text-right">{{ number_format($sales_invoice->total_vat, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="8" class="text-right">Total Discount:</td>
                                                <td class="text-right">{{ number_format($sales_invoice->total_discount, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="8" class="text-right">Extra Discount:</td>
                                                <td class="text-right">{{ number_format($sales_invoice->extra_discount, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="8" class="text-right">Grand Total:</td>
                                                <td class="text-right">{{ number_format($sales_invoice->grand_total, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="8" class="text-right">Invoiced Amount:</td>
                                                <td class="text-right">{{ number_format($sales_invoice->invoiced_amount, 2) }}</td>
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
