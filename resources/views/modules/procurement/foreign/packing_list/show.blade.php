@extends('layout')
@section('title', 'Packing List Details')
@section('content')
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
                        <h2>Packing List Details</h2>
                        <div class="btn-group pull-right">
                            <button class="btn btn-sm btn-info print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                            <a href="{{route('packing-list.index')}}" class="btn btn-sm btn-success btn-addon"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Packing List</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive DivIdToPrint">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Commercial Invoice No:</strong> 125</td>
                                        <td><strong>Date:</strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>LC No:</strong> 125</td>
                                        <td><strong>LC Date:</strong> 125</td>
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
                                        <td colspan="3"><strong>Bank Address:</strong> 125</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Bl No:</strong> 125</td>
                                        <td><strong>Bl Date:</strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Vessel No / Flight No:</strong> 125</td>
                                        <td><strong>Container No:</strong> 125</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Table of Terms and Conditions:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Port of Loading:</strong> 125</td>
                                        <td><strong>Port of Discharge:</strong> 125</td>
                                        <td><strong>Country of Final Destination:</strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Final Destination:</strong> 125</td>
                                        <td><strong>Country of Origin of Goods:</strong> 125</td>
                                        <td><strong>Exporter:</strong>125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Currency:</strong> 125</td>
                                        <td><strong>Customer Code:</strong> 125</td>
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
                                        <th colspan="5">Packing List table:</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Per Unit Weight	</th>
                                        <th>Total Weight</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>abc</td>
                                        <td>1</td>
                                        <td>5</td>
                                        <td>125</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right">Net Total =</td>
                                        <td>125</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right">Gross Total =</td>
                                        <td>125</td>
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
@endsection