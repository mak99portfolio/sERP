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
                <div class="x_panel" ng-app="myApp">
                    <div class="x_title">
                        <h2>Proforma Invoice</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" ng-controller="myCtrl">
                        <br />
                        <form class="form-horizontal form-label-left" action="{{route('proforma-invoice.store')}}" method="POST">
                        @csrf
                            <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Requisition No.</label>
                                        <select data-placeholder="Select PO No" multiple class="form-control input-sm select2" name="purchase_order_id" ng-model="po_id" ng-change="searchPO()">
                                            <option></option>
                                            @foreach($purchase_orders as $item)
                                            <option value="{{$item->id}}">{{$item->purchase_order_no}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('purchase_order_date','Purchase Order Date.', null, ['class'=>'form-control input-sm','id'=>"single_cal4" ]) }}
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
                                        {{ BootForm::select('country_of_final_destination_country_id', 'Country of Final Destination', $country_list, null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::select('final_destination_city_id', 'Final Destination', $city_list, null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::select('country_of_origin_of_goods_country_id', 'Country of Origin of Goods', $country_list, null, ['class'=>'form-control input-sm']) }}
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
                                            <table class="table table-bordered table-hover" ng-if="itemlist.length >=1">
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
                                                <tr ng-repeat="item in itemlist">
                                                    <td class="text-center"><% $index+1 %></td>
                                                    <td class="checkbox">
                                                        <label class="i-checks">
                                                            <input type="checkbox" ng-init="checked[$index] = true" ng-model="checked[$index]"><% item.name %>
                                                        </label>
                                                    </td>
                                                    <td><% item.uom %><input type="hidden" class="form-control" name="items[<% $index %>][product_id]" value="<% item.product_id %>"></td>
                                                    <td><input ng-disabled="!checked[$index]" ng-model="quantity[$index]" value="<% item.quantity %>" class="form-control input-sm" type="number" name="items[<% $index %>][quantity]"></td>
                                                    <td><input ng-disabled="!checked[$index]" ng-model="unit_price[$index]" value="<% item.unit_price %>" class="form-control input-sm" type="number" name="items[<% $index %>][unit_price]"></td>
                                                    <td>
                                                    <% quantity[$index]*unit_price[$index] %>
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
@section('script')
<script>
    var app = angular.module('myApp', [], function($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        });
    app.controller('myCtrl', function($scope, $http) {
        
        $scope.itemlist = [];
        $scope.searchPO = function () {
            $scope.itemlist = [];
            for(i=0; i<$scope.po_id.length; i++){
                $scope.addToItemList($scope.po_id[i]);
            }
        }
        $scope.addToItemList = function(id){
            let url = "{{URL::to('procurement/get-po')}}/" + id;
            $http.get(url)
                    .then(function(response) {
                        // console.log('data-----------', response.data);
                        angular.forEach(response.data, function(value, key) {
                            $scope.itemlist.push(value);
                        });
                    });
        }
        $scope.removeItem = function(index){
            $scope.itemlist.splice(index);
        }
    });
</script>
@endsection
