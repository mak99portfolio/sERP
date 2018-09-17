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
                        <form class="form-horizontal form-label-left" action="{{route('proforma-invoice.store')}}" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('purchase_order_no','Purchase Order No.', null, ['class'=>'form-control input-sm','readonly' ]) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('purchase_order_date','Purchase Order Date.', null, ['class'=>'form-control input-sm','id'=>"single_cal3" ]) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('proforma_invoice_no','Proforma Invoice No.', null, ['class'=>'form-control input-sm','readonly' ]) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('proforma_invoice_date','Proforma Invoice date', null, ['class'=>'form-control input-sm','id'=>"single_cal4" ]) }}
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('proforma_invoice_receive_date','Proforma Invoice receive date', null, ['class'=>'form-control input-sm','id'=>"single_cal2" ]) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                
                                {{ BootForm::select('vendor_id', 'Vendor', $vendor_list, null, ['class'=>'form-control input-sm']) }}
                                </div>

                            </div>
                            
                            <fieldset class="m-t-20">
                                <legend>Table of Terms and Conditions:</legend>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                     {{ BootForm::select('port_of_loading_port_id', 'Port of Loading', $port_list, null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('port_of_discharge_port_id', 'Port of Discharge', $port_list, null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::select('country_of_final_destination_countru_id', 'Country of Final Destination', $country_list, null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::select('final_destination_countru_id', 'Final Destination', $country_list, null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::select('country_of_origin_of_goods_countru_id', 'Country of Origin of Goods', $country_list, null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::select('shipment_allow', 'Shipment Allow', [''=>'Select shipment allow',1=>'Multi shipment',2=>'Partial'], null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::select('payment_type', 'Payment Type', [''=>'Select payment type',1=>'Cash'], null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::select('pre_carriage_by', 'Pre Carriage By', [''=>'Select pre carriage by',1=>'Ship',2=>'Air'], null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                </div>
                            </fieldset>

                            <div class="row"> <br />
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('customer_code','Customer Code', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('consignee','Consignee', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('beneficiary_bank_info','Beneficiary Bank Info', null, ['class'=>'form-control input-sm']) }}
                                </div>
                            </div>
                       
                            <fieldset>
                                <legend>Product Table:</legend>
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
                            </fieldset>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {{ BootForm::textarea('notes','Notes', null, ['class'=>'form-control input-sm','rows'=>2]) }}
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <br />

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <!-- <a class="btn btn-default" href="{{route('vendor.index')}}">Cancel</a> -->
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