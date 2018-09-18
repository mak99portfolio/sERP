@extends('layout')
@section('title', 'Commercial Invoice')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Procurement</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        {{-- Content here --}}
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Commercial Invoice</h2>
                        <a href="{{route('commercial-invoice.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> See Commercial Invoice List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left input_mask">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Commercial Invoice No</label>
                                        <input type="text" class="form-control" name="commercial_invoice_no">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Date</label>
                                        <input type="date" class="form-control" name="commercial_invoice_date">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">LC No</label>
                                        <input type="text" class="form-control" name="lc_no">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">LC Date</label>
                                        <input type="date" class="form-control" name="lc_date">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default m-t-15">
                                        <div class="panel-heading">Benefeciary Bank Info</div>
                                        <div class="panel-body">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Account No</label>
                                                    <input type="text" class="form-control" name="benefeciary_account_no">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Account Name</label>
                                                    <input type="text" class="form-control" name="benefeciary_account_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Bank Name</label>
                                                    <input type="text" class="form-control" name="benefeciary_bank_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Bank Address</label>
                                                    <textarea name="benefeciary_bank_address" class="form-control" id="" cols="30" rows="1"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Bl No</label>
                                        <input type="text" class="form-control" name="bl_no">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Bl Date</label>
                                        <input type="date" class="form-control" name="bl_date">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Vessel No / Flight No</label>
                                        <input type="text" class="form-control" name="vessel_no">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Container No</label>
                                        <input type="text" class="form-control" name="container_no">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <fieldset class="m-t-20">
                                        <legend>Table of Terms and Conditions:</legend>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Port of Loading</label>
                                                    <select name="port_of_loading" class="form-control">
                                                        <option selected>--Select Port--</option>
                                                        <option value="dhaka">Dhaka Port</option>
                                                        <option value="Rangpur">Rangpur Port</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Port of Discharge</label>
                                                    <select name="port_of_discharge" class="form-control">
                                                        <option selected>--Select Port--</option>
                                                        <option value="dhaka">Dhaka Port</option>
                                                        <option value="Rangpur">Rangpur Port</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Country of Final Destination</label>
                                                    <select name="country_of_final_destination" class="form-control">
                                                        <option selected>--Select Port--</option>
                                                        <option value="dhaka">Dhaka Port</option>
                                                        <option value="Rangpur">Rangpur Port</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Final Destination</label>
                                                    <select name="final_destination" class="form-control">
                                                        <option selected>--Select Port--</option>
                                                        <option value="dhaka">Dhaka Port</option>
                                                        <option value="Rangpur">Rangpur Port</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Country of Origin of Goods</label>
                                                    <select name="Country_of_Origin_of_Goods" class="form-control">
                                                        <option selected>--Select Port--</option>
                                                        <option value="dhaka">Dhaka Port</option>
                                                        <option value="Rangpur">Rangpur Port</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Notes</label>
                                        <textarea name="notes" class="form-control" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th colspan="5">CI Product table</th>
                                                </tr>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Product Name</th>
                                                    <th>Qnantity</th>
                                                    <th>Unit Price Used ($)</th>
                                                    <th>Amoiunt ($)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>1</th>
                                                    <td>sas</td>
                                                    <td>5</td>
                                                    <td>80</td>
                                                    <td>
                                                        <input type="text" name="amount" class="form-control input-sm">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-right">Sub Total =</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-right">Add Fright =</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-right">Grand Total =</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-right">Amount In word =</td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <a href="#" class="btn btn-success btn-sm">Submit</a>
                                        <a href="{{route('commercial-invoice.index')}}" class="btn btn-default btn-sm">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{--end Content here --}}
    </div>
</div>
@endsection