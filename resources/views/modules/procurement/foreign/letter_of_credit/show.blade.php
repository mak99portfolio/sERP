@extends('layout')
@section('title', 'Letterc of Credit Details')
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
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-4 hidden-xs"><h2 class="text-center">LC No: {{$letterOfCredit->letter_of_credit_no}}</h2></div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        </div>
                        <div class="visible-xs col-xs-6"><button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</button></div>
                        <div class="visible-xs col-xs-6"><button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button></div>
                        <div class="visible-xs col-xs-12"><h2 class="text-center">LC No: {{$letterOfCredit->letter_of_credit_no}}</h2></div>
                    </div>
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive print-area">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                    <td><strong>LC No:</strong> {{$letterOfCredit->letter_of_credit_no}}</td>
                                        <td><strong>LC Date :</strong> {{$letterOfCredit->letter_of_credit_date}}</td>
                                        <td><strong>LC Value :</strong> {{number_format($letterOfCredit->letter_of_credit_value,2)}}</td>
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
                                        <td colspan="3"><strong>Bank Address:</strong>  {{$letterOfCredit->beneficiary_bank_name}}</td>
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
                                        <td colspan="3"><strong>Bank Address</strong> {{$letterOfCredit->issue_bank_name}}</td>
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
                                        <th class="text-center"><strong>Quantity</strong></th>
                                        <th class="text-center"><strong>Unit Price</strong></th>
                                        <th class="text-center"><strong>Discount</strong></th>
                                        <th class="text-center"><strong>D.Rate</strong></th>
                                        <th class="text-center"><strong>Vat(%)</strong></th>
                                        <th class="text-right"><strong>Sub Total</strong></th>
                                     </tr>
                                </thead>
                                <tbody>
                                    @foreach($letterOfCredit->items as $key=>$item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->product->hs_code}}</td>
                                        <td>{{$item->product->name}}</td>
                                        <td>{{$item->product->unit_of_measurement->name}}</td>
                                        <td class="text-right">{{$item->quantity}}</td>
                                        <td class="text-right">{{$item->unit_price}}</td>
                                        <td class="text-right">{{$item->discount}}</td>
                                        <td class="text-right">{{$item->d_rate}}</td>
                                        <td class="text-right">{{$item->vat}}</td>
                                        <td class="text-right">{{number_format(($item->quantity * $item->unit_price)+($item->d_rate+$item->vat)-$item->discount,2)}}</td>
                                     
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