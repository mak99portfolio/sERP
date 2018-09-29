@extends('layout')
@section('title', 'Foreign Purchase Order Details')
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
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-4 hidden-xs"><h2 class="text-center">Purchase Order No: {{$purchaseOrder->purchase_order_no}}</h2></div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        </div>
                        <div class="visible-xs col-xs-6"><button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</button></div>
                        <div class="visible-xs col-xs-6"><button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button></div>
                        <div class="visible-xs col-xs-12"><h2 class="text-center">Purchase Order No: {{$purchaseOrder->purchase_order_no}}</h2></div>
                    </div>
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive print-area font-12">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td colspan="3" class="text-center">Foreign Purchase Order</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Requisition No:</strong> 
                                        
                                            @foreach($purchaseOrder->foreign_requisitions as $foreign_requisition)

                                                 <strong>{{$foreign_requisition->requisition_no}},</strong> 
                                            @endforeach
                                        </td>
                                        <td><strong>Purchase Order No:</strong> {{$purchaseOrder->purchase_order_no}}</td>
                                        <td><strong>Vendor:</strong> {{$purchaseOrder->vendor->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Requisition date:</strong> 
                                            @foreach($purchaseOrder->foreign_requisitions as $foreign_requisition)

                                            <strong>{{date('Y-m-d', strtotime($foreign_requisition->issued_date))}},</strong> 
                                       @endforeach
                                        
                                        </td>
                                        <td colspan="2"><strong>Purchase Order date:</strong>{{$purchaseOrder->requisition_date}}</td>
                                        
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
                                       <td><strong>Port of Loading:</strong> {{$purchaseOrder->loading->name}}</td>
                                       <td><strong>Port of Discharge:</strong> {{$purchaseOrder->discharge->name}}</td>
                                       <td><strong>Country of Final Destination:</strong> {{$purchaseOrder->final_destination_country->name}}</td>
                                   </tr>
                                   <tr>
                                        <td><strong>Final Destination:</strong> {{$purchaseOrder->final_destination_city->name}}</td>
                                        <td><strong>Country of Origin of Goods:</strong> {{$purchaseOrder->origin_of_goods->name}}</td>
                                        <td><strong>Shipment Allow:</strong> {{$purchaseOrder->shipment_allow}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Payment Type:</strong> {{$purchaseOrder->payment_type}}</td>
                                        <td><strong>Pre Carriage By:</strong> {{$purchaseOrder->pre_carriage_by}}</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                   <tr>
                                       <td><strong>Subject:</strong>  {{$purchaseOrder->subject}}</td>
                                       <td><strong>Letter Header:</strong>  {{$purchaseOrder->letter_header}}</td>
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
                                            <th>Product Name</th>
                                            <th>UOM</th>
                                            <th class="text-right">Quantity</th>
                                            <th class="text-right">Unit Price</th>
                                            <th class="text-right">Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  @foreach($purchaseOrder->items as $key =>$item)
                                       <tr>
                                       <td>{{$key+1}}</td>
                                           <td>{{$item->product->name}}</td>
                                           <td>{{$item->product->unit_of_measurement->name}}</td>
                                           <td class="text-right">{{$item->quantity}}</td>
                                           <td class="text-right">{{$item->unit_price}}</td>
                                           <td class="text-right">{{number_format($item->quantity * $item->unit_price,2)}}</td>
                                       </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                                <table class="table table-bordered">
                                        <tbody>
                                           <tr>
                                               <td><strong>Letter Footer:</strong>  {{$purchaseOrder->letter_footer}}</td>
                                           </tr>
                                           <tr>
                                                <td><strong>Notes:</strong>  {{$purchaseOrder->notes}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </tbody>
                            </table>
                            <!--start approved by-->
                            <table id="print-footer" style="position: absolute; bottom: 20px; width: 100%; display: none;">
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