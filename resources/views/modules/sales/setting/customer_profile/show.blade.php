@extends('layout')
@section('title', 'Customer Profile Details')
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
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-4 hidden-xs"><h2 class="text-center">Customer Name: </h2></div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        </div>
                        <div class="visible-xs col-xs-6"><button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</button></div>
                        <div class="visible-xs col-xs-6"><button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button></div>
                        <div class="visible-xs col-xs-12"><h2 class="text-center">Customer Name : </h2></div>
                    </div>
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive print-area">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3" class="text-center">Customer Profile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Customer Name:</strong> 3123</td>
                                        <td><strong>Customer Type:</strong> 3123</td>
                                        <td><strong>Status:</strong>3123</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Establishment:</strong> 3123</td>
                                        <td><strong>Customer Zone:</strong> 3123</td>
                                        <td><strong>Contact No:</strong>3123</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Fax:</strong> 3123</td>
                                        <td><strong>Website:</strong> 3123</td>
                                        <td><strong>Email:</strong>3123</td>
                                    </tr>
                                    <tr>
                                        <td><strong>TIN Number:</strong> 3123</td>
                                        <td><strong>Trade License No:</strong> 3123</td>
                                        <td><strong>Trade License Issue Date:</strong>3123</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Certificate Of Incorporation:</strong> 3123</td>
                                        <td><strong>Incorporation Date:</strong> 3123</td>
                                        <td><strong>Vat No:</strong>3123</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Address :</strong> 3123</td>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Type Of Business</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>LTD company</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="2">Bank Information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="2"><strong>Bank-1</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>A/C no</strong> 2134</td>
                                        <td><strong>A/C Name</strong> 2134</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Bank Name</strong> 2134</td>
                                        <td><strong>Branch</strong> 2134</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Swift Code</strong> 2134</td>
                                        <td><strong>Bank Address</strong> 2134</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="2">Contact Person Information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="2"><strong>Contact Person-1</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Contact Name</strong> 2134</td>
                                        <td><strong>Designation</strong> 2134</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Contact No</strong> 2134</td>
                                        <td><strong>Email</strong> 2134</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Job Role</strong> 2134</td>
                                        <td><strong>Tell No</strong> 2134</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Cell No</strong> 2134</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Enclosures Information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">01</td>
                                        <td>Enclosure 1</td>
                                        <td><a href="#" title="Download Attachment" target="_blank">Attachment name</a></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Notes:</strong> 2342</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--start approved by-->
                            <table id="print-footer" style="margin-top: 200px; width: 100%; display: none;">
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
