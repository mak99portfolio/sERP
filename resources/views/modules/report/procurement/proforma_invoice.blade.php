@extends('layout')
@section('title', 'proforma invoice')
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
                        <h2>Proforma Invoice</h2>
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
                                            <small>Performa Invoice No & Date</small>
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
                                            <br>
                                            <small>Email</small>
                                            abc@gmail.com
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
                                            POPULAR MOTORS
                                            <br>
                                            MISHATHNAGAR,TURAG
                                            <br>
                                            DHAKA-1771
                                            <br>
                                            Bangladesh
                                            <br>
                                            <br>
                                            CUSTOMER CODE :500053
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
                                            <small>PreCarriage By</small>
                                            <br>
                                            SEA
                                        </td>
                                        <td>
                                            <small>Place Of Receipt By Pre-carrier</small>
                                        </td>
                                        <td colspan="2" rowspan="3">
                                            <small>Terms Of Delivery and Payments</small>
                                            <br>
                                            FOB CHENNAI PORT
                                            <br>
                                            LC at Sight
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Vassel/Flight No</small>
                                            <br>
                                        </td>
                                        <td>
                                            <small>Port Of loading</small>
                                            <br>
                                            ANY PORT OF INDIA
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
                                <tbody>
                                    <tr>
                                        <td>Prices Quoted are Valid Upto</td>
                                        <td>31.07.2017</td>
                                    </tr>
                                    <tr>
                                        <td>Insurance</td>
                                        <td>Insurance Covered By buyer</td>
                                    </tr>
                                    <tr>
                                        <td>Freight</td>
                                        <td>Prepaid</td>
                                    </tr>
                                    <tr>
                                        <td>Shipment</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Shipping Agent</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Remarks</td>
                                        <td></td>
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