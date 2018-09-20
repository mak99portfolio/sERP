@extends('layout')
@section('title', 'Letterc of Credit Details')
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
                        <h2>Letter of Credit Details</h2>
                        <div class="btn-group pull-right">
                            <button class="btn btn-sm btn-info print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                            <a href="{{route('letter-of-credit.index')}}" class="btn btn-sm btn-success btn-addon"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;LC List</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive DivIdToPrint">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>LC No:</strong> 125</td>
                                        <td><strong>LC Date :</strong> 125</td>
                                        <td><strong>LC Value :</strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Vendor:</strong> 125</td>
                                        <td><strong>LC Expire Date:</strong> 125</td>
                                        <td><strong>LC Status :</strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>LC Shipment Date :</strong> 125</td>
                                        <td><strong>Currency :</strong> 125</td>
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
                                        <td><strong>Bank Address:</strong> 125</td>
                                        <td><strong></strong></td>
                                        <td><strong></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Issue Bank info</th>
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
                                <thead>
                                    <tr>
                                        <th colspan="3">LCA Information :</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>LCA No :</strong> 125</td>
                                        <td><strong>SL No:</strong> 125</td>
                                        <td><strong>LCA No:</strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Update:</strong> 125</td>
                                        <td><strong>Delete:</strong> 125</td>
                                        <td><strong></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Partial Shipment :</strong> 125</td>
                                        <td><strong>Transhipment Information :</strong> 125</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">LCA Information :</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>LCA No :</strong> 125</td>
                                        <td><strong>SL No:</strong> 125</td>
                                        <td><strong>PI No:</strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Delete:</strong> 125</td>
                                        <td><strong></strong></td>
                                        <td><strong></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">LC Table:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>SL NO:</strong> 125</td>
                                        <td><strong>H.S. CODE:</strong> 125</td>
                                        <td><strong>Product Name:</strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>UOM:</strong> 125</td>
                                        <td><strong>Quantity:</strong> 125</td>
                                        <td><strong>:</strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Unit Price:</strong> 125</td>
                                        <td><strong>Sub Total:</strong> 125</td>
                                        <td><strong>Discount:</strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>D.Rate:</strong> 125</td>
                                        <td><strong>Vat(%) :</strong> 125</td>
                                        <td><strong></strong></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!--start approved by-->
                            <table id="print-footer" style="margin-top: 40px; width: 100%; display: none;">
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