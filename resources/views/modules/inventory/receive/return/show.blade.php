@extends('layout')
@section('title', 'Foreign Purchase Order Details')
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
                        <h2>Internal Receive Details</h2>
                        <div class="btn-group pull-right">
                            <button class="btn btn-sm btn-info print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                            <a href="{{route('purchase-order.index')}}" class="btn btn-sm btn-success btn-addon"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Back</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive DivIdToPrint">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td colspan="3">Internal Receive</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Receive No:</strong> 123</td>
                                        <td><strong>Working Unit:</strong> 123</td>
                                        <td><strong>Date:</strong> 123</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Requisition No:</strong> 123</td>
                                        <td><strong>Challan No:</strong>123</td>
                                        <td><strong>Receive From:</strong>132</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Product Status:</strong> 123</td>
                                        <td><strong>Product Pattern:</strong>123</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Remarks:</strong> 123</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td colspan="7">Product List</td>
                                    </tr>
                                    <tr>
                                        <td>#</td>
                                        <td>HS Code</td>
                                        <td>Item name</td>
                                        <td>Requisition Quantity</td>
                                        <td>Issue Quantity</td>
                                        <td>Return Quantity</td>
                                        <td>Return Status</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01</td>
                                        <td>255</td>
                                        <td>Name</td>
                                        <td>454</td>
                                        <td>455</td>
                                        <td>45</td>
                                        <td>Active</td>
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