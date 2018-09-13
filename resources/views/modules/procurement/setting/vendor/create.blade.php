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
                        <a href="{{route('vendor.index')}}" class="btn btn-sm btn-default btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> See Vendor Lists</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                    <form class="form-horizontal form-label-left" action="{{route('vendor.store')}}" method="POST">
                            @csrf 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Vendor Id</label>
                                    <input class="form-control input-sm" type="text" readonly name="vendor_id">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Status </label>
                                    <select class="form-control input-sm" name="status_id">
                                        <option value="" disabled selected>Select Requisition Type</option>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Vendor Name</label>
                                    <input class="form-control input-sm" type="text" name="name">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Establishment Date</label>
                                    <input class="form-control input-sm" type="date" name="">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control input-sm" rows="2" name=""></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input class="form-control input-sm" type="text" name="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Vendor Category</label>
                                    <select class="select form-control input-sm" name="">
                                        <option value="" disabled selected>Select Requisition Type</option>
                                        <option>Local</option>
                                        <option>Foreign</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <input class="form-control input-sm" type="text" name="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Tel. No.</label>
                                    <input class="form-control input-sm" type="tel" name="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Fax</label>
                                    <input class="form-control input-sm" type="text" name="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Web Site</label>
                                    <input class="form-control input-sm" type="text" name="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control input-sm" type="email" name="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>TIN Number</label>
                                    <input class="form-control input-sm" type="tel" name="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Trade License No</label>
                                    <input class="form-control input-sm" type="text" name="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Trade License Issue Date</label>
                                    <input class="form-control input-sm" type="text" name="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Certificate of Incorporation</label>
                                    <input class="form-control input-sm" type="text" name="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Incorporation Date</label>
                                    <input class="form-control input-sm" type="date" name="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>VAT No</label>
                                    <input class="form-control input-sm" type="text" name="">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
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
                                                                <input type="checkbox" name=""><i></i> Ltd. Company
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-3">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox" name=""><i></i> Partnership
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-3">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox" name=""><i></i> Proprietorship
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-3 col-xs-12">
                                                        <div class="col-sm-2">
                                                            <div class="checkbox">
                                                                <label class="i-checks">
                                                                    <input type="checkbox" name=""><i></i> Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control input-sm" type="text" name="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
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
                                                                <input type="checkbox" name=""><i></i> Manufacturer
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-3">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox" name=""><i></i> Trader
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-3">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox" name=""><i></i> Service Provide
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-3">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox" name=""><i></i> Contractor
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-3">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox" name=""><i></i> Agent/Distributor
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="col-sm-2">
                                                            <div class="checkbox">
                                                                <label class="i-checks">
                                                                    <input type="checkbox" name=""><i></i> Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control input-sm" type="text" name="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12  table-responsive">
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
                                                        <input class="form-control input-sm" type="text" name="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Credit Limit</label>
                                                        <input class="form-control input-sm" type="text" name="">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12  table-responsive">
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
                                                            <input type="text" class="form-control input-sm" name="">
                                                            <div class="input-group-addon">Day</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-4">
                                                    <div class="form-group">
                                                        <div class="col-sm-6 text-right">
                                                            <div class="checkbox">
                                                                <label class="i-checks">
                                                                    <input type="checkbox" name=""><i></i> Prompt payment discount
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 m-t-xs">
                                                            <input class="form-control input-sm" type="text" name="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <div class="col-sm-6 text-right">
                                                            <div class="checkbox">
                                                                <label class="i-checks">
                                                                    <input type="checkbox" name=""><i></i> Other discounts
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 m-t-xs">
                                                            <input class="form-control input-sm" type="text" name="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Specify Discount Terms</label>
                                                        <textarea class="form-control input-sm" rows="2" name=""></textarea>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12  table-responsive">
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
                                                        <input class="form-control input-sm" type="text" name="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>A/C Name</label>
                                                        <input class="form-control input-sm" type="text" name="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Bank</label>
                                                        <input class="form-control input-sm" type="text" name="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Branch</label>
                                                        <input class="form-control input-sm" type="text" name="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>SWIFT Code</label>
                                                        <input class="form-control input-sm" type="text" name="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Bank Address</label>
                                                        <textarea class="form-control input-sm" rows="2" name=""></textarea>
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
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Contact Name</label>
                                                                        <input class="form-control input-sm" type="text" name="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Designation</label>
                                                                        <input class="form-control input-sm" type="text" name="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Tel. No</label>
                                                                        <input class="form-control input-sm" type="tel" name="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>E-Mail</label>
                                                                        <input class="form-control input-sm" type="email" name="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Job Role</label>
                                                                        <input class="form-control input-sm" type="tel" name="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Coll No</label>
                                                                        <input class="form-control input-sm" type="email" name="">
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
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Contact Name</label>
                                                                        <input class="form-control input-sm" type="text" name="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Designation</label>
                                                                        <input class="form-control input-sm" type="text" name="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Tel. No</label>
                                                                        <input class="form-control input-sm" type="tel" name="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>E-Mail</label>
                                                                        <input class="form-control input-sm" type="email" name="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Job Role</label>
                                                                        <input class="form-control input-sm" type="tel" name="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Coll No</label>
                                                                        <input class="form-control input-sm" type="email" name="">
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
                                                                <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Enclosure Line</label>
                                                                        <select class="select form-control m-b input-sm" name="">
                                                                            <option value="" disabled selected>Select Product Line</option>
                                                                            <option>option1</option>
                                                                            <option>option2</option>
                                                                            <option>option3</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 text-center">
                                                                    <div class="form-group">
                                                                        <button type="button" class="btn btn-default btn-sm">Add to List</button>
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
                                                                                <input type="file" accept="image/png, image/jpeg" name=""/>
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
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
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
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <textarea class="form-control input-sm" rows="2"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                <br />

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Save</button>
                                <a class="btn btn-default" href="{{route('vendor.index')}}">Cancel</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection