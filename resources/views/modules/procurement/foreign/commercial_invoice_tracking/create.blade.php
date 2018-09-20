@extends('layout')
@section('title', 'Commercial Invoice Tracking')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Commercial Invoice Tracking</h2>
                        <a href="{{route('commercial-invoice-tracking.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> See Commercial Invoice List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="form-horizontal form-label-left input_mask">
                            <div class="col-lg-4 ol-md-6 col-sm-6 col-xs-12 col-lg-offset-4 col-md-offset-3 col-sm-offset-3">
                                <label for="">Commercial Invoice Tracking No Search</label>
                                <div class="input-group">
                                    <input type="text" name="commercial_invoice_tracking_no_search" class="form-control" placeholder="Commercial Invoice Tracking No Search..">
                                    <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                                        </span>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <table class="table table-bordered">
                                    <thead class="bg-primary">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">Commercial Invoice Tracking Issue Date</th>
                                        <td>
                                            <div>
                                                <input type="text" name="ci_issue_date" class="form-control" readonly value="19-09-2018">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group text-center">
                                                <label class="label label-success">Done</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Bl Issue Date</th>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" name="bl_issue_date" class="form-control datepicker">
                                                <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button">Save</button>
                                                    </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group text-center">
                                                <label class="label label-warning">Pending</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Document Arrived At Bank</th>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" name="document_arrived_at_bank" class="form-control datepicker">
                                                <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button">Save</button>
                                                    </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group text-center">
                                                <label class="label label-warning">Pending</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Document Send At Port</th>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" name="document_send_at_port" class="form-control datepicker">
                                                <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button">Save</button>
                                                    </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group text-center">
                                                <label class="label label-warning">Pending</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Document Value Payment</th>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" name="document_value_payment" class="form-control datepicker" placeholder="Document Value Payment">
                                                <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button">Save</button>
                                                    </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group text-center">
                                                <label class="label label-warning">Pending</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Container Arrived At Port</th>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" name="container_arrived_at_port" class="form-control datepicker" datepicker >
                                                <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button">Save</button>
                                                    </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group text-center">
                                                <label class="label label-success">Done</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Container Birlth At Port</th>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" name="container_birlth_arrived_at_port" class="form-control datepicker">
                                                <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button">Save</button>
                                                    </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group text-center">
                                                <label class="label label-success">Done</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Container Delivery At Port</th>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" name="container_delivery_at_port" class="form-control datepicker">
                                                <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button">Save</button>
                                                    </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group text-center">
                                                <label class="label label-success">Done</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Received At Warehouse</th>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" name="receive_at_warehouse" class="form-control datepicker">
                                                <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button">Save</button>
                                                    </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group text-center">
                                                <label class="label label-success">Done</label>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <button class="btn btn-success btn-sm">Save</button>
                                    <a href="{{route('commercial-invoice-tracking.index')}}" class="btn btn-default btn-sm">Cancel</a>
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