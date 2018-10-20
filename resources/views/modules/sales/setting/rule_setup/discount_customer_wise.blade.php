@extends('layout')
@section('title', 'Rule Setup')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Rule Setup</h2>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-xs-3">
                        <!-- Nav tabs -->
                        @include('modules.sales.setting.rule_setup.tabs')
                    </div>

                    <div class="col-xs-9">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="discount_customer">
                                <div class="x_title">
                                    <h2>Discount Customer Wise</h2>
                                    <a href="#" class="btn btn-sm btn-default btn-addon pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New</a>
                                    <div class="clearfix"></div>
                                </div>
                                {{ BootForm::open(['model' => $discount_customer_wise, 'store' => 'discount-customer-wise.store', 'update' => 'discount-customer-wise.update']) }}
                                    <div class="row">
                                        <div class="well">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3">
                                                    {{ BootForm::select('customer_id', 'Customer Id', [], null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;"]) }}
                                                </div>
                                                <div class="col-lg-6 ol-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3">
                                                    <label>Add Product</label>
                                                    <div class="input-group">
                                                        <select class="form-control input-sm select2" style="width: 100%;">
                                                            <option>1</option>
                                                            <option>2</option>
                                                        </select>
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-default btn-sm" type="button"><i class="fa fa-plus-circle fa-lg text-primary"></i></button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <th>Discount Type</th>
                                                        <th>Amount</th>
                                                        <th>Active</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Tyre</td>
                                                        <td>
                                                            <select class="form-control input-sm">
                                                                <option value="">one1</option>
                                                                <option value="">one2</option>
                                                            </select>
                                                        </td>
                                                        <td>125</td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" class="js-switch" checked />
                                                            </label>
                                                        </td>
                                                        <td class="text-center"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <br />
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                                                    <button type="button" class="btn btn-default btn-sm">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                {{ BootForm::close() }}
                                <div class="table-responsive m-t-30">
                                    <table class="table table-bordered table-hover">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th>#</th>		
                                                <th>Product Name</th>		
                                                <th>Discount Type</th>
                                                <th>Amount</th>
                                                <th>Active</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>Customer</td>
                                                <td>02</td>
                                                <td>03</td>
                                                <td>03</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--end table-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
