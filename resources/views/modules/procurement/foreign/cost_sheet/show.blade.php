@extends('layout')
@section('title', 'Cost Sheet Details')
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
                        <h2>Cost Sheet Details</h2>
                        <div class="btn-group pull-right">
                            <button class="btn btn-sm btn-info print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                            <a href="{{route('cost-sheet.index')}}" class="btn btn-sm btn-success btn-addon"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Cost Sheet List</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive DivIdToPrint">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>L/C No: </strong> {{ $costSheet->letter_of_credit->letter_of_credit_no }}</td>
                                        <td><strong>L/C Opening Date: </strong> {{ $costSheet->letter_of_credit->letter_of_credit_date }}</td>
                                        <td><strong>Currency: </strong> {{ $costSheet->currency }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="4">LC Bank Info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>A/C No: </strong> {{ $costSheet->letter_of_credit->issue_ac_no }}</td>
                                        <td><strong>A/C Name: </strong> {{ $costSheet->letter_of_credit->issue_ac_name }}</td>
                                        <td><strong>Bank Name: </strong> {{ $costSheet->letter_of_credit->issue_bank_name }}</td>
                                        <td><strong>Branch Name: </strong> {{ $costSheet->letter_of_credit->issue_branch_name }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>L/C Amount: </strong> {{ number_format($costSheet->letter_of_credit->letter_of_credit_value, 2) }}</td>
                                        <td><strong>Exchange Rate: </strong> {{ $costSheet->exchange_rate }}</td>
                                        <td><strong>BDT Amount: </strong> {{ number_format($costSheet->getBdtAmount(), 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Note: </strong> {{ $costSheet->note }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="5">Particulars</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Cost Particulars</th>
                                        <th>Percent (%)</th>
                                        <th>Amount</th>
                                        <th>Amt. in round Figure</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong></strong>1</td>
                                        <td><strong>LC Margin </strong></td>
                                        <td><strong></strong> {{ $costSheet->cost_sheet_particular->percent_of_lc_margin }}</td>
                                        <td><strong></strong> {{ number_format($costSheet->cost_sheet_particular->amount_of_lc_margin, 2) }}</td>
                                        <td><strong></strong> {{ number_format($costSheet->cost_sheet_particular->round_amount_of_lc_margin, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong></strong>2</td>
                                        <td><strong>LC Commision </strong></td>
                                        <td><strong></strong> {{ $costSheet->cost_sheet_particular->percent_of_lc_commision }}</td>
                                        <td><strong></strong> {{ number_format($costSheet->cost_sheet_particular->amount_of_lc_commision, 2) }}</td>
                                        <td><strong></strong> {{ number_format($costSheet->cost_sheet_particular->round_amount_of_lc_commision, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong></strong>3</td>
                                        <td><strong>VAT </strong></td>
                                        <td><strong></strong> {{ $costSheet->cost_sheet_particular->percent_of_vat }}</td>
                                        <td><strong></strong> {{ number_format($costSheet->cost_sheet_particular->amount_of_vat, 2) }}</td>
                                        <td><strong></strong> {{ number_format($costSheet->cost_sheet_particular->round_amount_of_vat, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong></strong>4</td>
                                        <td><strong>SWIFT </strong></td>
                                        <td><strong></strong> {{ $costSheet->cost_sheet_particular->percent_of_swift }}</td>
                                        <td><strong></strong> {{ number_format($costSheet->cost_sheet_particular->amount_of_swift, 2) }}</td>
                                        <td><strong></strong> {{ number_format($costSheet->cost_sheet_particular->round_amount_of_swift, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong></strong>5</td>
                                        <td><strong>Stamp Charge </strong></td>
                                        <td><strong></strong> {{ $costSheet->cost_sheet_particular->percent_of_stamp_charge }}</td>
                                        <td><strong></strong> {{ number_format($costSheet->cost_sheet_particular->amount_of_stamp_charge, 2) }}</td>
                                        <td><strong></strong> {{ number_format($costSheet->cost_sheet_particular->round_amount_of_stamp_charge, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong></strong>6</td>
                                        <td><strong>LCAF Issue Charge </strong></td>
                                        <td><strong></strong> {{ $costSheet->cost_sheet_particular->percent_of_lcaf_issue_charge }}</td>
                                        <td><strong></strong> {{ number_format($costSheet->cost_sheet_particular->amount_of_lcaf_issue_charge, 2) }}</td>
                                        <td><strong></strong> {{ number_format($costSheet->cost_sheet_particular->round_amount_of_lcaf_issue_charge, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong></strong>7</td>
                                        <td><strong>IMP </strong></td>
                                        <td><strong></strong> {{ $costSheet->cost_sheet_particular->percent_of_imp }}</td>
                                        <td><strong></strong> {{ number_format($costSheet->cost_sheet_particular->amount_of_imp, 2) }}</td>
                                        <td><strong></strong> {{ number_format($costSheet->cost_sheet_particular->round_amount_of_imp, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong></strong>8</td>
                                        <td><strong>LC Application Form </strong></td>
                                        <td><strong></strong> {{ $costSheet->cost_sheet_particular->percent_of_lc_application_form }}</td>
                                        <td><strong></strong> {{ number_format($costSheet->cost_sheet_particular->amount_of_lc_application_form, 2) }}</td>
                                        <td><strong></strong> {{ number_format($costSheet->cost_sheet_particular->round_amount_of_lc_application_form, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong></strong>9</td>
                                        <td><strong>Other Charge(If any) </strong></td>
                                        <td><strong></strong> {{ $costSheet->cost_sheet_particular->percent_of_others }}</td>
                                        <td><strong></strong> {{ number_format($costSheet->cost_sheet_particular->amount_of_others, 2) }}</td>
                                        <td><strong></strong> {{ number_format($costSheet->cost_sheet_particular->round_amount_of_others, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Total </strong></td>
                                        <td><strong></strong> {{ number_format($costSheet->cost_sheet_particular->get_total_amount(), 2) }}</td>
                                        <td><strong></strong> {{ number_format($costSheet->cost_sheet_particular->get_total_amount_round(), 2) }}</td>
                                    </tr>
                                </tbody>
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
