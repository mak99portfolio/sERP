@extends('layout')
@section('title', 'Quotation COMPARE')
@section('content')

<!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Quotation Compare</h2>
                            <a href="{{ route('quotation-compare.index') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> See Quotation Compare List</a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form class="form-horizontal form-label-left input_mask">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="">Select Vendor</label>
                                            <select name="vendor" id="" class="form-control input-sm select2">
                                                <option value="">One</option>
                                                <option value="">Two</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="">Select Requisition</label>
                                            <select name="vendor" id="" class="form-control input-sm select2">
                                                <option value="">One</option>
                                                <option value="">Two</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Product Name</th>
                                                    <th>UOM</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Price</th>
                                                    <th>Total</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Tyre</td>
                                                    <td>PCs</td>
                                                    <td><input type="text" class="form-control input-sm"></td>
                                                    <td><input type="text" class="form-control input-sm"></td>
                                                    <td class="text-right">400</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Oil</td>
                                                    <td>PCs</td>
                                                    <td><input type="text" class="form-control input-sm"></td>
                                                    <td><input type="text" class="form-control input-sm"></td>
                                                    <td class="text-right">400</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" class="text-right">Total</td>
                                                    <td class="text-right">125</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="">Delivery Date</label>
                                            <input type="date" class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <fieldset>
                                            <legend>Payments Terms</legend>
                                        </fieldset>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3">
                                            <div class="form-group">
                                                <label for="">Payment Type</label>
                                                <select name="payment_type" id="" class="form-control input-sm select2">
                                                    <option value="">One</option>
                                                    <option value="">two</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Discription</th>
                                                        <th>Amount</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td><input type="date" class="form-control input-sm"></td>
                                                        <td><input type="text" class="form-control input-sm"></td>
                                                        <td><input type="text" class="form-control input-sm"></td>
                                                        <td><button class="btn btn-primary btn-sm">ADD</button></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Payment Terms</th>
                                                        <th>Description</th>
                                                        <th>Amount</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>11-10-2018</td>
                                                        <td>Fixed</td>
                                                        <td>sample</td>
                                                        <td>1258</td>
                                                        <td class="text-center"><a href="" class="label label-danger"><i class="fa fa-close"></i></a></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <fieldset>
                                            <legend>Terms and Conditions</legend>
                                        </fieldset>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="">Terms and Condition type</label>
                                                <select name="terms_condition_type" id="" class="form-control input-sm select2">
                                                    <option value="">One</option>
                                                    <option value="">two</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="">Description</label>
                                                <textarea name="description" id="" cols="30" rows="2" class="form-control input-sm"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 m-t-25">
                                                <button class="btn btn-primary btn-sm">ADD</button>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Sl</th>
                                                        <th>Term & Condition</th>
                                                        <th>Description</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Warrenty Terms</td>
                                                        <td>Sample</td>
                                                        <td class="text-center"><a href="" class="label label-danger"><i class="fa fa-close"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Warrenty Terms</td>
                                                        <td>Sample</td>
                                                        <td class="text-center"><a href="" class="label label-danger"><i class="fa fa-close"></i></a></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <a href="" class="btn btn-success btn-sm">Save</a>
                                            <a href="" class="btn btn-default btn-sm">Cancel</a>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
@endsection
