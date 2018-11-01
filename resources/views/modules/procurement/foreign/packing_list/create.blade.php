@extends('layout')
@section('title', 'Packing List')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Procurement</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        {{-- Content here --}}
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" ng-app="myApp">
                    <div class="x_title">
                        <h2>Packing List</h2>
                        <a href="{{route('packing-list.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> Packing List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" ng-controller="myCtrl">
                        <br />
                        @include("partials/flash_msg")
                        <form class="form-horizontal form-label-left" action="{{route('packing-list.store')}}" method="POST" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item">
                                    <div class="form-group">
                                        <label>Commercial Invoice No.</label>
                                        <select class="form-control input-sm select2" name="commercial_invoice_id" ng-model="commercial_invoice_id" ng-change="getCi()">
                                            <option value="">--Select Commercial Invoice No--</option>
                                            @foreach($ci_list as $item)
                                            <option value="{{$item->id}}">{{$item->commercial_invoice_no}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('commercial_invoice_date','Commercial Invoice Date', null, ['class'=>'form-control input-sm', 'ng-model'=>'commercial_invoice_date','readonly'=>'readonly']) }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('letter_of_credit_no','LC No', null, ['class'=>'form-control input-sm', 'ng-model'=>'letter_of_credit_no','readonly'=>'readonly']) }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('letter_of_credit_date','LC Date', null, ['class'=>'form-control input-sm', 'ng-model'=>'letter_of_credit_date','readonly'=>'readonly']) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive m-t-15">
                                        <table class="table table-bordered" ng-if="piinfo.length>0">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th width="30px">#</th>
                                                    <th>PI No</th>
                                                    <th>PI Date</th>
                                                    <th>Customer Code</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="info in piinfo">
                                                    <td><% $index+1 %></td>
                                                    <td><%info.proforma_invoice_no%></td>
                                                    <td><%info.proforma_invoice_date%></td>
                                                    <td><%info.customer_code%></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default m-t-15">
                                        <div class="panel-heading">Benefeciary Bank Info</div>
                                        <div class="panel-body">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::text('beneficiary_ac_no','Account No', null, ['class'=>'form-control input-sm', 'ng-model'=>'beneficiary_ac_no','readonly'=>'readonly']) }}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::text('beneficiary_ac_name','Account Name', null, ['class'=>'form-control input-sm', 'ng-model'=>'beneficiary_ac_name','readonly'=>'readonly']) }}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::text('beneficiary_bank_name','Bank Name', null, ['class'=>'form-control input-sm', 'ng-model'=>'beneficiary_bank_name','readonly'=>'readonly']) }}
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::text('beneficiary_branch_name','Bank Branch Name',null,['class'=>'form-control input-sm', 'ng-model'=>'beneficiary_branch_name','readonly'=>'readonly']) }}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('vessel_no','Vessel No / Flight No', null, ['class'=>'form-control input-sm','readonly'=>'readonly', 'ng-model'=>'vessel_no']) }}
                                </div>
                               
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <fieldset class="m-t-20">
                                        <legend>Table of Terms and Conditions:</legend>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">    
                                                {{ BootForm::text('port_of_loading_port_name', 'Port of Loading', null, ['class'=>'form-control input-sm','readonly'=>'readonly', 'ng-model'=>'port_of_loading_port_name']) }}   
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">    
                                                {{ BootForm::text('port_of_discharge_port_name', 'Port of Discharge', null, ['class'=>'form-control input-sm','readonly'=>'readonly', 'ng-model'=>'port_of_discharge_port_name']) }}   
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">    
                                                {{ BootForm::text('destination_country_name', 'Country of Final Destination', null, ['class'=>'form-control input-sm','readonly'=>'readonly', 'ng-model'=>'destination_country_name']) }}   
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">    

                                                {{ BootForm::text('destination_city_id','Final Destination', null, ['class'=>'form-control input-sm','readonly'=>'readonly', 'ng-model'=>'destination_city_name']) }}

                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">    
                                                {{ BootForm::text('country_goods_country_id','Country of Origin of Goods', null, ['class'=>'form-control input-sm','readonly'=>'readonly', 'ng-model'=>'country_goods_country_name']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">    
                                                {{ BootForm::text('exporter','Exporter', null, ['class'=>'form-control input-sm','readonly'=>'readonly', 'ng-model'=>'vendor_name']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">    
                                                {{ BootForm::select('currency', 'Currency', ['Dollar'=>'Dollar'], null, ['class'=>'form-control input-sm select2']) }}   
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Notes</label>
                                        <textarea name="notes" class="form-control" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" ng-if="itemlist.length > 0">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th colspan="5">Packing List table</th>
                                                </tr>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Per Unit Weight</th>
                                                    <th>Total Weight</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="item in itemlist">
                                                    <th><% $index+1 %> <input  value="<%item.product_id%>"type="hidden" name="items[<%$index%>][product_id]"></th>
                                                    <td class=""> <% item.name %></td>
                                                    <td>
                                                        <input type="hidden" ng-model="max_quantity[$index]" ng-init="max_quantity[$index]=item.quantity">
                                                        <input ng-model="quantity[$index]" ng-init="quantity[$index] = item.quantity" type="number" name="items[<%$index%>][quantity]" ng-change="quantityValidate($index)" class="form-control input-sm">
                                                    </td>
                                                    <td>
                                                        <input ng-model="per_unit_weight[$index]" ng-init="per_unit_weight[$index] = item.per_unit_weight" type="number" name="items[<%$index%>][per_unit_weight]" class="form-control input-sm">
                                                    </td>
                                                    <td>
                                                        <input ng-change="netSum()" ng-model="amount[$index]" ng-value="amount[$index]=quantity[$index]*per_unit_weight[$index]" type="text" class="form-control input-sm" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-right">Net Total =</td>
                                                    <td>
                                                    <span ng-if="sum(amount)"><% sum(amount) %></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-right">Gross Total =</td>
                                                    <td><input type="text" name="gross_total" class="form-control input-sm"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <br />
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Save</button>
                                        <a href="{{route('packing-list.index')}}" class="btn btn-default">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        {{--end Content here --}}
    </div>
</div>
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
        $scope.per_unit_weight = [];
        $scope.total_weight = [];
        $scope.amount = [];
    
    $scope.getCi = function () {
    //   alert($scope.commercial_invoice_id);
    $scope.itemlist = [];  
    $scope.piinfo = [];
    $scope.addToItemList($scope.commercial_invoice_id);
    }
    $scope.getLc = function () {
    $scope.itemlist = [];
    $scope.addToItemList($scope.letter_of_credit_id);
    }
    $scope.addToItemList = function(id){
    let url = "{{URL::to('get-ci')}}/" + id;
    $http.get(url)
            .then(function(response) {
            angular.forEach(response.data.items, function(value, key) {
            $scope.itemlist.push(value);
            });
            angular.forEach(response.data.pilist, function(value, key) {
                            $scope.piinfo.push(value);
                        });
            $scope.port_of_loading_port_name = response.data.port_of_loading_port_name;
            $scope.port_of_discharge_port_name = response.data.port_of_discharge_port_name;
            $scope.destination_city_name = response.data.destination_city_name;
            $scope.country_goods_country_name = response.data.country_goods_country_name;
            $scope.destination_country_name = response.data.destination_country_name;
            $scope.letter_of_credit_no = response.data.letter_of_credit_no;
            $scope.letter_of_credit_date = response.data.letter_of_credit_date;
            $scope.commercial_invoice_date = response.data.commercial_invoice_date;
            $scope.bill_of_lading_no = response.data.bill_of_lading_no;
            $scope.bill_of_lading_date = response.data.bill_of_lading_date;
            $scope.vessel_no = response.data.vessel_no;
            $scope.vendor_name = response.data.vendor_name;
            $scope.container_no = response.data.container_no;
            $scope.beneficiary_ac_no = response.data.beneficiary_ac_no;
            $scope.beneficiary_ac_name = response.data.beneficiary_ac_name;
            $scope.beneficiary_bank_name = response.data.beneficiary_bank_name;
            $scope.beneficiary_branch_name = response.data.beneficiary_branch_name;
            console.log($scope.piinfo);
            });
    }
    $scope.sum = function($arr){
            var sum = 0;
            for(i=0; i<$arr.length; i++){
                sum += $arr[i];
            }
            return sum;
        }
        $scope.quantityValidate = function(index){
            if($scope.quantity[index] > $scope.max_quantity[index] ){
                $scope.quantity[index] = $scope.max_quantity[index] ;
            }
            if($scope.quantity[index]<1){
                $scope.quantity[index] = 1;
            }

        }
    
    $scope.netTotal = function(){
        var sum = 0;
//        colsole.log($scope.amount);
//        for(i=0; i<$scope.amount.length; i++){
//            sum += $scope.amount[i];
//        }
        $scope.net_total = sum;
    }
    });
</script>
@endsection