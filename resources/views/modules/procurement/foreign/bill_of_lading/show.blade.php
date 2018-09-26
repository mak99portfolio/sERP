@extends('layout')
@section('title', 'Bill of Lading List Details')
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
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <a href="{{route('bill-of-lading.index')}}" class="btn btn-sm btn-default pull-left"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</a>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <h2 class="text-center">Bill of Lading List Details</h2>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <button class="btn btn-sm btn-info print-btn pull-right" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive DivIdToPrint">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>BL No :</strong>125</td>
                                        <td><strong>BL Date :</strong>125</td>
                                        
                                    </tr>
                                    <tr>
                                        <td><strong>LC No :</strong>125</td>
                                        <td><strong>LC Date :</strong>125</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Commercial Invoice List</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Commercial Invoice No</th>
                                        <th>Commercial Invoice Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>125</td>
                                        <td>125</td>
                                        <td>125</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Product List</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th class="text-right">Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>125</td>
                                        <td>125</td>
                                        <td class="text-right">125</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" class="text-right">Total Quantity =</td>
                                        <td class="text-right">125</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Container No :</strong>125</td>
                                        <td><strong>Container Size :</strong>125</td>
                                        <td><strong>Number Of Box :</strong>125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Shipping Agency Name :</strong>125</td>
                                        <td><strong>Shipping Agency Address :</strong>125</td>
                                        <td><strong>Local Agency Name :</strong>125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Local Agency Address :</strong>125</td>
                                        <td><strong>Exproter:</strong>125</td>
                                        <td><strong>Consignee:</strong>125</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">LC Issue Bank</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>A/C No:</strong>125</td>
                                        <td><strong>A/C Name :</strong>125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Branch Name :</strong>125</td>
                                        <td><strong>Bank Name :</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Acceptance:</strong>125</td>
                                        <td><strong>Port Of Loading :</strong>125</td>
                                        <td><strong>Port Of Dischrge :</strong>125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Place Of Delivery :</strong>125</td>
                                        <td><strong>Voyage No :</strong>125</td>
                                        <td><strong>Place of Transhipment :</strong>125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Modes Of Transport :</strong>125</td>
                                        <td><strong>Move Type :</strong>125</td>
                                        <td><strong>Issue Place :</strong>125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Number Of MTD :</strong>125</td>
                                        <td><strong>Packaging Qty :</strong>125</td>
                                        <td><strong>Gross Weight :</strong>125</td>
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