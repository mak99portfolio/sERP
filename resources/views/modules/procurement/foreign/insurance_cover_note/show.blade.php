@extends('layout')
@section('title', 'Insurance Cover Note')
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
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-4 hidden-xs"><h2 class="text-center">ICN No: {{ $insuranceCoverNote->insurance_cover_note_no }}</h2></div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        </div>
                        <div class="visible-xs col-xs-6"><button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</button></div>
                        <div class="visible-xs col-xs-6"><button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button></div>
                        <div class="visible-xs col-xs-12"><h2 class="text-center">ICN No: {{ $insuranceCoverNote->insurance_cover_note_no }}</h2></div>
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
                                        <td colspan="4"><strong>Insurance Cover Note</strong></td>
                                   </tr>
                                </thead>
                                <tbody>
                                   <tr>
                                       <td><strong>LC No:</strong> {{ $insuranceCoverNote->letter_of_credit->letter_of_credit_no }}</td>
                                       <td><strong>ICN No:</strong> {{ $insuranceCoverNote->insurance_cover_note_no }}</td>
                                       <td><strong>ICN Date:</strong> {{ $insuranceCoverNote->insurance_cover_note_date }}</td>
                                       <td><strong>ICN Agency Name:</strong> {{ $insuranceCoverNote->vendor->name }}</td>
                                   </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">ICN Bank Info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <tr>
                                       <td><strong>Account No:</strong> {{ $insuranceCoverNote->vendor_bank->ac_no }}</td>
                                       <td><strong>Account Name:</strong> {{ $insuranceCoverNote->vendor_bank->ac_name }}</td>
                                   </tr>
                                   <tr>
                                        <td><strong>Bank Name:</strong> {{ $insuranceCoverNote->vendor_bank->bank_name }}</td>
                                        <td><strong>Bank Address:</strong> {{ $insuranceCoverNote->vendor_bank->address }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Consignee Bank Info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <tr>
                                       <td><strong>Account No:</strong> {{ $insuranceCoverNote->company_bank->account_no }}</td>
                                       <td><strong>Account Name:</strong> {{ $insuranceCoverNote->company_bank->account_name }}</td>
                                   </tr>
                                   <tr>
                                        <td><strong>Bank Name:</strong> {{ $insuranceCoverNote->company_bank->bank->name }}</td>
                                        <td><strong>Bank Address:</strong> {{ $insuranceCoverNote->company_bank->address }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                   <tr>
                                       <td><strong>Notes:</strong> {{ $insuranceCoverNote->note }}</td>
                                   </tr>
                                </tbody>
                            </table>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="6">Cover Note Details</th>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <th>Percent</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                           <td><strong>Marine</strong> </td>
                                           <td>{{ $insuranceCoverNote->percent_of_marine }}%</td>
                                           <td>{{ number_format($insuranceCoverNote->amount_of_marine, 2) }}</td>
                                       </tr>
                                       <tr>
                                           <td><strong>WAR & SRCC</strong> </td>
                                           <td>{{ $insuranceCoverNote->percent_of_war }}%</td>
                                           <td>{{ number_format($insuranceCoverNote->amount_of_war, 2) }}</td>
                                       </tr>
                                       <tr>
                                           <td><strong>Net Premium</strong> </td>
                                           <td>{{ $insuranceCoverNote->percent_of_net_premium }}%</td>
                                           <td>{{ number_format($insuranceCoverNote->amount_of_net_premium, 2) }}</td>
                                       </tr>
                                       <tr>
                                           <td><strong>VAT</strong> </td>
                                           <td>{{ $insuranceCoverNote->percent_of_vat }}%</td>
                                           <td>{{ number_format($insuranceCoverNote->amount_of_vat, 2) }}</td>
                                       </tr>
                                       <tr>
                                           <td><strong>Stamp Duty</strong> </td>
                                           <td>{{ $insuranceCoverNote->percent_of_stamp_duty }}%</td>
                                           <td>{{ number_format($insuranceCoverNote->amount_of_stamp_duty, 2) }}</td>
                                       </tr>
                                       <tr>
                                           <td colspan="2"><strong>Grand Total</strong> </td>
                                           <td>{{ number_format($insuranceCoverNote->amount(), 2) }}</td>
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
<!-- /page content -->
@endsection
{{-- @section('script')






@endsection --}}
