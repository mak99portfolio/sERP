@extends('layout')
@section('title', 'Foreign Purchase order')
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
                        <h2>Foreign Purchase Order</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" action="{{route('purchase-order.store')}}" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Requisition No.</label>
                                        <select class="form-control input-sm" name="requisition_no">
                                            <option>258</option>
                                            <option>852</option>
                                            <option>456</option>
                                            <option>951</option>
                                            <option>963</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('purchase_order_no','Purchase Order No.', null, ['class'=>'form-control input-sm','readonly' ]) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('vendor_id', 'Vendor', $vendor_list, null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('requisition_date','Requisition date', null, ['class'=>'form-control input-sm','id'=>"single_cal4" ]) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::text('purchase_order_date','Purchase Order date', null, ['class'=>'form-control input-sm','id'=>"single_cal3" ]) }}
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
                                    {{ BootForm::select('p', 'Shipment Allow', [''=>'Select shipment allow',1=>'Multi shipment',2=>'Partial'], null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('payment_type', 'Payment Type', [''=>'Select payment type',1=>'Cash'], null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('pre_carriage_by', 'Pre Carriage By', [''=>'Select pre carriage by',1=>'Ship',2=>'Air'], null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    {{ BootForm::text('subject','Subject', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    {{ BootForm::text('letter_header','Letter Header', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive m-t-15">
                                    <table class="table table-bordered table-hover">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th colspan="8">Product Table</th>
                                                </tr>
                                                <tr>
                                                    <th>SL NO</th>
                                                    <th>H.S. CODE</th>
                                                    <th>Product Name</th>
                                                    <th>UOM</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Price</th>
                                                    <th>Total Amount</th>
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
                                                        PCs
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
                                                    <td colspan="6">Total</td>
                                                    <td>324</td>

                                                    <td colspan="2"></td>
                                                </tr>
                                            </tfoot>
                                    </table>
                                </div>
                                </div>
                                 <!--end table-->
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    {{ BootForm::text('letter_footer','Letter Footer', null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        {{ BootForm::textarea('notes','Notes', null, ['class'=>'form-control input-sm','rows'=>2]) }}
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
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
@section('script')
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@endsection
