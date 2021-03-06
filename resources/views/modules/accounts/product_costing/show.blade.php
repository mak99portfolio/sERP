@extends('layout')
@section('title', 'Product Costing')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-reply" aria-hidden="true"></i>&nbsp;Back</button>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-4 hidden-xs"><h2 class="text-center">Product Costing</h2></div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        </div>
                        <div class="visible-xs col-xs-6"><button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</button></div>
                        <div class="visible-xs col-xs-6"><button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button></div>
                        <div class="visible-xs col-xs-12"><h2 class="text-center">Product Costing</h2></div>
                    </div>
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content print-area">
                        <br />
                            <input type="hidden" name="bill_of_lading_id" value="{{ $productCosting->bill_of_lading->id }}">
                            @csrf
                            <table class="table border_1 m-b-20">
                                <tbody>
                                    <tr>
                                        <td><strong>Consignee</strong></td>
                                        <td><strong>:</strong></td>
                                        <td colspan="2">{{ $productCosting->bill_of_lading->consignee }}</td>
                                        <td><strong>Consignment No</strong></td>
                                        <td><strong>:</strong></td>
                                        <td>47</td>
                                        <td><strong>Report Date</strong></td>
                                        <td><strong>:</td>
                                        <td>18/09/2018</td>
                                    </tr>
                                    <tr>
                                        <td><strong>LC/No & Date</strong></td>
                                        <td><strong>:</strong></td>
                                        <td>{{ $productCosting->bill_of_lading->letter_of_credit->letter_of_credit_no }}</td>
                                        <td>{{ $productCosting->bill_of_lading->letter_of_credit->letter_of_credit_date }}</td>
                                        <td><strong>LC value</strong></td>
                                        <td><strong>:</strong></td>
                                        <td colspan="4">USD {{ $productCosting->bill_of_lading->letter_of_credit->amount() }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Invoice No</strong></td>
                                        <td><strong>:</strong></td>
                                        <td>20183423</td>
                                        <td>18/09/2018</td>
                                        <td><strong>Invoice Value</strong></td>
                                        <td><strong>:</strong></td>
                                        <td>USD 42317</td>
                                        <td><strong>C & F Agent</strong></td>
                                        <td><strong>:</strong></td>
                                        <td>125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>B/L No & Date</strong></td>
                                        <td><strong>:</strong></td>
                                        <td>203423</td>
                                        <td>18/09/2018</td>
                                        <td><strong>B/E No & Date</strong></td>
                                        <td><strong>:</strong></td>
                                        <td colspan="3">42317</td>
                                        <td>18/09/2018</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Container No</strong></td>
                                        <td><strong>:</strong></td>
                                        <td colspan="2">203423</td>
                                        <td><strong>Arival Date</strong></td>
                                        <td><strong>:</strong></td>
                                        <td>18/09/2018</td>
                                        <td><strong>Delivery Date</strong></td>
                                        <td><strong>:</strong></td>
                                        <td>18/09/2018</td>
                                    </tr>
                                    <tr>
                                        <td><strong>CRF Value</strong></td>
                                        <td><strong>:</strong></td>
                                        <td colspan="2">USD 2343</td>
                                        <td><strong>Rate</strong></td>
                                        <td><strong>:</strong></td>
                                        <td>+ 0 %</td>
                                        <td><strong>ASS Value Taka</strong></td>
                                        <td><strong>:</strong></td>
                                        <td>125</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th><strong>Date</strong></th>
                                                <th><strong>Description</strong></th>
                                                <th class="text-right"><strong>Amount (Tk)</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>12/07/2018</td>
                                                <td>
                                                    <strong>(Insurance(Partial)</strong><br>
                                                    <span class="small">NGIC/MKB/07/2018</span>
                                                </td>
                                                <td class="text-right">
                                                        {{ $productCosting->bill_of_lading->insurance_amount() }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>12/07/2018</td>
                                                <td>
                                                    <strong>LC Charge(Partical)</strong><br>
                                                    <span class="small">(Tk 144,126 / USD 324*USD 234)</span>
                                                </td>
                                                <td class="text-right">
                                                        {{ $productCosting->bill_of_lading->lc_charge() }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td rowspan="3">12/07/2018</td>
                                                <td>
                                                    <strong>D / Retirement(Including L /C Margin)</strong><br>
                                                    <span class="small">(USD 324 @23.04)</span>
                                                </td>
                                                <td class="text-right">{{ $productCosting->retirement }}</td>
                                            </tr>
                                            <tr>
                                                <td>Remittance</td>
                                                <td class="text-right">{{ $productCosting->remittance }}</td>
                                            </tr>
                                            <tr>
                                                <td>D/H Charge</td>
                                                <td class="text-right">{{ $productCosting->dh_charge }}</td>
                                            <tr>
                                                <td>12/07/2018</td>
                                                <td colspan="2"><strong><u>C & F Expense</u></strong></td>
                                            </tr>
                                            @foreach($productCosting->bill_of_lading->cnf->consignment_particular_cnf as $item)
                                            <tr>
                                                @if($loop->first)
                                                <td rowspan="{{ $loop->count }}"></td>
                                                @endif
                                                <td><strong>{{ $item->consignment_particular->name }}</strong></td>
                                                <td class="text-right">{{ $item->amount }}</td>
                                            </tr>
                                            @endforeach

                                            <tr>
                                                <td>12/07/2018</td>
                                                <td>
                                                    <strong>Transport Charge(PARTIAL)</strong><br>
                                                    <span class="small">14412/6</span>
                                                </td>
                                                <td class="text-right">{{ $productCosting->transport_charge }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2" class="font-20"><strong>Total Landing Cost(Taka):</strong></td>
                                                <td class="text-right">{{ round($productCosting->total_landing_cost(),2) }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                @php
                                    $cost_per_unit = round($productCosting->total_landing_cost()/$productCosting->bill_of_lading->amount(),2);
                                @endphp
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="5">Cost of Sales (Ex Ware House)</th>
                                            </tr>
                                            <tr>
                                                <th>Costing Item</th>
                                                <th class="text-right">Qty</th>
                                                <th>Unit</th>
                                                <th class="text-right">U.Price USD</th>
                                                <th class="text-right">U.Price TK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productCosting->bill_of_lading->items as $item)
                                                
                                            <tr>
                                                <td>{{ $item->product->name }}</td>
                                                <td class="text-right">{{ $item->quantity }}</td>
                                                <td>{{ $item->product->unit_of_measurement->name }}</td>
                                                <td class="text-right">{{ round($unit_price_in_usd = $item->unit_price * (1+ $productCosting->bill_of_lading->per_usd_freight()),2) }}</td>
                                                <td class="text-right">{{ round($unit_price_in_usd * $cost_per_unit,2)}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td><strong>Total Qty</strong></td>
                                                <td class="text-right">{{ $productCosting->bill_of_lading->items->sum('quantity') }}</td>
                                                <td colspan="3"></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Invoice Value</td>
                                        <td>USD {{ $productCosting->bill_of_lading->amount() }}</td>
                                    </tr>
                                    <tr>
                                        <td>Cost Per Unit (Tk/USD)</td>
                                        <td>{{ $cost_per_unit }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="text-center"><strong>IN WORD:</strong> {{ number_to_word(round($productCosting->total_landing_cost(),2),'Tk','Paisa') }}  </p>
                            <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection
