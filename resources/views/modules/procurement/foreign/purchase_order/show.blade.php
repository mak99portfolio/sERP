@extends('layout')
@section('title', 'Foreign Purchase Order Details')
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
                        <h2>Foreign Purchase Order Details</h2>
                        <div class="btn-group pull-right">
                            <button class="btn btn-sm btn-info print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                            <a href="{{route('purchase-order.index')}}" class="btn btn-sm btn-success btn-addon"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Foreign Purchase Order List</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive DivIdToPrint">
                            <table class="table table-bordered">
                                <tbody>
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
                                        <td><strong>Purchase Order date:</strong>{{$purchaseOrder->requisition_date}}</td>
                                        <td></td>
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
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  @foreach($purchaseOrder->items as $key =>$item)
                                       <tr>
                                       <td>{{$key+1}}</td>
                                           <td>{{$item->product->name}}</td>
                                           <td>{{$item->product->unit_of_measurement->name}}</td>
                                           <td>{{$item->quantity}}</td>
                                           <td>{{$item->unit_price}}</td>
                                           <td>{{number_format($item->quantity * $item->unit_price,2)}}</td>
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
                            <table id="print-footer" style="width: 100%; display: none; margin-bottom: 200px">
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
{{-- @section('script')






@endsection --}}