@extends('layout')
@section('title', 'Sales Order')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Sales Order</h2>
                    <a href="{{ route('sales-order.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> Sales Order List</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left input_mask">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('seles_order_no','Seles Order No', null, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('seles_date','Seles Date', null, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('seles_reference','Sales Reference',[],null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;"]) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('currency','Currency', null, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('conversion_rate','Conversion Rate', null, ['class'=>'form-control input-sm']) }}
                            </div>
                            <!------Terms and Condition---->
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <fieldset class="m-t-15">
                                    <legend>Terms and Condition:</legend>
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label>Terms and Condition Type</label>
                                                <select class="form-control input-sm select2" required>
                                                    <option value="" disabled selected> Select Terms and Condition Type </option>
                                                    <option value="Delivery Terms">Delivery Terms</option>
                                                    <option value="Payment Condition">Payment Condition</option>
                                                    <option value="Warranty Terms">Warranty Terms</option>
                                                    <option value="Security Terms">Security Terms</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                            {{ BootForm::textarea(null,'Description',null,['id'=>'description','class'=>'form-control input-sm','rows'=>'1']) }}
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                            <button type="button" class="btn btn-sm btn-default m-t-20"><strong>Add</strong></button>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="table-responsive m-t-20">
                                                <table id="mytable1" class="table table-bordered table-hover">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Terms and Condition</th>
                                                            <th>Description</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>01</td>
                                                            <td>Terms</td>
                                                            <td>Description</td>
                                                            <td class="text-center"><button class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end table-->
                                        </div>
                                    </div>
                                </fieldset>
                                <!---------Terms and Condition end-------->
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="panel panel-default bg-light m-t-15">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4 col-xs-12"><label>Search <a href="#"><strong>Product</strong></a></label></div>
                                            <div class="col-md-8 col-sm-8 col-xs-12"></div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="input-group m-b">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-search"></i> Search
                                                </span>
                                                <input type="text" class="form-control input-lg" placeholder="Please type to find product">
                                                <span class="input-group-addon">
                                                    <a href="#"><i class="fa fa-plus"></i> Add</a>
                                                </span>
                                                <span class="input-group-addon">
                                                    <a href="#"><i class="fa fa-list-ul"></i> Product List</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="bg-default">
                                            <tr>
                                                <th colspan="13">Product Table</th>
                                            </tr>
                                            <tr>
                                                <th>#</th>
                                                <th>Product id</th>
                                                <th>Product Name</th>
                                                <th>UOM</th>
                                                <th>Unit Price</th>
                                                <th>Quantity</th>
                                                <th>Bonus Qty</th>
                                                <th>Total Qty</th>
                                                <th>Net Price</th>
                                                <th>Vat</th>
                                                <th>Discont</th>
                                                <th>Total Amount</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>23</td>
                                                <td>Product</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td class="text-center"><button type="button" class="btn btn-default btn-sm" title="Remove"><i class="fa fa-trash text-danger"></i></button></td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="font-bold">
                                            <tr>
                                                <td colspan="3">Total</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td></td>
                                            </tr>

                                        </tfoot> 
                                    </table>
                                </div>
                                <!--end table-->
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="">Remarks</label>
                                    <textarea name="notes" cols="30" rows="2" class="form-control input-sm"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <a href="#" class="btn btn-success btn-sm">Save</a>
                                    <a href="{{ route('sales-order.index')}}" class="btn btn-default btn-sm">Cancel</a>
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
