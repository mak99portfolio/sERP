@extends('layout')
@section('title', 'Commercial Invoice Details')
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
                        <h2>Commercial Invoice Details</h2>
                        <div class="btn-group pull-right">
                            <button class="btn btn-sm btn-info print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                            <a href="{{route('commercial-invoice.index')}}" class="btn btn-sm btn-success btn-addon"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Commercial Invoice List</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive DivIdToPrint">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Commercial Invoice No :</strong> {{$commercialInvoice->commercial_invoice_no}}</td>
                                        <td><strong>Date:</strong> {{$commercialInvoice->date}}</td>
                                        <td><strong>LC No :</strong> {{$commercialInvoice->LetterOfCredit->letter_of_credit_no}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>LC Date :</strong>  {{$commercialInvoice->LetterOfCredit->letter_of_credit_date}}</td>
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
                                        <td><strong>A/C No :</strong> {{$commercialInvoice->LetterOfCredit->beneficiary_ac_no}}</td>
                                        <td><strong>A/C Name :</strong> {{$commercialInvoice->LetterOfCredit->beneficiary_ac_name}}</td>
                                        <td><strong>Branch Name :</strong> {{$commercialInvoice->LetterOfCredit->beneficiary_branch_name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Bank Name</strong> {{$commercialInvoice->LetterOfCredit->beneficiary_bank_name}}</td>
                                        <td><strong></strong></td>
                                        <td><strong></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Bl No:</strong> {{$commercialInvoice->bill_no}}</td>
                                        <td><strong>Bl Date :</strong> {{$commercialInvoice->bill_date}}</td>
                                        <td><strong>Vessel No / Flight No :</strong> {{$commercialInvoice->vessel_no}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Container No:</strong> {{$commercialInvoice->container_no}}</td>
                                        <td><strong></strong></td>
                                        <td><strong></strong></td>
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
                                        <td><strong>Port of Loading :</strong> {{$commercialInvoice->loading_port->name}}</td>
                                        <td><strong>Port of Discharge :</strong> {{$commercialInvoice->discharge_port->name}}</td>
                                        <td><strong>Country of Final Destination :</strong> {{$commercialInvoice->destination_country->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Final Destination :</strong> {{$commercialInvoice->city->name}}</td>
                                        <td><strong>Country of Origin of Goods :</strong> {{$commercialInvoice->country_goods->name}}</td>
                                        <td><strong></strong></td>
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
                                        <th>Unit Price Used ($)</th>
                                        <th>Qnantity</th>
                                        <th>Amount ($)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($commercialInvoice->items as $key=>$item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->product->name}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->unit_price}}</td>
                                        <td>{{($item->quantity * $item->unit_price)}}</td>
                                     
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Sub Total</b></td>
                                        <td>$180</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Add Fright</b></td>
                                        <td>{{$commercialInvoice-> fright}}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Grand Total</b></td>
                                        <td>$180</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Amount In Word</b></td>
                                        <td>$180</td>
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