@extends('layout')
@section('title', 'Insurance Cover Note')
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
                        <h2>Insurance Cover Note</h2>


                        <div class="btn-group pull-right">
                            <button class="btn btn-sm btn-info btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                            <a href="{{route('insurance-cover-note.index')}}" class="btn btn-sm btn-success btn-addon"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Insurance Cover Note List</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive DivIdToPrint">
                            <table class="table table-bordered">
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
                                       <td><strong>Account No:</strong> {{ $insuranceCoverNote->icn_bank_account_no }}</td>
                                       <td><strong>Account Name:</strong> {{ $insuranceCoverNote->icn_bank_account_name }}</td>
                                   </tr>
                                   <tr>
                                        <td><strong>Bank Name:</strong> {{ $insuranceCoverNote->icn_bank_name }}</td>
                                        <td><strong>Bank Address:</strong> {{ $insuranceCoverNote->icn_bank_address }}</td>
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
                                       <td><strong>Account No:</strong> {{ $insuranceCoverNote->consignee_bank_account_no }}</td>
                                       <td><strong>Account Name:</strong> {{ $insuranceCoverNote->consignee_bank_account_name }}</td>
                                   </tr>
                                   <tr>
                                        <td><strong>Bank Name:</strong> {{ $insuranceCoverNote->consignee_bank_name }}</td>
                                        <td><strong>Bank Address:</strong> {{ $insuranceCoverNote->consignee_bank_address }}</td>
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
                                           <td>{{ $insuranceCoverNote->percent_of_marine }} %</td>
                                           <td>{{ $insuranceCoverNote->amount_of_marine }}</td>
                                       </tr>
                                       <tr>
                                           <td><strong>WAR & SRCC</strong> </td>
                                           <td>{{ $insuranceCoverNote->percent_of_war }} %</td>
                                           <td>{{ $insuranceCoverNote->amount_of_war }}</td>
                                       </tr>
                                       <tr>
                                           <td><strong>Net Premium</strong> </td>
                                           <td>{{ $insuranceCoverNote->percent_of_net_premium }} %</td>
                                           <td>{{ $insuranceCoverNote->amount_of_net_premium }}</td>
                                       </tr>
                                       <tr>
                                           <td><strong>VAT</strong> </td>
                                           <td>{{ $insuranceCoverNote->percent_of_vat }} %</td>
                                           <td>{{ $insuranceCoverNote->amount_of_vat }}</td>
                                       </tr>
                                       <tr>
                                           <td><strong>Stamp Duty</strong> </td>
                                           <td>{{ $insuranceCoverNote->percent_of_stamp_duty }} %</td>
                                           <td>{{ $insuranceCoverNote->amount_of_stamp_duty }}</td>
                                       </tr>
                                       <tr>
                                           <td colspan="2"><strong>Grand Total</strong> </td>
                                           <td>{{ $insuranceCoverNote->amount_of_grand_total() }}</td>
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
