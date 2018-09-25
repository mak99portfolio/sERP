@extends('layout')
@section('title', 'Vendor List Details')
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
                        <h2>Vendor List Details</h2>
                        <div class="btn-group pull-right">
                            <button class="btn btn-sm btn-info print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                            <a href="{{route('vendor.index')}}" class="btn btn-sm btn-success btn-addon"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Vendor List</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive DivIdToPrint">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Vendor Id :</strong> 125</td>
                                        <td><strong>Vendor Name :</strong> 125</td>
                                        <td><strong>Status:</strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Establishment Date :</strong> 125</td>
                                        <td><strong>Country:</strong> 125</td>
                                        <td><strong>Vendor Category:</strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Zip Code:</strong> 125</td>
                                        <td><strong>Tel. No. :</strong> 125</td>
                                        <td><strong>Fax:</strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Web Site :</strong> 125</td>
                                        <td><strong>Email:</strong> 125</td>
                                        <td><strong>TIN Number :</strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Trade License No :</strong> 125</td>
                                        <td><strong>Trade License Issue Date:</strong> 125</td>
                                        <td><strong>Certificate of Incorporation :</strong> 125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Incorporation Date :</strong> 125</td>
                                        <td><strong>VAT No:</strong> 125</td>
                                        <td><strong></strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Address:</strong> 125</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="4">Type of Business</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Ltd. Company:</strong>125</td>
                                        <td><strong>Partnership:</strong>125</td>
                                        <td><strong>Proprietorship:</strong>125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Other:</strong></td>
                                        <td><strong></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="4">Nature of Business</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Manufacturer:</strong>125</td>
                                        <td><strong>Trader:</strong>125</td>
                                        <td><strong>Service Provide:</strong>125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Contractor:</strong>125</td>
                                        <td><strong>Agent/Distributor:</strong>125</td>
                                        <td><strong>Other:</strong>125</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Credit Information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Credit Period :</strong>125</td>
                                        <td><strong>Credit Limit :</strong>125</td>
                                        <td><strong></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Acceptance of payment terms and other discounts (if applicable)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Net Day:</strong>125</td>
                                        <td><strong>Prompt payment discount :</strong>125</td>
                                        <td><strong>Other Discounts:</strong>125</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Specify Discount Terms :</strong>125</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Bank Information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>A/C No:</strong>125</td>
                                        <td><strong>A/C Name :</strong>125</td>
                                        <td><strong>Bank:</strong>125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Branch:</strong>125</td>
                                        <td><strong>SWIFT Code :</strong>125</td>
                                        <td><strong></strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Bank Address :</strong>125</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Contact Person Information</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">Person-1</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Contact Name :</strong>125</td>
                                        <td><strong>Designation:</strong>125</td>
                                        <td><strong>Tel.No :</strong>125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>E-Mail :</strong>125</td>
                                        <td><strong>Job Role :</strong>125</td>
                                        <td><strong>Cell No :</strong>125</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Enclosures Information</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">Enclosure LIst</th>
                                    </tr>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Enclosure Name</th>
                                        <th>Attachment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong></strong>125</td>
                                        <td><strong></strong>125</td>
                                        <td><strong></strong>125</td>
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