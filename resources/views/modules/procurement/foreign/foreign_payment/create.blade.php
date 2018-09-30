@extends('layout')
@section('title', 'Foreign Payment')
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
                        <h2>Foreign Payment</h2>
                        <a href="{{route('foreign-payment.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-eye" aria-hidden="true"></i> List Foreign Payment</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="form-horizontal form-label-left input_mask" autocomplete="off">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Payment Id</label>
                                    <input type="text" class="form-control input-sm" name="payment_id">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Payment Date</label>
                                    <input type="date" class="form-control input-sm datepicker" name="payment_date">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Select Vendor Type</label>
                                    <select name="select_vendor_type" id="" class="form-control input-sm select2">
                                        <option value="">One</option>
                                        <option value="">Two</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Select Vendor</label>
                                    <select name="select_vendor" id="" class="form-control input-sm select2">
                                        <option value="">One</option>
                                        <option value="">Two</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">CI No</label>
                                    <select name="ci_no" id="" class="form-control input-sm select2">
                                        <option value="">LC</option>
                                        <option value="">PO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm m-t-25" type="button">Add</button>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <fieldset class="m-t-20">
                                    <legend>Payment Type</legend>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Insurance
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                            <label class="form-check-labe2" for="exampleRadios2">
                                                L/C Charge
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option2">
                                            <label class="form-check-labe3" for="exampleRadios3">
                                                L/C Retirement
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="option2">
                                            <label class="form-check-labe4" for="exampleRadios4">
                                                C&F Express
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <fieldset class="m-t-20">
                                    <legend>Insurance</legend>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row">Insurance</td>
                                                    <td><input type="text" class="form-control input-sm" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Sub Total=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Total Discount=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Total Vat=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Grand Total=</td>
                                                    <td>125</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <fieldset class="m-t-20">
                                    <legend>L/C Charge</legend>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row">l/C Name</td>
                                                    <td><input type="text" class="form-control input-sm" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Sub Total=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Total Discount=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Total Vat=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Grand Total=</td>
                                                    <td>125</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <fieldset class="m-t-20">
                                    <legend>L/C Retirment</legend>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row">Retirment</td>
                                                    <td><input type="text" class="form-control input-sm"></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">Remitance</td>
                                                    <td><input type="text" class="form-control input-sm"></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">D/H Charge</td>
                                                    <td><input type="text" class="form-control input-sm"></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Sub Total=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Total Discount=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Total Vat=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Grand Total=</td>
                                                    <td>125</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <fieldset class="m-t-20">
                                    <legend>C/F Express</legend>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row">C/F Name</td>
                                                    <td><input type="text" class="form-control input-sm" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Sub Total=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Total Discount=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Total Vat=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Grand Total=</td>
                                                    <td>125</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <fieldset class="m-t-20">
                                    <legend>Transport Charge</legend>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row">Transport name</td>
                                                    <td><input type="text" class="form-control input-sm" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Sub Total=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Total Discount=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Total Vat=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Grand Total=</td>
                                                    <td>125</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <a href="" class="btn btn-success btn-sm">Submit</a>
                                    <a href="" class="btn btn-default btn-sm">Cancel</a>
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
