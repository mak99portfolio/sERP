@extends('layout')
@section('title', 'Commercial Invoice Details')
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
                        <div class="table-responsive print-area">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td colspan="3"><strong>Commercial Invoice</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Commercial Invoice No :</strong> {{$commercialInvoice->commercial_invoice_no}}</td>
                                        <td><strong>Date:</strong> {{$commercialInvoice->date}}</td>
                                        <td><strong>LC No :</strong> {{$commercialInvoice->letter_of_credit->letter_of_credit_no}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>LC Date :</strong>  {{$commercialInvoice->letter_of_credit->letter_of_credit_date}}</td>
                                        <td><strong></strong></td>
                                        <td><strong></strong></td>
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
                                        <td><strong>A/C No :</strong> {{$commercialInvoice->letter_of_credit->beneficiary_ac_no}}</td>
                                        <td><strong>A/C Name :</strong> {{$commercialInvoice->letter_of_credit->beneficiary_ac_name}}</td>
                                        <td><strong>Branch Name :</strong> {{$commercialInvoice->letter_of_credit->beneficiary_branch_name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Bank Name</strong> {{$commercialInvoice->letter_of_credit->beneficiary_bank_name}}</td>
                                        <td><strong></strong></td>
                                        <td><strong></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Proforma Invoice No</th>
                                        <th>Proforma Invoice Date</th>
                                        <th>Customer Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($commercialInvoice->letter_of_credit->proforma_invoices as $value)

                                    <tr>
                                        <td>{{$value->proforma_invoice_no}}</td>
                                        <td>{{$value->proforma_invoice_date}}</td>
                                        <td>{{$value->customer_code}}</td>

                                    </tr>
                                 @endforeach
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
                                        <td><strong>Port of Loading :</strong> {{$commercialInvoice->loading_port->name}}</td>
                                        <td><strong>Port of Discharge :</strong> {{$commercialInvoice->discharge_port->name}}</td>
                                        <td><strong>Country of Final Destination :</strong> {{$commercialInvoice->destination_country->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Final Destination :</strong> {{ $commercialInvoice->city->name }}</td>
                                        <td><strong>Country of Origin of Goods :</strong> {{ $commercialInvoice->country_goods->name }}</td>
                                        <td><strong>Vessel No / Flight No :</strong> {{ $commercialInvoice->vessel_no }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Notes:</strong> {{$commercialInvoice->notes}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <h4>CI Product Table </h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Qnantity</th>
                                        <th>Unit Price Used ($)</th>
                                        <th>Amount ($)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                        $sub_total_amount = 0;

                                    @endphp
                                @foreach($commercialInvoice->items as $key=>$item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->product->name}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->unit_price}}</td>
                                        <td>{{($item->quantity * $item->unit_price)}}</td>

                                    </tr>
                                        @php
                                            $sub_total_amount += ($item->quantity * $item->unit_price);

                                        @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Sub Total</b></td>
                                        <td>{{$sub_total_amount}}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Add Fright</b></td>
                                        <td>{{$commercialInvoice->freight}}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Grand Total</b></td>
                                        <td>{{$commercialInvoice->freight+$sub_total_amount}}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Amount In Word</b></td>
                                        <td>{{number_to_word($commercialInvoice->freight+$sub_total_amount)}}</td>
                                    </tr>
                                </tfoot>
                            </table>

                            <!--start approved by-->
                            <table id="print-footer" style="position: absolute; bottom: 30px; width: 100%; display: none;">
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
