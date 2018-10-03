@extends('layout')
@section('title', 'Foreign Payment Details')
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
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-4 hidden-xs"><h2 class="text-center">Payment Id :</h2></div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        </div>
                        <div class="visible-xs col-xs-6"><button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</button></div>
                        <div class="visible-xs col-xs-6"><button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button></div>
                        <div class="visible-xs col-xs-12"><h2 class="text-center">Payment Id :</h2></div>
                    </div>
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive print-area font-12">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Payment Id:</strong> 125</td>
                                        <td><strong>Payment Date:</strong> 125</td>
                                        <td><strong>Select Vendor Type:</strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Vendor Type:</strong> 125</td>
                                        <td><strong>Vendor:</strong> 125</td>
                                        <td><strong>Payment By:</strong> 123</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Payment By No:</strong> 125</td>
                                        <td><strong>Payment Type:</strong> 125</td>
                                        <td><strong>Due Amount:</strong> 123</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Payment Amount:</strong> 125</td>
                                        <td><strong>Discount Amount:</strong> 125</td>
                                        <td><strong>Vat(%):</strong> 123</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Note:</strong> 125</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--start approved by-->
                            <table id="print-footer" style="position: absolute; bottom: 20px; width: 100%; display: none;">
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