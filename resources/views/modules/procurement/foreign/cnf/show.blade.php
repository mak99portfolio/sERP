@extends('layout')
@section('title', 'Duty TAX, VAT and CNF Bill')
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
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-4 hidden-xs"><h2 class="text-center">BL No : {{ $cnf->bill_of_lading->bill_of_lading_no }}</h2></div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        </div>
                        <div class="visible-xs col-xs-6"><button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</button></div>
                        <div class="visible-xs col-xs-6"><button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button></div>
                        <div class="visible-xs col-xs-12"><h2 class="text-center">BL No : {{ $cnf->bill_of_lading->bill_of_lading_no }}</h2></div>
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
                                        <td colspan="3" class="text-center"><strong>Duty TAX, VAT and CNF Bill</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>BL No:</strong> {{ $cnf->bill_of_lading->bill_of_lading_no  }} </td>
                                        <td><strong>BL Date:</strong> {{ $cnf->bill_of_lading->bill_of_lading_date }} </td>
                                        <td><strong>LC No:</strong> {{ $cnf->bill_of_lading->letter_of_credit->letter_of_credit_no }} </td>
                                    </tr>
                                    <tr>
                                        <td><strong>LC Opening Date:</strong> {{ $cnf->bill_of_lading->letter_of_credit->letter_of_credit_date }} </td>
                                        <td><strong>LC Value (USD):</strong> {{ number_format($cnf->bill_of_lading->letter_of_credit->letter_of_credit_value, 2) }}</td>
                                        <td><strong>Exporter:</strong> {{ $cnf->bill_of_lading->letter_of_credit->vendor->name }} </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td colspan="4">Commercial Invoice List</td>
                                    </tr>
                                    <tr>
                                        <td>#</td>
                                        <td>Commercial Invoice No</td>
                                        <td>Commercial Invoice Date</td>
                                        <td>Container No</td>
                                    </tr>
                                </thead>
                                    <tbody>
                                        @foreach ($cnf->bill_of_lading->commercial_invoices as $item)
                                        <tr>
                                            <td> {{ $loop->iteration }} </td>
                                            <td> {{ $item->commercial_invoice_no }} </td>
                                            <td> {{ $item->date }} </td>
                                            <td> {{ $item->container_no }} </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Bill No:</strong> {{ $cnf->bill_no }} </td>
                                            <td><strong>Bill Date:</strong> {{ $cnf->bill_date }} </td>
                                            <td><strong>Consignee:</strong> {{ $cnf->consignee }} </td>
                                        </tr>
                                        <tr>
                                            <td><strong>B/E No:</strong> {{ $cnf->bill_of_entry_no }} </td>
                                            <td><strong>B/E Date:</strong> {{ $cnf->bill_of_entry_date }} </td>
                                            <td><strong>Arrival Date:</strong> {{ $cnf->arrival_date }} </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Delivery Date:</strong> {{ $cnf->delivery_date }} </td>
                                            <td><strong>Job No:</strong> {{ $cnf->job_no }} </td>
                                            <td><strong>Total Days:</strong> {{ $cnf->total_day }} </td>
                                        </tr>
                                        <tr>
                                            <td><strong>C&F Value:</strong> {{ $cnf->cnf_value }} </td>
                                            <td><strong>USD Amount:</strong> {{ number_format($cnf->usd_amount, 2) }} </td>
                                            <td><strong>Exchange Rate:</strong> {{ $cnf->exchange_rate }} </td>
                                        </tr>
                                        <tr>
                                            <td><strong>BDT Amount:</strong> {{ number_format($cnf->amount_in_bdt(), 2) }} </td>
                                            <td><strong>CNF Agent:</strong> {{ $cnf->cnf_agent->name }} </td>
                                            <td><strong>Duty Payment Date:</strong> {{ $cnf->duty_payment_date }} </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="4">Particulars of Consignments Table:</th>
                                            </tr>
                                            <tr>
                                                <th>SL No</th>
                                                <th>Particulars of Consignments</th>
                                                <th>Taka</th>
                                                <th>Paisa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_taka = 0;
                                                $total_paisa = 0;
                                            @endphp
                                            @foreach ($cnf->consignment_particular_cnf as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->consignment_particular->name }}</td>
                                                    <td>{{ number_format($item->amount_in_taka(), 2) }}</td>
                                                    <td>{{ $item->amount_in_paisa() }}</td>
                                                </tr>
                                                @php
                                                    $total_taka += $item->amount_in_taka();
                                                    $total_paisa += $item->amount_in_paisa();
                                                @endphp
                                            @endforeach

                                            <tr>
                                                <td class="text-right" colspan="2"><strong> Voucher Tk : </strong></td>
                                                <td><strong></strong> {{ number_format($total_taka, 2) }}</td>
                                                <td><strong></strong> {{ $total_paisa }}</td>
                                            </tr>
                                            {{-- <tr>
                                                <td class="text-right" colspan="2"><strong>Previous Due Tk=</strong></td>
                                                <td><strong></strong> 125</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right" colspan="2"><strong>Total Voucher Tk=</strong> </td>
                                                <td><strong></strong> 125</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right" colspan="2"><strong>Cash Received/Pay Order Tk=</strong></td>
                                                <td><strong></strong> 125</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right" colspan="2"><strong>Due Tk=</strong></td>
                                                <td><strong></strong> 125</td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered">
                                        <tbody>
                                        <td><strong>Amount In Word:</strong> {{ $cnf->amount_in_word() }}</td>
                                        </tbody>
                                        <tbody>
                                        <td><strong>Notes: </strong>{{ $cnf->note }}</td>
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
