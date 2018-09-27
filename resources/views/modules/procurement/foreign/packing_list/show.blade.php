@extends('layout')
@section('title', 'Packing List Details')
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
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-4 hidden-xs"><h2 class="text-center">Commercial Invoice No : {{$commercialInvoice->commercial_invoice_no}}</h2></div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        </div>
                        <div class="visible-xs col-xs-6"><button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</button></div>
                        <div class="visible-xs col-xs-6"><button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button></div>
                        <div class="visible-xs col-xs-12"><h2 class="text-center">Commercial Invoice No : {{$commercialInvoice->commercial_invoice_no}}</h2></div>
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
                                        <td colspan="2"><strong>Packing List</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Commercial Invoice No:</strong> {{$packingList->commercial_invoice->commercial_invoice_no}}</td>
                                        <td><strong>Date:</strong>  {{$packingList->commercial_invoice->date}}</td>
                                    </tr>
                                    <tr>
   
                                        <td><strong>LC No:</strong> {{$packingList->commercial_invoice->LetterOfCredit->letter_of_credit_no}}</td>
                                        <td><strong>LC Date:</strong>  {{$packingList->commercial_invoice->LetterOfCredit->letter_of_credit_date}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Beneficiary Bank info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>A/C No :</strong> {{$packingList->commercial_invoice->LetterOfCredit->beneficiary_ac_no}}</td>
                                        <td><strong>A/C Name :</strong> {{$packingList->commercial_invoice->LetterOfCredit->beneficiary_ac_name}}</td>
                                        <td><strong>Branch Name :</strong> {{$packingList->commercial_invoice->LetterOfCredit->beneficiary_branch_name}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Bank Name:</strong> {{$packingList->commercial_invoice->LetterOfCredit->beneficiary_bank_name}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Bill Of Lading No:</strong> {{$packingList->commercial_invoice->bill_of_lading_no}}</td>
                                        <td><strong>Bill Of Lading Date:</strong> {{$packingList->commercial_invoice->bill_of_lading_date}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Vessel No / Flight No:</strong> {{$packingList->commercial_invoice->vessel_no}}</td>
                                        <td><strong>Container No:</strong> {{$packingList->commercial_invoice->container_no}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Table of Terms and Conditions:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Port of Loading:</strong> {{$packingList->commercial_invoice->loading_port->name}}</td>
                                        <td><strong>Port of Discharge:</strong> {{$packingList->commercial_invoice->discharge_port->name}}</td>
                                        <td><strong>Country of Final Destination:</strong> {{$packingList->commercial_invoice->destination_country->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Final Destination:</strong> {{$packingList->commercial_invoice->city->name}}</td>
                                        <td><strong>Country of Origin of Goods:</strong> {{$packingList->commercial_invoice->country_goods->name}}</td>
                                        <td><strong>Exporter:</strong>{{$packingList->commercial_invoice->LetterOfCredit->vendor->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Currency:</strong> {{$packingList->currency}}</td>
                                        <td><strong></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Notes:</strong>  {{$packingList->notes}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="5">Packing List table:</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Per Unit Weight	</th>
                                        <th>Total Weight</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @php
                                        $sub_total_weight = 0;
                                    
                                    @endphp
                                @foreach($packingList->items as $key=>$item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->product->name}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->per_unit_weight}}</td>
                                        <td>{{($item->quantity * $item->per_unit_weight)}}</td>
                                     
                                    </tr>
                                    @php
                                            $sub_total_weight += ($item->quantity * $item->per_unit_weight);
                                        
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="4" class="text-right">Net Total =</td>
                                        <td>{{$sub_total_weight}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right">Gross Total =</td>
                                        <td>{{$packingList->gross_total}}</td>
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