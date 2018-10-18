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
                                    <label for="">Challan No *</label>
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
                                    <label for="">Invoice Date *</label>
                                    <input type="date" name="invoice_date" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive m-t-10">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Sales Order No</th>
                                            <th>Date</th>
                                            <th>Reference</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>125</td>
                                            <td>125</td>
                                            <td>125</td>
                                            <td>125</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Customer *</label>
                                    <input type="text" name="customer" class="form-control input-sm" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Invoice Address *</label>
                                    <select name="invoice_address" id="" class="form-control input-sm select2">
                                        <option value="">one</option>
                                        <option value="">two</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Gate Pass No *</label>
                                    <select name="get_pass_no" id="" class="form-control input-sm select2">
                                        <option value="">one</option>
                                        <option value="">two</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Shipping Address *</label>
                                    <select name="shipped_address" id="" class="form-control input-sm select2">
                                        <option value="">one</option>
                                        <option value="">two</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Delivery Vehicle *</label>
                                    <select name="delivery_vehicle" class="form-control input-sm select2">
                                        <option value="">Own</option>
                                        <option value="">Transport Agency</option>
                                        <option value="">Customer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Delivery Person *</label>
                                    <select name="delivery_person" class="form-control input-sm select2">
                                        <option value="">abc</option>
                                        <option value="">abcc</option>
                                        <option value="">abccc</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="panel panel-default m-t-20">
                                    <div class="panel-body">
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="">Driver Name *</label>
                                                <input type="text" name="driver_name" class="form-control input-sm">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="">Vehicle No *</label>
                                                <input type="text" name="vehicle_no" class="form-control input-sm">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="">Phone No *</label>
                                                <input type="text" name="phone_no" class="form-control input-sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>UOM</th>
                                            <th>Challan Quantity</th>
                                            <th>Number Of Bonus Quantity</th>
                                            <th>Given Bonus Quantity</th>
                                            <th>Pending Bonus Quantity</th>
                                            <th>Pending Product Quantity</th>
                                            <th>Invoice Quantity</th>
                                            <th>Sub Total Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Net Price</th>
                                            <th>Discount</th>
                                            <th>Sub total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>125</td>
                                            <td>125</td>
                                            <td>125</td>
                                            <td>125</td>
                                            <td>125</td>
                                            <td>125</td>
                                            <td>125</td>
                                            <td>125</td>
                                            <td>125</td>
                                            <td>125</td>
                                            <td>125</td>
                                            <td>125</td>
                                            <td>125</td>
                                        </tr>
                                        <tr>
                                            <td colspan="12" class="text-right">Total Quantity</td>
                                            <td>125</td>
                                        </tr>
                                        <tr>
                                            <td colspan="12" class="text-right">Total Amount</td>
                                            <td>125</td>
                                        </tr>
                                        <tr>
                                            <td colspan="12" class="text-right">Total Vat</td>
                                            <td>125</td>
                                        </tr>
                                        <tr>
                                            <td colspan="12" class="text-right">Total Discount</td>
                                            <td>125</td>
                                        </tr>
                                        <tr>
                                            <td colspan="12" class="text-right">Grand Total</td>
                                            <td>125</td>
                                        </tr>
                                        <tr>
                                            <td colspan="12" class="text-right">Previous Due</td>
                                            <td>125</td>
                                        </tr>
                                        </tbody>
                                    </table>
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
