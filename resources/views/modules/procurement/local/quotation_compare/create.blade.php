@extends('layout')
@section('title', 'Quotation Compare')
@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Quotation Compare</h2>
                    <a href="{{ route('quotation-compare.index') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> Quotation Compare List</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left input_mask">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Date Range Picker</label>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                            <input type="text" name="reservation" id="reservation" class="form-control input-sm" value="01/01/2018 - 01/25/2018" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Requisition No</label>
                                    <select name="vendor" id="" class="form-control input-sm select2">
                                        <option value="">One</option>
                                        <option value="">Two</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive m-t-15">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="25">#</th>
                                                <th>Product Name</th>
                                                <th>Vendor-01</th>
                                                <th>Vendor-02</th>
                                                <th>Vendor-03</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>Tyre</td>
                                                <td>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" class="flat" name="iCheck"> 422
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" class="flat" name="iCheck"> 221
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" class="flat" name="iCheck"> 734
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Total</td>
                                                <td class="text-right">125</td>
                                                <td class="text-right">125</td>
                                                <td class="text-right">125</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <a href="" class="btn btn-success btn-sm">Approve</a>
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
