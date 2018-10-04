@extends('layout')
@section('title', 'Commercial Invoice')
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
                        <h2>Commercial Invoice</h2>
                        <button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive print-area font-12">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td colspan="2" rowspan="4">
                                            MRP Limited
                                            <br>
                                            114 Greams Road,Chennai -600 006,India
                                            <br>
                                            Tel:44 28292777
                                            <br>
                                            Email:mrfexpo@mrlmail.com
                                            <br>
                                            Corporate Identity Number:L25111TN1960PLC004306
                                        </td>
                                        <td>
                                            <small>Invoice No & Date</small>
                                            <br>
                                            4003000166 Dt:21.08.2017
                                        </td>
                                        <td>
                                            <small>Exporter & Ref</small>
                                            <br>
                                            20384757
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Buyer's Order No & Date</small>
                                            <br>
                                            209317010309
                                        </td>
                                        <td>
                                            <small>Quotation No</small>
                                            <br>
                                            20023805
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Other Reference(s)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Buyer(if other than consignee)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <small>Consignee</small>
                                            <br>
                                            MAGNUM ENTERPRISE LIMITED
                                            <br>
                                            531 DHAUR (KAMARPARA),TURAG,
                                            <br>
                                            DHAKA-1230
                                            <br>
                                            Bangladesh
                                            <br>
                                            <br>
                                            CUSTOMER CODE :500057
                                        </td>
                                        <td>
                                            <small>Country Of Origin Of Goods</small>
                                            <br>
                                            India
                                        </td>
                                        <td>
                                            <small>Country Of Final Destination</small>
                                            <br>
                                            Bangladesh
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Bl No & Date</small>
                                            <br>
                                            OL117699509 Dt.29.08.2017
                                        </td>
                                        <td>
                                            <small>Place Of Receipt By Pre-carrier</small>
                                            <br>
                                            KATTUPALLI PORT/CHENNAI
                                        </td>
                                        <td colspan="2" rowspan="3">
                                            <small>Terms Of Delivery and Payments</small>
                                            <br>
                                            LC At Sight
                                            <br>
                                            LC No.209317010309 Dt.10.08.2017
                                            <br>
                                            BANK- STATE BANK OF INDIA
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Vassel Flight No</small>
                                            <br>
                                            CHARLOTTE SCHULTE 1718
                                        </td>
                                        <td>
                                            <small>Port Of loading</small>
                                            <br>
                                            KATTUPALLI PORT/CHENNAI
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Port Of Discharge</small>
                                            <br>
                                            Chittagong
                                        </td>
                                        <td>
                                            <small>Final Destination</small>
                                            <br>
                                            Chittagong
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Container No</th>
                                        <th>No & Kind of Pkgs</th>
                                        <th>Description Of Goods</th>
                                        <th>Quantity In Each</th>
                                        <th>Unit Rate FOB USD</th>
                                        <th>Amount FOB USD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>125</td>
                                        <td>10.00-20M77 N 16(TYPTUFL)</td>
                                        <td class="text-right">290</td>
                                        <td class="text-right">170.00</td>
                                        <td class="text-right">49,300,00</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>125</td>
                                        <td>10.00-20M77 N 16(TYPTUFL)</td>
                                        <td class="text-right">290</td>
                                        <td class="text-right">170.00</td>
                                        <td class="text-right">49,300,00</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>125</td>
                                        <td>10.00-20M77 N 16(TYPTUFL)</td>
                                        <td class="text-right">290</td>
                                        <td class="text-right">170.00</td>
                                        <td class="text-right">49,300,00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" rowspan="3">Amount Changeable <br> (In Word)</td>
                                        <td class="text-right">Sub Total</td>
                                        <td class="text-right">125</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Add Freight</td>
                                        <td class="text-right">125</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Grand Total</td>
                                        <td class="text-right">125</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>BREAK-UP</th>
                                        <th>WEIGHT <small>(Kgs)</small></th>
                                        <th>Value <small>(USD)</small></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tyres</td>
                                        <td class="text-right">125</td>
                                        <td class="text-right">125</td>
                                    </tr>
                                    <tr>
                                        <td>Tubes</td>
                                        <td class="text-right">125</td>
                                        <td class="text-right">125</td>
                                    </tr>
                                    <tr>
                                        <td>Flaps</td>
                                        <td class="text-right">125</td>
                                        <td class="text-right">125</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Net Total</td>
                                        <td class="text-right">125</td>
                                        <td class="text-right">125</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Gross Total</td>
                                        <td class="text-right">125</td>
                                        <td class="text-right">125</td>
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