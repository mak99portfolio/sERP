@extends('layout')
@section('title', 'Proforma Invoice Details')
@section('content')
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
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-4 hidden-xs"><h2 class="text-center">Proforma Invoice No: {{$proformaInvoice->proforma_invoice_no}}</h2></div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        </div>
                        <div class="visible-xs col-xs-6"><button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</button></div>
                        <div class="visible-xs col-xs-6"><button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button></div>
                        <div class="visible-xs col-xs-12"><h2 class="text-center">Proforma Invoice No: {{$proformaInvoice->proforma_invoice_no}}</h2></div>
                    </div>
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive DivIdToPrint">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Proforma Invoice No:</strong> {{$proformaInvoice->proforma_invoice_no}}</td>
                                        <td><strong>Purchase Order No:</strong>
                                            @foreach($proformaInvoice->purchase_orders as $proformaInvoice_no)
                                            {{$proformaInvoice_no->purchase_order_no}},
                                            @endforeach

                                        </td>
                                        <td><strong>Purchase Order Date:</strong>  @foreach($proformaInvoice->purchase_orders as $proformaInvoice_no)
                                            {{date('Y-m-d',strtotime($proformaInvoice_no->purchase_order_date))}},
                                            @endforeach</td>

                                    </tr>
                                    <tr>
                                        <td><strong>Proforma Invoice date:</strong> {{$proformaInvoice->proforma_invoice_date}}</td>
                                        <td><strong>Proforma Invoice receive date:</strong> {{$proformaInvoice->proforma_invoice_receive_date}}</td>
                                        <td><strong>Vendor:</strong>{{$proformaInvoice->vendor->name}} </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Table of Terms and Conditions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Port of Loading:</strong> {{$proformaInvoice->loading->name}} </td>
                                        <td><strong>Port of Discharge:</strong> {{$proformaInvoice->discharge->name}} </td>
                                        <td><strong>Country of Final Destination:</strong> {{$proformaInvoice->final_destination_country->name}} </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Final Destination:</strong> {{$proformaInvoice->final_destination_city->name}}</td>
                                        <td><strong>Country of Origin of Goods:</strong> {{$proformaInvoice->origin_of_goods_country->name}}</td>
                                        <td><strong>Shipment Allow:</strong> {{$proformaInvoice->shipment_allow}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Payment Type:</strong>  {{$proformaInvoice->payment_type}}</td>
                                        <td><strong>Pre Carriage By:</strong> {{$proformaInvoice->pre_carriage_by}} </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Customer Code:</strong> {{$proformaInvoice->customer_code}}</td>
                                        <td><strong>Consignee :</strong> {{$proformaInvoice->consignee}}</td>
                                        <td><strong>Beneficiary Bank Info :</strong> {{$proformaInvoice->beneficiary_bank_info}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="6">Product Table</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>H.S. CODE</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th class="text-right">Total Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($proformaInvoice->items as  $key=>$item)
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->product->hs_code}}</td>
                                        <td>{{$item->product->name}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->unit_price}}</td>
                                        <td class="text-right">{{number_format($item->unit_price * $item->quantity,2)}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Notes:</strong>  {{$proformaInvoice->notes}}</td>
                                    </tr>
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
@endsection