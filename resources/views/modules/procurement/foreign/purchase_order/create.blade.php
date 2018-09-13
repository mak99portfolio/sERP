@extends('layout')
@section('title', 'Purchase order')
@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Procrument</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Purchase Order</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Requisition No.</label>
                                    <input class="form-control input-sm" type="text" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Requisition date</label>
                                    <input class="form-control input-sm" type="text" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Purchase Order No.</label>
                                    <input class="form-control input-sm" type="text" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Purchase Order date</label>
                                    <input class="form-control input-sm" type="text" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Vendor </label>
                                    <select class="form-control input-sm">
                                        <option value="" disabled selected> Select Vendor</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12  table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Table of Terms and Conditions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Port of Loading </label>
                                        <select class="form-control input-sm">
                                            <option value="" disabled selected> Select port of loading</option>
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Port of Discharge </label>
                                        <select class="form-control input-sm">
                                            <option value="" disabled selected>Select port of discharge </option>
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Country of Final Destination </label>
                                        <select class="form-control input-sm">
                                            <option value="" disabled selected>Select country of final destination </option>
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label> Final Destination </label>
                                        <select class="form-control input-sm">
                                            <option value="" disabled selected>Select  final destination </option>
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label> Country of Origin of Goods </label>
                                        <select class="form-control input-sm">
                                            <option value="" disabled selected>Select country of origin of goods </option>
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Shipment Allow  </label>
                                        <select class="form-control input-sm">
                                            <option value="" disabled selected>Select shipment allow </option>
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Payment Type  </label>
                                        <select class="form-control input-sm">
                                            <option value="" disabled selected>Select payment type </option>
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Pre Carriage By  </label>
                                        <select class="form-control input-sm">
                                            <option value="" disabled selected>Select pre carriage by </option>
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input class="form-control input-sm" type="text" >
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Letter Header</label>
                                    <input class="form-control input-sm" type="text" >
                                </div>
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