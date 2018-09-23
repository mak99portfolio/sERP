@extends('layout')
@section('title', 'Proforma Invoice Details')
@section('content')
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
                            <h2>Foreign Proforma Invoice Details</h2>
                            
    
                            <div class="btn-group pull-right">
                                <button class="btn btn-sm btn-info print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                                <a href="{{route('proforma-invoice.index')}}" class="btn btn-sm btn-success btn-addon"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Foreign Proforma Invoice List</a>
                            </div>
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