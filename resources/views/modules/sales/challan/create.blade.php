@extends('layout')
@section('title', 'Challan')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Challan</h2>
                    <a href="{{ route('sales-challan.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> Challan List</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left input_mask" id='main'>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group ">
                                    <label for="customer_id" class="control-label">Customer</label>
                                    <select class="form-control input-sm select2" id="customer_id" name="customer_id">                
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group ">
                                    <label for="sales_orders[]" class="control-label">Sales Orders</label>
                                    <select class="form-control input-sm select2" id="sales_orders[]" name="sales_orders[]">
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group ">
                                    <label for="challan_date" class="control-label">Challan Date</label>
                                    <input class="form-control input-sm" id="challan_date" name="challan_date" type="text">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group ">
                                    <label for="mushak_id" class="control-label">Mushak No</label>
                                    <select class="form-control input-sm select2" id="mushak_id" name="mushak_id">
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group ">
                                    <label for="delivery_person_id" class="control-label">Delivery Person</label>
                                    <select class="form-control input-sm select2" id="delivery_person_id" name="delivery_person_id"></select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group ">
                                    <label for="shipping_address" class="control-label">Shipping Address</label>
                                    <textarea class="form-control input-sm" rows="2" id="shipping_address" name="shipping_address" cols="50"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Delivery Medium</label>
                                <div class="input-group">
                                    <select name="delivery_vehicle" class="form-control input-sm select2">
                                        <option value="">Own Vehicle</option>
                                        <option value="">Transport Agency</option>
                                        <option value="">Customer</option>
                                        <option value="">Others</option>
                                    </select>
                                    <span class="input-group-btn">
                                      <button class="btn btn-default btn-sm" type="button">
                                         <span class="fa fa-lg fa-plus-circle text-primary"></span>
                                      </button>
                                    </span>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Delivery Mediums</div>
                                    <div class="panel-body">

                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Vehicle</label>
                                                    <select class="form-control input-sm select2" id="delivery_person_id" name="delivery_person_id"></select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Driver Name</label>
                                                    <input type="text" name="driver_name" class="form-control input-sm" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Phone No</label>
                                                    <input type="text" name="phone_no" class="form-control input-sm" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Transport Agency</label>
                                                    <select class="form-control input-sm select2" id="delivery_person_id" name="delivery_person_id"></select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Vehicle No</label>
                                                    <input type="text" name="vehicle_no" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Driver Name</label>
                                                    <input type="text" name="driver_name" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Phone No</label>
                                                    <input type="text" name="phone_no" class="form-control input-sm">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                             <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Vehicle No</label>
                                                    <input type="text" name="vehicle_no" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Driver Name</label>
                                                    <input type="text" name="driver_name" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Phone No</label>
                                                    <input type="text" name="phone_no" class="form-control input-sm">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Table Of Product</div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <th>Sales Order Quantity</th>
                                                        <th>Receive Quantity</th>
                                                        <th>Intransit</th>
                                                        <th>Pending</th>
                                                        <th>Challan Quantity</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>aa</td>
                                                        <td>5</td>
                                                        <td>8</td>
                                                        <td>4</td>
                                                        <td>5</td>
                                                        <td>4</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5" class="text-right">Total Challan Quantity</td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    {!! btnSubmitGroup() !!}
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
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios@0.18.0/dist/axios.min.js"></script>
<script src="{{ asset('assets/vendors/ajax_loading/ajax-loading.js') }}"></script>

<script>
$(function(){
    var vue=new Vue({
        el: '#main',
        data:{
            resource:{

            },
            field:{
                customer_id:'',
                sales_order_ids:[],
                challan_date:'',
                mushak_id:'',
                delivery_person_id:'',
                shipping_address:''
            }
        },
        methods:{

        },
        beforeMount(){}
    })//End of vue js

    $('.datepicker').daterangepicker({
      singleDatePicker: true,
      singleClasses: "picker_3",
      locale: {
          format: 'DD-MM-YYYY'
      }
    });

});
</script>
@endsection