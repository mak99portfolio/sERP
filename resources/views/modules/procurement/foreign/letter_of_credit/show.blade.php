@extends('layout')
@section('title', 'Letterc of Credit Details')
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
                        <h2>Letter of Credit Details</h2>
                        <div class="btn-group pull-right">
                            <button class="btn btn-sm btn-info print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                            <a href="{{route('letter-of-credit.index')}}" class="btn btn-sm btn-success btn-addon"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;LC List</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive DivIdToPrint">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                    <td><strong>LC No:</strong> {{$letterOfCredit->letter_of_credit_no}}</td>
                                        <td><strong>LC Date :</strong> {{$letterOfCredit->letter_of_credit_date}}</td>
                                        <td><strong>LC Value :</strong> {{$letterOfCredit->letter_of_credit_value}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Vendor:</strong> {{$letterOfCredit->vendor->name}}</td>
                                        <td><strong>LC Expire Date:</strong> {{$letterOfCredit->letter_of_credit_expire_date}}</td>
                                        <td><strong>LC Status :</strong> {{$letterOfCredit->letter_of_credit_status}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>LC Shipment Date :</strong> {{$letterOfCredit->letter_of_credit_shipment_date}}</td>
                                        <td><strong>Currency :</strong>  {{$letterOfCredit->currency}}</td>
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
                                        <td><strong>A/C No :</strong>  {{$letterOfCredit->beneficiary_ac_no}}</td>
                                        <td><strong>A/C Name :</strong>  {{$letterOfCredit->beneficiary_ac_name}}</td>
                                        <td><strong>Branch Name :</strong>  {{$letterOfCredit->beneficiary_branch_name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Bank Address:</strong>  {{$letterOfCredit->beneficiary_bank_name}}</td>
                                        <td><strong></strong></td>
                                        <td><strong></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Issue Bank info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>A/C No :</strong> {{$letterOfCredit->issue_ac_no}}</td>
                                        <td><strong>A/C Name :</strong> {{$letterOfCredit->issue_ac_name}}</td>
                                        <td><strong>Branch Name :</strong> {{$letterOfCredit->issue_branch_name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Bank Address</strong> {{$letterOfCredit->issue_bank_name}}</td>
                                        <td><strong></strong></td>
                                        <td><strong></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">LCA Information :</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>#</strong></td>
                                        <td><strong>LCA No</strong></td>
                                    </tr>
                                    @foreach($letterOfCredit->application_numbers as $key=>$application_numbers)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$application_numbers->lca_no}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Partial Shipment :</strong> {{$letterOfCredit->partial_shipment}}</td>
                                        <td><strong>Transhipment Information :</strong> {{$letterOfCredit->transhipment_information}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">PI Information :</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>#</strong></td>
                                        <td><strong>PI No </strong></td>
                                        <td><strong>PI Date:</strong></td>
                                    </tr>
                                    @foreach($letterOfCredit->proforma_invoices as $key=>$proforma_invoice_noand_date)
                                    <tr>
                                    <td>{{$key+1}}</td>
                                        <td>{{$proforma_invoice_noand_date->proforma_invoice_no}}</td>
                                        <td>{{$proforma_invoice_noand_date->proforma_invoice_date}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="10">Product Table:</th>
                                    </tr>
                                    <tr>
                                        <th><strong>#</strong></th>
                                        <th><strong>H.S. CODE</strong></th>
                                        <th><strong>Product Name</strong></th>
                                        <th><strong>UOM</strong> </th>
                                        <th><strong>Quantity</strong></th>
                                        <th><strong>Unit Price</strong></th>
                                        <th><strong>Discount</strong></th>
                                        <th><strong>D.Rate</strong></th>
                                        <th><strong>Vat(%)</strong></th>
                                        <th><strong>Sub Total</strong></th>
                                     </tr>
                                </thead>
                                <tbody>
                                    @foreach($letterOfCredit->items as $key=>$item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->product->hs_code}}</td>
                                        <td>{{$item->product->name}}</td>
                                        <td>{{$item->product->unit_of_measurement->name}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->unit_price}}</td>
                                        <td>{{$item->discount}}</td>
                                        <td>{{$item->d_rate}}</td>
                                        <td>{{$item->vat}}</td>
                                        <td>{{($item->quantity * $item->unit_price)+($item->d_rate+$item->vat)-$item->discount}}</td>
                                     
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!--start approved by-->
                            <table id="print-footer" style="margin-top: 40px; width: 100%; display: none;">
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