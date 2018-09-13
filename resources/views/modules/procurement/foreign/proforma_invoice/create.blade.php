@extends('layout')
@section('title', 'Proforma Invoice')
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
                        <h2>Proforma Invoice</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left">
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
                                    <label>Proforma Invoice No.</label>
                                    <input class="form-control input-sm" type="text" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Proforma Invoice date</label>
                                    <input class="form-control input-sm" type="text" >
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Proforma Invoice receive date</label>
                                    <input class="form-control input-sm" type="text" >
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
                       
                        <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Customer Code</label>
                                    <input class="form-control input-sm" type="text" >
                                </div>
                        </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Consignee</label>
                                    <input class="form-control input-sm" type="text" >
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Beneficiary Bank Info</label>
                                    <input class="form-control input-sm" type="text" >
                                </div>
                            </div>
                             <!-- start table -->
                             <div class="form-group pull-in clearfix">
                                 <div class="col-sm-12">
                                    <label>Product Table</label>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th>SL NO</th>
                                                    <th>H.S. CODE</th>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Price</th>
                                                    <th>Total Amount($USD)</th>
                                                    <th class="text-right">
                                                        <i class="fa fa-trash"></i>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-right">123</td>
                                                    <td class="text-center">123</td>
                                                    <td>
                                                        <img src="img/product.jpg" alt="product name" class="img-responsive">
                                                    </td>
                                                    <td>
                                                        <input class="form-control input-sm" type="number">
                                                    </td>
                                                    <td>
                                                        123
                                                    </td>
                                                    <td>
                                                        123
                                                    </td>
                                                    
                                                    <td class="text-right">
                                                        <button type="button" class="btn btn-xs btn-default">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot class="font-bold">
                                                <tr>
                                                    <td colspan="5">Sub Total</td>
                                                    <td>324</td>
                                                    
                                                    <td colspan="2"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">Add freight</td>
                                                    <td>520</td>
                                                    
                                                    <td colspan="2"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">Grand Total</td>
                                                    <td>520</td>
                                                    
                                                    <td colspan="2"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">Amount in Word</td>
                                                    <td>one thousand five hundred </td>
                                                    
                                                    <td colspan="2"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                   
                                </div>
                            </div>
                             <!--end table-->
                             
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea class="form-control input-sm" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">

                                    <button type="submit" class="btn btn-primary">Save</button>
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