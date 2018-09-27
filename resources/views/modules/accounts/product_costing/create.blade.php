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
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Consignee:</strong> Magnum Enterprise Limited</td>
                                        <td><strong>Consignment:</strong> 47</td>
                                        <td><strong>Report Date: </strong> 18/09/2018</td>
                                    </tr>
                                    <tr>
                                        <td><strong>LC/No & Date:</strong> 125 <span class="text-right">18/09/2018</span></td>
                                        <td colspan="2"><strong>LC value:</strong> Usd 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Invoice No:</strong> 125 <span class="text-right">18/09/2018</span></td>
                                        <td colspan="2"><strong>Invoice Value:</strong> Usd 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>B/L No & Date:</strong> 125 <span class="text-right">18/09/2018</span></td>
                                        <td><strong>B/E No & Date:</strong> 125 <span class="text-right">18/09/2018</span></td>
                                        <td><strong>Container No: </strong> 23213</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Arival Date:</strong> 18/09/2018</td>
                                        <td><strong>Delivery Date:</strong> 18/09/2018</td>
                                        <td><strong>CRF value</strong> USD 2343</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Rate:</strong> <span>125.324</span><span>+ 0 %</span></td>
                                        <td><strong>ASS Value Taka:</strong> 125</td>
                                        <td colspan="3"><strong>C & F Agent:</strong>125</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Amount (Tk)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>12/07/2018</td>
                                                <td>Insurance(Partial)</td>
                                                <td class="text-right"><strong>231232</strong></td>
                                            </tr>
                                            <tr>
                                                <td>12/07/2018</td>
                                                <td>LC(Partial)</td>
                                                <td class="text-right"><strong>231232</strong></td>
                                            </tr>
                                            <tr>
                                                <td>12/07/2018</td>
                                                <td>Insurance(Partial)</td>
                                                <td class="text-right"><strong>231232</strong></td>
                                            </tr>
                                            <tr>
                                                <td>12/07/2018</td>
                                                <td>LC(Partial)</td>
                                                <td class="text-right"><strong>231232</strong></td>
                                            </tr>
                                            <tr>
                                                <td>12/07/2018</td>
                                                <td>Insurance(Partial)</td>
                                                <td class="text-right"><strong>231232</strong></td>
                                            </tr>
                                            <tr>
                                                <td>12/07/2018</td>
                                                <td>LC(Partial)</td>
                                                <td class="text-right"><strong>231232</strong></td>
                                            </tr>
                                        <tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2"><strong>Total Landing Cost(Taka):</strong></td>
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
                                            <tr>
                                                <td>3213</td>
                                                <td class="text-right">23</td>
                                                <td>SET</td>
                                                <td class="text-right">14.21</td>
                                                <td class="text-right">3213.44</td>
                                            </tr>
                                        <tbody>
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
