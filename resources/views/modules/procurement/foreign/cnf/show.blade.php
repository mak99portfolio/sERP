@extends('layout')
@section('title', 'Duty TAX, VAT and CNF Bill')
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
                        <h2>Duty TAX, VAT and CNF Bill Details</h2>
                        <div class="btn-group pull-right">
                            <button class="btn btn-sm btn-info print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                            <a href="{{route('cnf.index')}}" class="btn btn-sm btn-success btn-addon"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Duty TAX, VAT and CNF Bill List</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive DivIdToPrint">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Consignee:</strong> {{ $cnf->consignee }}</td>
                                        <td><strong>Bill No:</strong> {{ $cnf->bill_no }}</td>
                                        <td><strong>Bill Date:</strong> {{ $cnf->bill_date }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>LC No:</strong> {{ $cnf->letter_of_credit->letter_of_credit_no }}</td>
                                        <td><strong>LC Opening Date:</strong> {{ $cnf->letter_of_credit->letter_of_credit_date }}</td>
                                        <td><strong>LC Value:</strong> {{ number_format($cnf->letter_of_credit->letter_of_credit_value, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Commercial invoice No:</strong> {{ $cnf->commercial_invoice->commercial_invoice_no }}</td>
                                        <td><strong>Commercial Invoice Date:</strong> {{ $cnf->commercial_invoice->date }}</td>
                                        <td><strong>B/L No:</strong> {{ $cnf->commercial_invoice->bl_no }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>B/L Date:</strong> {{ $cnf->commercial_invoice->bl_date }}</td>
                                        <td><strong>B/E No:</strong> {{ $cnf->bill_of_entry_no }}</td>
                                        <td><strong>B/E Date:</strong> {{ $cnf->bill_of_entry_date }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Arrival Date:</strong> {{ $cnf->arrival_date }}</td>
                                        <td><strong>Delivery Date:</strong> {{ $cnf->delivery_date }}</td>
                                        <td><strong>Job No:</strong> {{ $cnf->job_no }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total Days:</strong> {{ $cnf->total_day }}</td>
                                        <td><strong>C&F Value:</strong> {{ $cnf->cnf_value }}</td>
                                        <td><strong>USD Amount:</strong> {{ number_format($cnf->usd_amount, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Exchange Rate:</strong> {{ $cnf->exchange_rate }}</td>
                                        <td><strong>BDT Amount:</strong> {{ number_format($cnf->getBdtAmount(), 2) }}</td>
                                        <td><strong>CNF Agent :</strong> {{ $cnf->cnf_agent->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Exporter: </strong>{{ $cnf->letter_of_credit->vendor->name }}</td>
                                        <td><strong>Duty Payment Date:</strong> {{ $cnf->duty_payment_date }}</td>
                                        <td><strong>Container No:</strong> {{ $cnf->commercial_invoice->container_no }}</td>
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
                                            <td>{{ $item->amount_in_taka() }}</td>
                                            <td>{{ $item->amount_in_paisa() }}</td>
                                        </tr>
                                        @php
                                            $total_taka += $item->amount_in_taka();
                                            $total_paisa += $item->amount_in_paisa();
                                        @endphp
                                    @endforeach

                                    <tr>
                                        <td class="text-right" colspan="2"><strong>Voucher Tk=</strong></td>
                                        <td><strong></strong> {{ $total_taka }}</td>
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
