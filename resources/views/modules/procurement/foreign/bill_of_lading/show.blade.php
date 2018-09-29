@extends('layout')
@section('title', 'Bill of Lading Details')
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
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-4 hidden-xs"><h2 class="text-center">BL No : {{$bill_of_lading->bill_of_lading_no}}</h2></div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        </div>
                        <div class="visible-xs col-xs-6"><button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</button></div>
                        <div class="visible-xs col-xs-6"><button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button></div>
                        <div class="visible-xs col-xs-12"><h2 class="text-center">BL No : {{$bill_of_lading->bill_of_lading_no}}</h2></div>
                    </div>
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive DivIdToPrint">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td colspan="2" class="text-center"><strong>Bill of Lading</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>BL No :</strong>{{$bill_of_lading->bill_of_lading_no}}</td>
                                        <td><strong>BL Date :</strong>{{$bill_of_lading->bill_of_lading_date}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>LC No :</strong>{{$bill_of_lading->letter_of_credit->letter_of_credit_no}}</td>
                                        <td><strong>LC Date :</strong>{{$bill_of_lading->letter_of_credit->letter_of_credit_date}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Commercial Invoice List</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Commercial Invoice No</th>
                                        <th>Commercial Invoice Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bill_of_lading->commercial_invoices as $key=>$commercial_invoice)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$commercial_invoice->commercial_invoice_no}}</td>
                                        <td>{{$commercial_invoice->date}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="5">Product List</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sum=0;
                                    @endphp
                                    @foreach($bill_of_lading->items as $key=>$item)

                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->product->name}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->unit_price}}</td>
                                        <td class="text-right">{{$item->unit_price * $item->quantity}}</td>
                                    </tr>
                                    @php
                                        $sum += $item->unit_price * $item->quantity;
                                    @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-right">Total Quantity =</td>
                                        <td class="text-right">{{$sum}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Container No :</strong>{{$bill_of_lading->container_no}}</td>
                                        <td><strong>Container Size :</strong>{{$bill_of_lading->container_size}}</td>
                                        <td><strong>Number Of Box :</strong>{{$bill_of_lading->number_of_box}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Shipping Agency Name :</strong>{{$bill_of_lading->shipping_agency->name}}</td>
                                        <td><strong>Shipping Agency Address :</strong>{{$bill_of_lading->shipping_agency->address}}</td>
                                        <td><strong>Local Agency Name :</strong>{{$bill_of_lading->local_agency->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Local Agency Address :</strong>{{$bill_of_lading->local_agency->address}}</td>
                                        <td><strong>Exproter:</strong>{{$bill_of_lading->exprote->name}}</td>
                                    <td><strong>Consignee:</strong>{{$bill_of_lading->consignee}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">LC Issue Bank</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td><strong>A/C No:</strong>{{$bill_of_lading->letter_of_credit->issue_ac_no}}</td>
                                        <td><strong>A/C Name :</strong>{{$bill_of_lading->letter_of_credit->issue_ac_name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Branch Name :</strong>{{$bill_of_lading->letter_of_credit->issue_branch_name}}</td>
                                        <td><strong>Bank Name :</strong>{{$bill_of_lading->letter_of_credit->issue_bank_name}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Acceptance:</strong>{{$bill_of_lading->acceptance}}</td>
                                        <td><strong>Port Of Loading :</strong>{{$bill_of_lading->loading->name}}</td>
                                        <td><strong>Port Of Dischrge :</strong>{{$bill_of_lading->dischare->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Place Of Delivery :</strong>{{$bill_of_lading->place_of_delivery}}</td>
                                        <td><strong>Voyage No :</strong>{{$bill_of_lading->voyage_no}}</td>
                                        <td><strong>Place of Transhipment :</strong>{{$bill_of_lading->place_of_transhipment}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Modes Of Transport :</strong>{{$bill_of_lading->modes_of_transport->name}}</td>
                                        <td><strong>Move Type :</strong>{{$bill_of_lading->move_type->name}}</td>
                                        <td><strong>Issue Place :</strong>{{$bill_of_lading->issue_place}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Number Of MTD :</strong>{{$bill_of_lading->number_of_mtd}}</td>
                                        <td><strong>Packaging Qty :</strong>{{$bill_of_lading->packaging_qty}}</td>
                                        <td><strong>Gross Weight :</strong>{{$bill_of_lading->gross_weight}}</td>
                                    </tr>
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