@extends('layout')
@section('title', 'Sales Order Return')
@section('content')

<!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Sales Order Return</h2>
                            <a href="{{route('sales-order-return.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i>  See Sales Order Return List</a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Sales Order Return Date</label>
                                    <input type="date" name="sales_order_return" class="form-control input-sm" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Select Sales Order No</label>
                                    <select name="salect_sales_order_no" id="" class="form-control input-sm select2" required>
                                        <option value="">one</option>
                                        <option value="">two</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Customer Name</label>
                                    <input type="text" name="customer_name" class="form-control input-sm" required readonly>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Sales Order Date</label>
                                    <input type="date" name="sales_order_date" class="form-control input-sm" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Sales Refarence Name</label>
                                    <input type="text" name="sales_refarence_name" class="form-control input-sm" required readonly>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Return Reason</label>
                                    <select name="return_reason" id="" class="form-control input-sm select2" required>
                                        <option value="">one</option>
                                        <option value="">two</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Return Person</label>
                                    <select name="return_person" id="" class="form-control input-sm select2" required>
                                        <option value="">one</option>
                                        <option value="">two</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="">Remark</label>
                                    <textarea name="remark" id="" cols="30" rows="2" class="form-control input-sm"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <fieldset>
                                    <legend>Sales Order Return Table</legend>
                                </fieldset>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Sales Order Quantity</th>
                                        <th>Remaining Sales Order Quantity</th>
                                        <th>Return Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Ner Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>125</td>
                                        <td class="text-right">125</td>
                                        <td class="text-right">125</td>
                                        <td class="text-right"><input type="text" class="form-control input-sm"></td>
                                        <td class="text-right">125</td>
                                        <td class="text-right">125</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right">Total Return Quantity</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right">Total Price</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right">Vat</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right">Grand Total</td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a href="{{route('sales-order-return.index')}}" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- /page content -->
@endsection
