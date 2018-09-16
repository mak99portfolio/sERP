@extends('layout')
@section('title', 'Purchase order')
@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Procurement</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Local Purchase Order</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left">
                            <fieldset>
                                <legend>Vendor Information:</legend>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Vendor </label>
                                            <select class="form-control input-sm">
                                                <option value="" disabled selected> Select Vendor</option>
                                                <option>Active</option>
                                                <option>Inactive</option>
                                            </select>
                                        </div>
                                          {{ BootForm::select('vendor_id', 'Select Vendor', $vendor_list, null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Vendor Selection Criteria</label>
                                            <select class="form-control input-sm">
                                                <option value="" disabled selected> Select Vendor Selection Criteria</option>
                                                <option>Agrement</option>
                                                <option>Record</option>
                                                <option>Quatation</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Reference No.</label>
                                            <input class="form-control input-sm" type="text" >
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        {{ BootForm::textarea('additional_information','Additional Information',null,['class'=>'form-control input-sm','rows'=>'2']) }}
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        {{ BootForm::textarea('address','Address',null,['class'=>'form-control input-sm','rows'=>'2']) }}
                                    </div>
                                </div>
                            </fieldset>

                            <!---------- genaral po info-------->
                            <fieldset class="m-t-15">
                                <legend>Genaral PO Information:</legend>
                                <div class="row"> 
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Purchase Oder No</label>
                                            <input class="form-control input-sm" type="text" >
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Inco-Terms</label>
                                            <select class="form-control input-sm">
                                                <option value="" disabled selected> Select Inco-Terms</option>
                                                <option>Agrement</option>
                                                <option>Record</option>
                                                <option>Quatation</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Purchase Oder Date</label>
                                            <input class="form-control input-sm" type="text" >
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Inco-Term Info</label>
                                            <input class="form-control input-sm" type="text" >
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Procurement Type</label>
                                            <select class="form-control input-sm">
                                                <option value="" disabled selected> Select Procurement Type</option>
                                                <option>Agrement</option>
                                                <option>Record</option>
                                                <option>Quatation</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Purchase Order Type</label>
                                            <select class="form-control input-sm">
                                                <option value="" disabled selected> Select Purchase Order Type</option>
                                                <option>Agrement</option>
                                                <option>Record</option>
                                                <option>Quatation</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <input class="form-control input-sm" type="text" >
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Shipping Method</label>
                                            <select class="form-control input-sm">
                                                <option value="" disabled selected> Select Shipping Method</option>
                                                <option>Agrement</option>
                                                <option>Record</option>
                                                <option>Quatation</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Payment Method</label>
                                            <select class="form-control input-sm">
                                                <option value="" disabled selected> Select Payment Method</option>
                                                <option>Agrement</option>
                                                <option>Record</option>
                                                <option>Quatation</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            {{ BootForm::textarea('remark','Remarks',null,['class'=>'form-control input-sm','rows'=>'2']) }}
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <!---------- genaral po info end-------->
                            <!---------- Ship to info-------->
                            <fieldset class="m-t-15">
                                <legend>Ship To Information:</legend>
                                <div class="row"> 
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="flat" checked name="iCheck"> LEADS Corporation Ltd.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-6 col-sm-6 col-xs-12">
                                        <div class="col-md-3 col-sm-4">
                                            <div class="radio pull-right">
                                                <label>
                                                    <input type="radio" class="flat" name="iCheck"> Other Ship to Address
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-sm-8">
                                            <input class="form-control input-sm" type="text" >
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <!---------- Ship to info end-------->
                            <!---------- PR info-------->
                            <fieldset class="m-t-15">
                                <legend>PR Information:</legend>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <label>Purchase Requisition No</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Purchase Requisition No" aria-describedby="basic-addon2">
                                            <span class="input-group-addon btn btn-primary" id="basic-addon2">Add</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th>SL NO</th>
                                                        <th>Purchase Requisition No</th>
                                                        <th>Date</th>
                                                        <th>Purchase Requisition Name</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>01</td>
                                                        <td>123</td>
                                                        <td>12/03/2018</td>
                                                        <td>123</td>
                                                        <td  class="text-center">
                                                            <a href="#" class="btn btn-default btn-xs">Edit</a>
                                                            <button type="button" class="btn btn-xs btn-default"><i class="fa fa-times"></i></button>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end table-->
                                    </div>
                                </div>
                            </fieldset>
                            <!----------PR info end-------->
                            <!----------PR Product Details-------->

                            <!----------PR Product Details end-------->
                            <!----------PO Product Details-------->
                            <fieldset class="m-t-15">
                                <legend>PO Product Details:</legend>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th>SL NO</th>
                                                <th>Item Code</th>
                                                <th>Spec Description</th>
                                                <th>Qty</th>
                                                <th>MOU</th>
                                                <th>Price</th>
                                                <th>Sub Total</th>
                                                <th>D.Rt</th>
                                                <th>Total Disc</th>
                                                <th>VAT Rt(%)</th>
                                                <th>VAT Amt</th>
                                                <th>Total (Net)</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>123</td>
                                                <td>2018</td>
                                                <td>123</td>
                                                <td>123</td>
                                                <td><input class="form-control input-sm" type="text"></td>
                                                <td>123</td>
                                                <td>123</td>
                                                <td><input class="form-control input-sm" type="text"></td>
                                                <td>123</td>
                                                <td>123</td>
                                                <td>123</td>
                                                <td  class="text-center">
                                                    <button type="button" class="btn btn-xs btn-default"><i class="fa fa-times"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="6">Total</td>
                                                <td>9123</td>
                                                <td></td>
                                                <td>31.25</td>
                                                <td></td>
                                                <td>23</td>
                                                <td>245.30</td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!--end table-->
                            </fieldset>
                            <!----------PO Product Details end-------->
                            <!----------Payment Terms-------->
                            <fieldset class="m-t-15">
                                <legend>Payment Terms:</legend>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <label>Payment Type</label>
                                        <div class="form-group">
                                            <select class="form-control input-sm">
                                                <option value="" disabled selected> Select type</option>
                                                <option>Agrement</option>
                                                <option>Record</option>
                                                <option>Quatation</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Description</th>
                                                        <th>% or Fixed Amount</th>
                                                        <th  class="text-center">Action</th>
                                                    </tr>
                                                    <tr>
                                                        <th>20/02/2018</th>
                                                        <th><input class="form-control input-sm" type="text"></th>
                                                        <th><input class="form-control input-sm" type="text"></th>
                                                        <th  class="text-center"><button type="button" class="btn btn-xs btn-default">Add</button></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Description</th>
                                                        <th colspan="2">% or Fixed Amount</th>
                                                    </tr>  
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>12/03/2018</td>
                                                        <td>Description</td>
                                                        <td>12%</td>
                                                        <td  class="text-center">
                                                            <a href="#" class="btn btn-default btn-xs">Edit</a>
                                                            <button type="button" class="btn btn-xs btn-default"><i class="fa fa-times"></i></button>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end table-->
                                    </div>
                                </div>
                            </fieldset>
                            <!--------Payment Terms end-------->
                            <!----------Terms and Condition-------->
                            <fieldset class="m-t-15">
                                <legend>Terms and Condition:</legend>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Terms and Condition Type</label>
                                            <select class="form-control input-sm">
                                                <option value="" disabled selected> Select..</option>
                                                <option>Agrement</option>
                                                <option>Record</option>
                                                <option>Quatation</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        {{ BootForm::textarea('address','Description',null,['class'=>'form-control input-sm','rows'=>'2']) }}
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="button" class="btn btn-md btn-info">Add</button>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive m-t-20">
                                            <table class="table table-bordered table-hover">
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
                                                        <td>123</td>
                                                        <td>123</td>
                                                        <td  class="text-center">
                                                            <a href="#" class="btn btn-default btn-xs">Edit</a>
                                                            <button type="button" class="btn btn-xs btn-default"><i class="fa fa-times"></i></button>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end table-->
                                    </div>
                                </div>
                            </fieldset>
                            <!---------Terms and Condition end-------->

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection