@extends('layout')
@section('title', 'Vendor')
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
                        <h2>Vendor</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Vendor Id</label>
                                    <input class="form-control input-sm" type="text" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Status </label>
                                    <select class="form-control input-sm">
                                        <option value="" disabled selected>Select Requisition Type</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Vendor Name</label>
                                    <input class="form-control input-sm" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Establishment Date</label>
                                    <input class="form-control input-sm" type="date">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control input-sm" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input class="form-control input-sm" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Vendor Category</label>
                                    <select class="select form-control input-sm">
                                        <option value="" disabled selected>Select Requisition Type</option>
                                        <option>Local</option>
                                        <option>Foreign</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <input class="form-control input-sm" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Tel. No.</label>
                                    <input class="form-control input-sm" type="tel">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Fax</label>
                                    <input class="form-control input-sm" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Web Site</label>
                                    <input class="form-control input-sm" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control input-sm" type="email">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>TIN Number</label>
                                    <input class="form-control input-sm" type="tel">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Trade License No</label>
                                    <input class="form-control input-sm" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Trade License Issue Date</label>
                                    <input class="form-control input-sm" type="date">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Certificate of Incorporation</label>
                                    <input class="form-control input-sm" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Incorporation Date</label>
                                    <input class="form-control input-sm" type="date">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>VAT No</label>
                                    <input class="form-control input-sm" type="text">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Type of Business</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group pull-in clearfix">
                                                    <div class="col-md-2 col-sm-3">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox"><i></i> Ltd. Company
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-3">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox"><i></i> Partnership
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-3">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox"><i></i> Proprietorship
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-3 col-xs-12">
                                                        <div class="col-sm-2">
                                                            <div class="checkbox">
                                                                <label class="i-checks">
                                                                    <input type="checkbox"><i></i> Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control input-sm" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nature of Business</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group pull-in clearfix">
                                                    <div class="col-md-2 col-sm-3">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox"><i></i> Manufacturer
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-3">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox"><i></i> Trader
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-3">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox"><i></i> Service Provide
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-3">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox"><i></i> Contractor
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-3">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox"><i></i> Agent/Distributor
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="col-sm-2">
                                                            <div class="checkbox">
                                                                <label class="i-checks">
                                                                    <input type="checkbox"><i></i> Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control input-sm" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Credit Information</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Credit Period</label>
                                                        <input class="form-control input-sm" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Credit Limit</label>
                                                        <input class="form-control input-sm" type="text">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Acceptance of payment terms and other discounts (if applicable)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="col-md-2 col-sm-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><strong>Net</strong></div>
                                                            <input type="text" class="form-control input-sm">
                                                            <div class="input-group-addon">Day</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-4">
                                                    <div class="form-group">
                                                        <div class="col-sm-6 text-right">
                                                            <div class="checkbox">
                                                                <label class="i-checks">
                                                                    <input type="checkbox"><i></i> Prompt payment discount
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 m-t-xs">
                                                            <input class="form-control input-sm" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <div class="col-sm-6 text-right">
                                                            <div class="checkbox">
                                                                <label class="i-checks">
                                                                    <input type="checkbox"><i></i> Other discounts
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 m-t-xs">
                                                            <input class="form-control input-sm" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Specify Discount Terms</label>
                                                        <textarea class="form-control input-sm" rows="2"></textarea>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Bank Information</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>A/C No</label>
                                                        <input class="form-control input-sm" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>A/C Name</label>
                                                        <input class="form-control input-sm" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Bank</label>
                                                        <input class="form-control input-sm" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Branch</label>
                                                        <input class="form-control input-sm" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>SWIFT Code</label>
                                                        <input class="form-control input-sm" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Bank Address</label>
                                                        <textarea class="form-control input-sm" rows="2"></textarea>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->


<div class="right_col" role="main">
    <div style="">
        <div class="page-title">
            <div class="title_left">
                <h3>Vendor</h3>
            </div>
        </div>
        <div class="x_content">
            <hr />
            <form class="form-horizontal form-label-left">


                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Contact Person Information</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Contact Person-1</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group pull-in clearfix">
                                                    <div class="col-sm-6">
                                                        <label>Contact Name</label>
                                                        <input class="form-control input-sm" type="text">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Designation</label>
                                                        <input class="form-control input-sm" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group pull-in clearfix">
                                                    <div class="col-sm-6">
                                                        <label>Tel. No</label>
                                                        <input class="form-control input-sm" type="tel">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>E-Mail</label>
                                                        <input class="form-control input-sm" type="email">
                                                    </div>
                                                </div>
                                                <div class="form-group pull-in clearfix">
                                                    <div class="col-sm-6">
                                                        <label>Job Role</label>
                                                        <input class="form-control input-sm" type="tel">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Coll No</label>
                                                        <input class="form-control input-sm" type="email">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Contact Person-2</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group pull-in clearfix">
                                                    <div class="col-sm-6">
                                                        <label>Contact Name</label>
                                                        <input class="form-control input-sm" type="text">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Designation</label>
                                                        <input class="form-control input-sm" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group pull-in clearfix">
                                                    <div class="col-sm-6">
                                                        <label>Tel. No</label>
                                                        <input class="form-control input-sm" type="tel">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>E-Mail</label>
                                                        <input class="form-control input-sm" type="email">
                                                    </div>
                                                </div>
                                                <div class="form-group pull-in clearfix">
                                                    <div class="col-sm-6">
                                                        <label>Job Role</label>
                                                        <input class="form-control input-sm" type="tel">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Coll No</label>
                                                        <input class="form-control input-sm" type="email">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Enclosures Information</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group pull-in clearfix">
                                                    <div class="col-sm-offset-3 col-sm-6">
                                                        <label>Enclosure Line</label>
                                                        <select class="select form-control m-b input-sm" style="width: 100%">
                                                            <option value="" disabled selected>Select Product Line</option>
                                                            <option>option1</option>
                                                            <option>option2</option>
                                                            <option>option3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group pull-in clearfix">
                                                    <div class="col-sm-6 col-md-offset-3 text-center">
                                                        <button type="button" class="btn btn-success">Add to List</button>
                                                    </div>
                                                </div>
                                                <!-- /end save -->
                                                <table class="table table-bordered">
                                                    <thead>
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
                                                            <td>01</td>
                                                            <td>Trade License</td>
                                                            <td>
                                                                <input type="file" accept="image/png, image/jpeg" />
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="4">Product LIst</th>
                        </tr>
                        <tr>
                            <th>#SL</th>
                            <th>Item Name</th>
                            <th>CI Quantity</th>
                            <th>PO Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td>ABC</td>
                            <td>09</td>
                            <td>04</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">Total:</td>
                            <td>09</td>
                            <td>04</td>
                        </tr>
                    </tfoot>
                </table>
                <div class="form-group pull-in clearfix m-t-n-sm">
                    <div class="col-sm-12">
                        <label>Remarks</label>
                        <textarea class="form-control input-sm" rows="2"></textarea>
                    </div>
                </div>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection