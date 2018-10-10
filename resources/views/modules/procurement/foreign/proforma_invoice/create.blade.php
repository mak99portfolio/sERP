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
                        <a href="{{route('proforma-invoice.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Foreign Proforma Invoice List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" ng-controller="myCtrl">
                        <br />
                        @include('partials.flash_msg')
                        <form class="form-horizontal form-label-left" autocomplete="off" action="{{route('proforma-invoice.store')}}" method="POST">
                        @csrf
                            <div class="row">
                                {{-- 
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('purchase_order_date','Purchase Order Date.', null, ['class'=>'form-control input-sm datepicker','required']) }}
                                </div>
                                --}}
                               <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('proforma_invoice_no','Proforma Invoice No.', null, ['class'=>'form-control input-sm']) }}
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('proforma_invoice_date','Proforma Invoice date', null, ['class'=>'form-control input-sm datepicker','required']) }}
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('proforma_invoice_receive_date','Proforma Invoice receive date', null, ['class'=>'form-control input-sm datepicker','required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">

                                {{ BootForm::select('vendor_id', 'Vendor', $vendor_list, null, ['class'=>'form-control input-sm select2','required','data-popup'=> route('vendor.index')]) }}
                                </div>

                            </div>

                            <div class="row"> <br />
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('customer_code','Customer Code', null, ['class'=>'form-control input-sm','required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('consignee_company_profile_id', 'Consignee',$company_profile_list,null, ['class'=>'form-control input-sm select2', 'required', 'required','data-popup'=> route('company-profile.index')]) }}
                                </div>
                                {{-- <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('beneficiary_bank_info','Beneficiary Bank Info', null, ['class'=>'form-control input-sm','required']) }}
                                </div> --}}
                            </div>
                            <div class="row"> <br />
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="well">
                                           <div class="form-group">
                                        <label>Purchase Order No.</label>
                                        <select data-placeholder="Select PO No" multiple  required class="form-control input-sm select2" name="purchase_order_ids[]" ng-model="po_id" ng-change="searchPO()">
                                            <option></option>
                                            @foreach($purchase_orders as $item)
                                            <option value="{{$item->id}}">{{$item->purchase_order_no}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                   </div>
                               </div>
                            </div>

                            <fieldset>
                                <legend>Product Table:</legend>
                                <div class="table-responsive">
                                            <table class="table table-bordered table-hover" ng-if="itemlist.length >=1">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th>SL NO</th>
                                                        <th>Product Name</th>
                                                        <th>H.S. CODE</th>
                                                        <th>Quantity</th>
                                                        <th>Unit Price</th>
                                                        <th>Total Amount($USD)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <tr ng-repeat="item in itemlist">
                                                    <td class="text-center"><% $index+1 %></td>
                                                    <td class="checkbox">
                                                        <label class="i-checks">
                                                            <input type="checkbox" ng-init="checked[$index] = true" ng-model="checked[$index]"><% item.product.name %>
                                                        </label>
                                                    </td>
                                                    <td><% item.product.hs_code %><input ng-disabled="!checked[$index]" type="hidden" class="form-control" name="items[<% $index %>][product_id]" value="<% item.product_id %>"></td>
                                                    <td><input ng-disabled="!checked[$index]" ng-model="quantity[$index]" required ng-init="quantity[$index]=number(item.quantity)" class="form-control input-sm" type="number" name="items[<% $index %>][quantity]"></td>
                                                    <td><input ng-disabled="!checked[$index]" ng-model="unit_price[$index]" required ng-init="unit_price[$index]=number(item.unit_price)" class="form-control input-sm" type="number" name="items[<% $index %>][unit_price]"></td>
                                                    <td>
                                                    <span ng-if="quantity[$index]*unit_price[$index] "><% total[$index] = quantity[$index]*unit_price[$index] %></span>
                                                    <span ng-if="!(quantity[$index]*unit_price[$index] )">0</span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                                <tfoot class="font-bold">
                                                    {{-- <tr>
                                                        <td colspan="5">Sub Total</td>
                                                        <td>520</td>

                                                        <td colspan="2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5">Add freight</td>
                                                        <td>520</td>

                                                        <td colspan="2"></td>
                                                    </tr> --}}
                                                    <tr>
                                                        <td colspan="5">Grand Total</td>

                                                        <td colspan="1"><% grandSum(total) %></td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td colspan="5">Amount in Word</td>
                                                        <td>one thousand five hundred </td>

                                                        <td colspan="2"></td>
                                                    </tr> --}}
                                                </tfoot>
                                            </table>
                                        </div>
                            </fieldset>

                            <fieldset class="m-t-20">
                                <legend>Table of Terms and Conditions:</legend>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                     {{ BootForm::select('port_of_loading_port_id', 'Port of Loading', $port_list, null, ['class'=>'form-control input-sm select2', 'ng-model'=>'port_of_loading_port_id', 'required','data-popup'=> route('port.index')]) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('port_of_discharge_port_id', 'Port of Discharge', $port_list, null, ['class'=>'form-control input-sm select2', 'ng-model'=>'port_of_discharge_port_id', 'required','data-popup'=> route('port.index')]) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::select('final_destination_country_id', 'Country of Final Destination', $country_list, null, ['class'=>'form-control input-sm select2', 'ng-model'=>'final_destination_country_id', 'required','data-popup'=> route('country.index')]) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::select('final_destination_city_id', 'Final Destination', $city_list, null, ['class'=>'form-control input-sm select2', 'ng-model'=>'final_destination_city_id', 'required','data-popup'=> route('country.index')]) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::select('origin_of_goods_country_id', 'Country of Origin of Goods', $country_list, null, ['class'=>'form-control input-sm select2', 'ng-model'=>'origin_of_goods_country_id', 'required','data-popup'=> route('country.index')]) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::select('shipment_allow', 'Shipment Allow', ["Multi shipment"=>'Multi shipment','Partial'=>'Partial'], null, ['class'=>'form-control input-sm select2', 'ng-model'=>'shipment_allow', 'required']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::select('payment_type', 'Payment Type', ['Cash'=>'Cash'], null, ['class'=>'form-control input-sm select2', 'ng-model'=>'payment_type', 'required']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::select('pre_carriage_by', 'Pre Carriage By', ['Ship'=>'Ship','Air'=>'Air'], null, ['class'=>'form-control input-sm select2', 'ng-model'=>'pre_carriage_by', 'required']) }}
                                    </div>
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
        $scope.total = [];
        $scope.searchPO = function () {
            $scope.itemlist = [];
            $scope.addToItemList($scope.po_id.join());
        }
        $scope.addToItemList = function(id){
            let url = "{{URL::to('get-po')}}/" + id;
            $http.get(url)
                    .then(function(response) {
                        $scope.itemlist = response.data.items;
                        $scope.port_of_loading_port_id = response.data.last_po.port_of_loading_port_id.toString();
                        $scope.port_of_discharge_port_id = response.data.last_po.port_of_discharge_port_id.toString();
                        $scope.final_destination_country_id = response.data.last_po.final_destination_country_id.toString();
                        $scope.final_destination_city_id = response.data.last_po.final_destination_city_id.toString();
                        $scope.origin_of_goods_country_id = response.data.last_po.origin_of_goods_country_id.toString();
                        $scope.shipment_allow = response.data.last_po.shipment_allow;
                        $scope.payment_type = response.data.last_po.payment_type;
                        $scope.pre_carriage_by = response.data.last_po.pre_carriage_by;
                    });
        }
        $scope.removeItem = function(index){
            $scope.itemlist.splice(index);
        }
        $scope.number = function (str) {
            return parseFloat(str);
        }
        $scope.sum = function (arr) {
        var sum = 0;
        for (var i = 0; i < arr.length; i++) {
          sum += parseFloat(arr[i]);
        }
        return sum;
      }
      $scope.grandSum=function($array){
        var sum = 0;
            for(i=0; i<$array.length; i++){
                sum += $array[i];
            }
            return sum;
      }
    });
</script>
@endsection
