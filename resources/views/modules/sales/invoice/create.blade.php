@extends('layout')
@section('title', 'Invoice')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Invoice</h2>
                    <a href="{{ route('sales-invoice.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> Invoice List</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left input_mask">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Invoice No</label>
                                    <input type="text" name="invoice_no" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Challan No</label>
                                    <select name="challan_no" id="" class="form-control input-sm select2">
                                        <option value="">one</option>
                                        <option value="">two</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Challan Date</label>
                                    <input type="date" name="challan_date" class="form-control input-sm" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Sales Order No</label>
                                    <select name="sales_order_no" class="form-control input-sm select2">
                                        <option value="">one</option>
                                        <option value="">two</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Customer</label>
                                    <input type="text" name="customer" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Reference</label>
                                    <input type="text" name="reference" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Invoice Address</label>
                                    <select name="invoice_address" id="" class="form-control input-sm select2">
                                        <option value="">one</option>
                                        <option value="">two</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Shipped Address</label>
                                    <select name="shipped_address" id="" class="form-control input-sm select2">
                                        <option value="">one</option>
                                        <option value="">two</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Get Pass No</label>
                                    <select name="get_pass_no" id="" class="form-control input-sm select2">
                                        <option value="">one</option>
                                        <option value="">two</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <a href="#" class="btn btn-success btn-sm">Save</a>
                                    <a href="{{ route('sales-invoice.index')}}" class="btn btn-default btn-sm">Cancel</a>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
