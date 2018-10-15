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
                    <a href="{{ route('rule-setup.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> Rule Setup List</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-xs-3">
                        <!-- required for floating -->
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tabs-left">
                            <li class="active"><a href="#credit_rule" data-toggle="tab">Credit Rule</a></li>
                            <li><a href="#discount_customer" data-toggle="tab">Discount Customer Wise</a></li>
                            <li><a href="#discount_generic" data-toggle="tab">Discount Generic</a></li>
                            <li><a href="#free_bonus_customer" data-toggle="tab">Free/Bonus(Customer Wise)</a></li>
                            <li><a href="#free_bonus_generic" data-toggle="tab">Free/Bonus(Generic)</a></li>
                        </ul>
                    </div>

                    <div class="col-xs-9">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="credit_rule">
                                <div class="x_title">
                                    <h2>Credit Rule</h2>
                                    <a href="#" class="btn btn-sm btn-default btn-addon pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New</a>
                                    <div class="clearfix"></div>
                                </div>
                                <form class="form-horizontal form-label-left input_mask">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="">Customer</label>
                                                <select name="customet" id="" class="form-control input-sm select2">
                                                    <option value="">one</option>
                                                    <option value="">two</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="">Credit Amount</label>
                                                <input type="text" class="form-control input-sm" name="credit_amount">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="">Duration</label>
                                                <input type="text" class="form-control input-sm" name="duration">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <br />
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <a href="#" class="btn btn-success btn-sm">Save</a>
                                                <a href="{{ route('rule-setup.index')}}" class="btn btn-default btn-sm">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th>#</th>
                                                <th>Customer</th>
                                                <th>Amount</th>
                                                <th>Duration</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>Customer</td>
                                                <td>02</td>
                                                <td>03</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--end table-->
                            </div>
                            <div class="tab-pane" id="discount_customer">
                                <div class="x_title">
                                    <h2>Discount Customer Wise</h2>
                                    <a href="#" class="btn btn-sm btn-default btn-addon pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New</a>
                                    <div class="clearfix"></div>
                                </div>
                                <form class="form-horizontal form-label-left input_mask">
                                    <div class="row">
                                        <div class="well">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3">
                                                    <div class="form-group">
                                                        <label for="">Customer Id</label>
                                                        <select name="customet" id="" class="form-control input-sm select2">
                                                            <option value="">one</option>
                                                            <option value="">two</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 ol-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3">
                                                    <!--<form action="" method="GET">-->
                                                    <label for="">Add Product</label>
                                                    <div class="input-group">
                                                        <select class="form-control input-sm" name="">
                                                            <option value="">One</option>
                                                            <option value="">One</option>
                                                            <option value="">One</option>
                                                        </select>
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-default btn-sm" type="submit">Add</button>
                                                        </span>
                                                    </div>
                                                    <!--</form>-->
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
                                                            <select name="" id="" class="form-control input-sm">
                                                                <option value="">one</option>
                                                                <option value="">one</option>
                                                            </select>
                                                        </td>
                                                        <td>125</td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" class="js-switch" checked />
                                                            </label>
                                                        </td>
                                                        <td class="text-center"><a href="" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <br />
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <a href="#" class="btn btn-success btn-sm">Save</a>
                                                <a href="{{ route('rule-setup.index')}}" class="btn btn-default btn-sm">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="table-responsive">
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
                            <div class="tab-pane" id="discount_generic">Discount Generic</div>
                            <div class="tab-pane" id="free_bonus_customer">
                                <div class="x_title">
                                    <h2>Free/Bonus(Customer Wise)</h2>
                                    <a href="#" class="btn btn-sm btn-default btn-addon pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New</a>
                                    <div class="clearfix"></div>
                                </div>
                                <form class="form-horizontal form-label-left input_mask">
                                    <div class="row">
                                        <div class="well">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3">
                                                    <div class="form-group">
                                                        <label for="">Customer Id</label>
                                                        <select name="customet" id="" class="form-control input-sm select2">
                                                            <option value="">one</option>
                                                            <option value="">two</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 ol-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3">
                                                    <!--<form action="" method="GET">-->
                                                    <label for="">Add Product</label>
                                                    <div class="input-group">
                                                        <select class="form-control input-sm select2" name="">
                                                            <option value="">One</option>
                                                            <option value="">One</option>
                                                            <option value="">One</option>
                                                        </select>
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-default btn-sm" type="submit">Add</button>
                                                        </span>
                                                    </div>
                                                    <!--</form>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <th>Type</th>
                                                        <th>Bonus</th>
                                                        <th>Active</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Tyre</td>
                                                        <td>
                                                            <select name="" id="" class="form-control input-sm">
                                                                <option value="">Ratio</option>
                                                                <option value="">Fixed</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control input-sm" name="msg">
                                                                <span class="input-group-addon">&ratio;</span>
                                                                <input type="text" class="form-control input-sm" name="msg">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" class="js-switch" checked />
                                                            </label>
                                                        </td>
                                                        <td class="text-center"><a href="" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tyre</td>
                                                        <td>
                                                            <select name="" id="" class="form-control input-sm">
                                                                <option value="">Ratio</option>
                                                                <option value="">Fixed</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control input-sm" name="">
                                                        </td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" class="js-switch" checked />
                                                            </label>
                                                        </td>
                                                        <td class="text-center"><a href="" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <br />
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <a href="#" class="btn btn-success btn-sm">Save</a>
                                                <a href="{{ route('rule-setup.index')}}" class="btn btn-default btn-sm">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>		
                                                <th>Type</th>
                                                <th>Bonus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>Customer</td>
                                                <td>02</td>
                                                <td>03</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--end table-->
                            </div>
                            <div class="tab-pane" id="free_bonus_generic">Free/Bonus(Generic)</div>
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
