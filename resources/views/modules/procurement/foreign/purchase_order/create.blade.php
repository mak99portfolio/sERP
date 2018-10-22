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
                <div class="x_panel" ng-app="myApp">
                    <div class="x_title">
                        <h2>Foreign Purchase Order</h2>
                        <a href="{{route('purchase-order.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Foreign Purchase Order List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" ng-controller="myCtrl">
                        <br />
                        <form class="form-horizontal form-label-left" name="po" action="{{route('purchase-order.store')}}" method="POST" autocomplete="off">
                        @csrf
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::select('vendor_id', 'Vendor', $vendor_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required', 'data-popup'=> route('vendor.index')]) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('requisition_date','Requisition date', \Carbon\Carbon::now()->format('d-m-Y'), ['class'=>'form-control input-sm' ,'required', 'readonly']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                        {{ BootForm::text('purchase_order_date','Purchase Order date', null, ['class'=>'form-control input-sm' ,'required']) }}
                                </div>
                            </div>
                            <fieldset class="m-t-20">
                                <legend>Table of Terms and Conditions:</legend>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::select('port_of_loading_port_id', 'Port of Loading', $port_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required','ng-model'=>'port_of_loading_port_id', 'ng-change'=>'validateLoading()','data-popup'=> route('port.index')]) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::select('port_of_discharge_port_id', 'Port of Discharge', $port_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required','ng-model'=>'port_of_discharge_port_id', 'ng-change'=>'validateDischarge()' ,'data-popup'=> route('port.index')]) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::select('final_destination_country_id', 'Country of Final Destination', $country_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required', 'data-popup'=> route('country.index')]) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::select('final_destination_city_id', 'Final Destination', $city_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required', 'data-popup'=> route('city.index')]) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::select('origin_of_goods_country_id', 'Country of Origin of Goods', $country_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required', 'data-popup'=> route('country.index')]) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::select('shipment_allow', 'Shipment Allow', ['Multi shipment'=>'Multi shipment','Partial'=>'Partial'], null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::select('payment_type', 'Payment Type', ['Cash'=>'Cash'], null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::select('pre_carriage_by', 'Pre Carriage By', ['Ship'=>'Ship','Air'=>'Air'], null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required']) }}
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    {{ BootForm::text('subject','Subject', empty($last_purchase_order->subject)?null:$last_purchase_order->subject, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    {{ BootForm::text('letter_header','Letter Header', empty($last_purchase_order->letter_header)?null:$last_purchase_order->letter_header, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive m-t-15">
                                    <div class="col-sm-6 col-sm-offset-3">
                                         <div class="well">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Select Req. No</span>
                                                    <select data-placeholder="Select Req No" multiple required class="form-control input-sm select2" style="width: 100%" name="foreign_requisition_ids[]" ng-model="req_id" ng-change="searchReqNo()">
                                                        <option value=""></option>
                                                        @foreach($requisition_list as $item)
                                                        <option value="{{$item->id}}">{{$item->requisition_no}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                        </div>
                                    </div>
                                    <table class="table table-bordered table-hover" ng-if="itemlist.length >=1">
                                            <thead class="bg-default">
                                                <tr>
                                                    <th colspan="8">Product Table</th>
                                                </tr>
                                                <tr>
                                                    <th>Req No</th>
                                                    <th>Product Name</th>
                                                    <th>Req Qty</th>
                                                    <th>Quantity</th>
                                                    <th>UOM</th>
                                                    {{-- <th>Unit Price</th>
                                                    <th class="text-center">Total Amount</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody ng-repeat="reqlist in itemlist">
                                                <tr ng-repeat="item in reqlist">
                                                    <td class="text-center" valign="middle" ng-if="$index==0" rowspan="<% reqlist.length %>"><% item.requisition_no %></td>
                                                    <td class="checkbox">
                                                        <label class="control-label">
                                                            <input type="checkbox" ng-init="checked[$parent.$index][$index] = true" ng-model="checked[$parent.$index][$index]"><% item.product_name %>
                                                            <input type="hidden" ng-disabled="!checked[$parent.$index][$index]" class="form-control" name="items[<% $parent.$index %>][<% $index %>][foreign_requisition_id]" value="<% item.requisition_id %>">
                                                            <input type="hidden" ng-disabled="!checked[$parent.$index][$index]" class="form-control" name="items[<% $parent.$index %>][<% $index %>][product_id]" value="<% item.product_id %>">
                                                        </label>
                                                    </td>
                                                    <td><% item.quantity %></td>
                                                    <td>
                                                        <input type="hidden" ng-model="max_quantity[$parent.$index][$index]" ng-init="max_quantity[$parent.$index][$index]=item.quantity">
                                                        <input ng-disabled="!checked[$parent.$index][$index]" ng-model="quantity[$parent.$index][$index]" ng-init="quantity[$parent.$index][$index]=item.quantity" ng-change = "quantityValidate($parent.$index, $index)" class="form-control input-sm" required type="number" min="0" name="items[<% $parent.$index %>][<% $index %>][quantity]">
                                                    </td>
                                                    <td><% item.uom %></td>
                                                    {{-- <td><input ng-disabled="!checked[$parent.$index][$index]" ng-model="unit_price[$parent.$index][$index]" ng-init="unit_price[$parent.$index][$index]=0" class="form-control input-sm" type="number" name="items[<% $parent.$index %>][<% $index %>][unit_price]" required></td>
                                                    <td class="text-right">
                                                    <span ng-if="quantity[$parent.$index][$index]*unit_price[$parent.$index][$index]"><% amount[$parent.$index][$index] = quantity[$parent.$index][$index]*unit_price[$parent.$index][$index] %></span>
                                                    <span ng-if="!(quantity[$parent.$index][$index]*unit_price[$parent.$index][$index])">0</span>
                                                    </td> --}}
                                                </tr>
                                            </tbody>
                                            {{-- <tfoot class="font-bold">
                                                <tr>
                                                    <td colspan="6" class="text-right">Total</td>
                                                    <td colspan="1" class="text-right"><% sum(amount) %></td>
                                                </tr>
                                            </tfoot> --}}
                                    </table>
                                </div>
                                </div>
                                 <!--end table-->
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    {{ BootForm::text('letter_footer','Letter Footer', empty($last_purchase_order->letter_footer)?null:$last_purchase_order->letter_footer, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        {{ BootForm::textarea('notes','Notes', empty($last_purchase_order->notes)?null:$last_purchase_order->notes, ['class'=>'form-control input-sm','rows'=>2]) }}
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">

                                        <br />
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-sm">Save</button>
                                            <a class="btn btn-default btn-sm" href="{{route('purchase-order.index')}}">Cancel</a>
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
    var app = angular.module('myApp', [], function($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        });
    app.controller('myCtrl', function($scope, $http) {

        $scope.itemlist = [];
        $scope.quantity = [];
        $scope.max_quantity = [];
        $scope.unit_price = [];
        $scope.amount = [];
        $scope.searchReqNo = function () {
            $scope.itemlist = [];
            $scope.addToItemList($scope.req_id.join());
        }
        $scope.addToItemList = function(ids){
            let url = "{{URL::to('get-foreign-requisition')}}/" + ids;
            $http.get(url)
                    .then(function(response) {
                        $scope.itemlist = response.data;
                        console.log($scope.quantity);
                    });
        }
        $scope.sum = function($arr){
            var sum = 0;
            for(i=0; i<$arr.length; i++){
                sum += $arr[i];
            }
            return sum;
        }

        $scope.quantityValidate = function(parentIndex, index){
            if($scope.quantity[parentIndex][index] > $scope.max_quantity[parentIndex][index] ){
                $scope.quantity[parentIndex][index] = $scope.max_quantity[parentIndex][index] ;
            }
            if($scope.quantity[index]<1){
                $scope.quantity[index] = 1;
            }
        }
        
        $scope.validateLoading = function(){
            if($scope.port_of_loading_port_id == $scope.port_of_discharge_port_id){
                $scope.port_of_loading_port_id = "";
                $scope.warning('Port of Loading and Port of discharge must be different!');
            }else{
                PNotify.removeAll();
            }
        }
        $scope.validateDischarge = function(){
            if($scope.port_of_discharge_port_id == $scope.port_of_loading_port_id){
                $scope.port_of_discharge_port_id = "";
                $scope.warning('Port of Loading and Port of discharge must be different!');
            }else{
                PNotify.removeAll();
            }
        }
        $scope.warning = function(msg){
            var data = {
                'title': 'Warning!',
                'text': msg,
                'type': 'notice',
                'styling': 'bootstrap3',
            };
            PNotify.removeAll();
            new PNotify(data);
        }

    });

    $(function(){
        $('#purchase_order_date').daterangepicker({
            singleDatePicker: true,
            singleClasses: "picker_3",
            minDate: moment().add(1,'days'),
            locale: {
                format: 'DD-MM-YYYY',
            }
        });
    });
</script>
@endsection
