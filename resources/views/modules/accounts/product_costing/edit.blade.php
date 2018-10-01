@extends('layout')
@section('title', 'Product Costing')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Product Costing</h2>
                        <a class="btn btn-primary btn-sm pull-right" href="{{route('product-costing.index')}}"><i class="fa fa-list-ul"></i> List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <table class="table border_1 m-b-20">
                            <tbody>
                                <tr>
                                    <td><strong>Consignee</strong></td>
                                    <td><strong>:</strong></td>
                                    <td colspan="2">{{ $bill_of_lading->consignee }}</td>
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
                                    <td>{{ $bill_of_lading->letter_of_credit->letter_of_credit_no }}</td>
                                    <td>{{ $bill_of_lading->letter_of_credit->letter_of_credit_date }}</td>
                                    <td><strong>LC value</strong></td>
                                    <td><strong>:</strong></td>
                                    <td colspan="4">USD {{ $bill_of_lading->letter_of_credit->amount() }}</td>
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
                                            <td class="text-right"><strong>
                                                {{ round($bill_of_lading->letter_of_credit->insurance_cover_note->amount() 
                                                    * ($bill_of_lading->amount()/ $bill_of_lading->letter_of_credit->amount()),2) }}
                                            </strong></td>
                                        </tr>
                                        <tr>
                                            <td>12/07/2018</td>
                                            <td>
                                                <strong>LC Charge(Partical)</strong><br>
                                                <span class="small">(Tk 144,126 / USD 324*USD 234)</span>
                                            </td>
                                            <td class="text-right"><strong>
                                                    {{ round($bill_of_lading->letter_of_credit->cost_sheet->cost_sheet_particular->get_total_amount() 
                                                        * ($bill_of_lading->amount()/ $bill_of_lading->letter_of_credit->amount()),2) }}
                                            </strong></td>
                                        </tr>
                                        <tr>
                                            <td>12/07/2018</td>
                                            <td>
                                                <strong>D / Retirement(Including L /C Margin)</strong><br>
                                                <span class="small">(USD 324 @23.04)</span>
                                            </td>
                                            <td class="text-right"><input type="number" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>12/07/2018</td>
                                            <td colspan="2"><strong>C & F Expense</strong></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2"></td>
                                            <td><strong>Duty, Taxes & VAT</strong></td>
                                            <td class="text-right">41018</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Port Charge</strong></td>
                                            <td class="text-right">12018</td>
                                        </tr>

                                        <tr>
                                            <td>12/07/2018</td>
                                            <td>
                                                <strong>Transport Charge(PARTIAL)</strong><br>
                                                <span class="small">14412/6</span>
                                            </td>
                                            <td class="text-right"><strong>231232</strong></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2" class="font-20"><strong>Total Landing Cost(Taka):</strong></td>
                                            <td class="text-right">34234</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
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
                                            <th class="text-right">U Price TK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bill_of_lading->items as $item)
                                            
                                        <tr>
                                            <td>{{ $item->product->name }}</td>
                                            <td class="text-right">{{ $item->quantity }}</td>
                                            <td>{{ $item->product->unit_of_measurement->name }}</td>
                                            <td class="text-right">{{ $item->unit_price }}</td>
                                            <td class="text-right">{{ $bill_of_lading->letter_of_credit->exchange_rate }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><strong>Total Qty</strong></td>
                                            <td class="text-right">23</td>
                                            <td>SET</td>
                                            <td class="text-right">14.21</td>
                                            <td class="text-right">3213.44</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Invoice Value</td>
                                    <td>USD: 23412</td>
                                </tr>
                                <tr>
                                    <td>Cost Per Unit (Tk/USD)</td>
                                    <td>BDT: 23412</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="text-center">IN WORD: </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection
