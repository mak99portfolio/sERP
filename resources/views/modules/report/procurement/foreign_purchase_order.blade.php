@extends('layout')
@section('title', 'foreign purchase order')
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
                        <h2>Foreign Purchase Order</h2>
                        <button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive print-area font-12">
                            <table class="">
                                <tbody>
                                    <tr>
                                        <td class="p-5"><strong>June 15,2018</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Ref No : ME/TYRE/07/2017</td>
                                    </tr>
                                    <tr>
                                        <td>MRF Limited</td>
                                    </tr>
                                    <tr>
                                        <td>124,Greams Road</td>
                                    </tr>
                                    <tr>
                                        <td>Chennai 600006,India</td>
                                    </tr>
                                    <tr>
                                        <td>Attn:Mr Rohit Kr. Mandal (RM - Bangladesh)</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Subect: <u>MRP Tyre Purchases Order For July 2017</u></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Dear Sir,</td>
                                    </tr>
                                    <tr>
                                        <td>We are pleased to submit our purchases order fo July 2017 as below:7</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="text-center">#</td>
                                        <td class="text-center">PRODUCT -DESC</td>
                                        <td class="text-center">QTY</td>
                                        <td class="text-center">UOM</td>
                                        <td class="text-center">Remark</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>12.00-20 SUPERLUG78 N18</td>
                                        <td class="text-center">0</td>
                                        <td>Set</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>12.00-20 SUPERLUG78 N18</td>
                                        <td class="text-center">0</td>
                                        <td>Set</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>12.00-20 SUPERLUG78 N18</td>
                                        <td class="text-center">0</td>
                                        <td>Set</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-right">Total</td>
                                        <td class="text-center">125</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p>NOTE: </p>
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