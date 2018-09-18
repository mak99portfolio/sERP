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
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" ng-controller="myCtrl">
                        <br />
                        <form class="form-horizontal form-label-left" action="{{route('purchase-order.store')}}" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Requisition No.</label>
                                        <select data-placeholder="Select Req No" multiple class="form-control input-sm select2" name="requisition_no" ng-model="req_id" ng-change="searchReqNo()">
                                            <option></option>
                                            @foreach($requisition_list as $item)
                                            <option value="{{$item->id}}">{{$item->requisition_no}}</option>
                                            @endforeach
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
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    {{ BootForm::text('subject','Subject', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    {{ BootForm::text('letter_header','Letter Header', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive m-t-15">
                                    <table class="table table-bordered table-hover" ng-if="itemlist.length >=1">
                                            <thead class="bg-default">
                                                <tr>
                                                    <th colspan="8">Product Table</th>
                                                </tr>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Product Name</th>
                                                    <th>UOM</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Price</th>
                                                    <th>Total Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="item in itemlist">
                                                    <td class="text-center"><% $index+1 %><input type="hidden" class="form-control" name="items[<% $index %>][product_id]" value="<% item.product_id %>"></td>
                                                    <td class="checkbox">
                                                        <label class="i-checks">
                                                            <input type="checkbox" ng-init="checked[$index] = true" ng-model="checked[$index]"><% item.name %>
                                                        </label>
                                                    </td>
                                                    <td><% item.uom %></td>
                                                    <td><input ng-disabled="!checked[$index]" ng-model="quantity[$index]" class="form-control input-sm" type="number" name="items[<% $index %>][quantity]"></td>
                                                    <td><input ng-disabled="!checked[$index]" ng-model="unit_price[$index]" class="form-control input-sm" type="number" name="items[<% $index %>][unit_price]"></td>
                                                    <td>
                                                    <% quantity[$index]*unit_price[$index] %>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <!-- <tfoot class="font-bold">
                                                <tr>
                                                    <td colspan="3">Total</td>
                                                    <td>324</td>
                                                    <td>324</td>

                                                    <td colspan="1"></td>
                                                </tr>
                                            </tfoot> -->
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
<script src="{{asset('assets/vendors/jquery-ui/jquery-ui.js')}}"></script>
<script>
    var app = angular.module('myApp', [], function($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        });
    app.controller('myCtrl', function($scope, $http) {
        
        $scope.itemlist = [];
        $scope.searchReqNo = function () {
            $scope.itemlist = [];
            for(i=0; i<$scope.req_id.length; i++){
                $scope.addToItemList($scope.req_id[i]);
            }
        }
        $scope.addToItemList = function(id){
            let url = "{{URL::to('procurement/get-requisition')}}/" + id;
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
