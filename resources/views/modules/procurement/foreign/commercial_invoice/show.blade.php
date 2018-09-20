@extends('layout')
@section('title', 'Commercial Invoice Details')
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
                        <h2>Commercial Invoice Details</h2>
                        <div class="btn-group pull-right">
                            <button class="btn btn-sm btn-info print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                            <a href="{{route('commercial-invoice.index')}}" class="btn btn-sm btn-success btn-addon"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Commercial Invoice List</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive DivIdToPrint">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Commercial Invoice No :</strong> 125</td>
                                        <td><strong>Date:</strong> 125</td>
                                        <td><strong>LC No :</strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>LC Date :</strong> 125</td>
                                        <td><strong></strong></td>
                                        <td><strong></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Beneficiary Bank info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>A/C No :</strong> 125</td>
                                        <td><strong>A/C Name :</strong> 125</td>
                                        <td><strong>Branch Name :</strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Bank Address</strong> 125</td>
                                        <td><strong></strong></td>
                                        <td><strong></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Bl No:</strong> 125</td>
                                        <td><strong>Bl Date :</strong> 125</td>
                                        <td><strong>Vessel No / Flight No :</strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Container No:</strong> 125</td>
                                        <td><strong></strong></td>
                                        <td><strong></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Table of Terms and Conditions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Port of Loading :</strong> 125</td>
                                        <td><strong>Port of Discharge :</strong> 125</td>
                                        <td><strong>Country of Final Destination :</strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Final Destination :</strong> 125</td>
                                        <td><strong>Country of Origin of Goods :</strong> 125</td>
                                        <td><strong></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Notes:</strong> 125</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">CI Product table :</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Sl No:</strong> 125</td>
                                        <td><strong>Product Name:</strong> 125</td>
                                        <td><strong>Qnantity:</strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Unit Price Used ($)	:</strong> 125</td>
                                        <td><strong>Amoiunt ($) :</strong> 125</td>
                                        <td><strong>Sub Total :</strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Add Fright :</strong> 125</td>
                                        <td><strong>Grand Total :</strong> 125</td>
                                        <td><strong>Amount In word :</strong> 125</td>
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