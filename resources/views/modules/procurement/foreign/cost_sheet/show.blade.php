@extends('layout')
@section('title', 'Cost Sheet Details')
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
                        <h2>Cost Sheet Details</h2>
                        <div class="btn-group pull-right">
                            <button class="btn btn-sm btn-info print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                            <a href="{{route('cost-sheet.index')}}" class="btn btn-sm btn-success btn-addon"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Cost Sheet List</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive DivIdToPrint">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>L/C No</strong> 125</td>
                                        <td><strong>L/C Opening Date</strong> 125</td>
                                        <td><strong>Currency</strong> 125</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Bank Info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>A/C No :</strong> 125</td>
                                        <td><strong>A/C Name :</strong> 125</td>
                                        <td><strong>Branch Name :</strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Bank Name:</strong> 125</td>
                                        <td><strong></strong></td>
                                        <td><strong></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>L/C Amount:</strong> 125</td>
                                        <td><strong>Exchange Rate:</strong> 125</td>
                                        <td><strong>BDT Amount:</strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Description:</strong> 125</td>
                                        <td><strong></strong></td>
                                        <td><strong></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead class="bg-primary">
                                    <tr>
                                        <th colspan="5">Particulars</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Cost Particulars</th>
                                        <th>Percent (%)</th>
                                        <th>Amount</th>
                                        <th>Amt. in round Figure</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong></strong>125</td>
                                        <td><strong>LC Margin</strong></td>
                                        <td><strong></strong> 125</td>
                                        <td><strong></strong> 125</td>
                                        <td><strong></strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong></strong>125</td>
                                        <td><strong>LC Commision	</strong></td>
                                        <td><strong></strong> 125</td>
                                        <td><strong></strong> 125</td>
                                        <td><strong></strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong></strong>125</td>
                                        <td><strong>VAT</strong></td>
                                        <td><strong></strong> 125</td>
                                        <td><strong></strong> 125</td>
                                        <td><strong></strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong></strong>125</td>
                                        <td><strong>SWIFT</strong></td>
                                        <td><strong></strong> 125</td>
                                        <td><strong></strong> 125</td>
                                        <td><strong></strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong></strong>125</td>
                                        <td><strong>Stamp Charge</strong></td>
                                        <td><strong></strong> 125</td>
                                        <td><strong></strong> 125</td>
                                        <td><strong></strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong></strong>125</td>
                                        <td><strong>LCAF Issue Charge</strong></td>
                                        <td><strong></strong> 125</td>
                                        <td><strong></strong> 125</td>
                                        <td><strong></strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong></strong>125</td>
                                        <td><strong>IMP</strong></td>
                                        <td><strong></strong> 125</td>
                                        <td><strong></strong> 125</td>
                                        <td><strong></strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong></strong>125</td>
                                        <td><strong>LC Application Form</strong></td>
                                        <td><strong></strong> 125</td>
                                        <td><strong></strong> 125</td>
                                        <td><strong></strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong></strong>125</td>
                                        <td><strong>Other Charge(If any)</strong></td>
                                        <td><strong></strong> 125</td>
                                        <td><strong></strong> 125</td>
                                        <td><strong></strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Total</strong></td>
                                        <td><strong></strong> 125</td>
                                        <td><strong></strong> 125</td>
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