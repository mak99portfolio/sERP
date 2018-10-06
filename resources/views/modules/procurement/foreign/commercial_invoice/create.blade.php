@extends('layout')
@section('title', 'Commercial Invoice')
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
                        <h2>Commercial Invoice</h2>
                        <a href="{{route('commercial-invoice.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> See Commercial Invoice List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" ng-controller="myCtrl">
                        <br />
                        @include("partials/flash_msg")
                        <form class="form-horizontal form-label-left" autocomplete="off" action="{{route('commercial-invoice.store')}}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('commercial_invoice_no','Commercial Invoice No', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('date','Date', null, ['class'=>'form-control input-sm datepicker']) }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                     <div class="form-group">
                                        <label>LC No.</label>
                                        <select class="form-control input-sm select2" name="letter_of_credit_id" ng-model="letter_of_credit_id" ng-change="getLc()">
                                            <option value="">--Select LC No--</option>
                                            @foreach($lc_list as $item)
                                            <option value="{{$item->id}}">{{$item->letter_of_credit_no}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('letter_of_credit_date','LC Date', null, ['class'=>'form-control input-sm', 'ng-model'=>'letter_of_credit_date','readonly'=>'readonly']) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                        <table class="table table-bordered" ng-if="piinfo.length>0">
                                            <thead class="bg-primary">

                                                <tr>
                                                    <th>#</th>
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
                                <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('letter_of_credit_date','PI Date', null, ['class'=>'form-control input-sm', 'ng-model'=>'letter_of_credit_date','readonly'=>'readonly']) }}
                                </div> -->
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default m-t-15">
                                        <div class="panel-heading">Beneficiary Bank Info</div>
                                        <div class="panel-body">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('beneficiary_ac_no','Account No', null, ['class'=>'form-control input-sm', 'ng-model'=>'beneficiary_ac_no','readonly'=>'readonly']) }}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('beneficiary_ac_name','Account Name', null, ['class'=>'form-control input-sm', 'ng-model'=>'beneficiary_ac_name','readonly'=>'readonly']) }}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('beneficiary_bank_name','Bank Name', null, ['class'=>'form-control input-sm', 'ng-model'=>'beneficiary_bank_name','readonly'=>'readonly']) }}
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('beneficiary_branch_name','Bank Branch',null,['class'=>'form-control input-sm', 'ng-model'=>'beneficiary_branch_name','readonly'=>'readonly']) }}
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('bill_of_lading_no','Bill Of Lading No', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('bill_of_lading_date','Bill Of Lading Date', null, ['class'=>'form-control input-sm datepicker']) }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('vessel_no','Vessel No / Flight No', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('container_no','Container No', null, ['class'=>'form-control input-sm']) }}
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <fieldset class="m-t-20">
                                        <legend>Table of Terms and Conditions:</legend>
                                        <div class="row">

                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::select('port_of_loading_port_id', 'Port of Loading', $port_list, null, ['class'=>'form-control input-sm select2', 'ng-model'=>'port_of_loading_port_id']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::select('port_of_discharge_port_id', 'Port of Discharge', $port_list, null, ['class'=>'form-control input-sm select2', 'ng-model'=>'port_of_discharge_port_id']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::select('final_destination_country_id', 'Country of Final Destination', $country_list, null, ['class'=>'form-control input-sm select2', 'ng-model'=>'final_destination_country_id']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::select('final_destination_city_id', 'Final Destination', $city_list, null, ['class'=>'form-control input-sm select2', 'ng-model'=>'final_destination_city_id']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::select('origin_of_goods_country_id', 'Country of Origin of Goods', $country_list, null, ['class'=>'form-control input-sm select2', 'ng-model'=>'origin_of_goods_country_id']) }}
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                    {{ BootForm::textarea('notes','Notes',null,['class'=>'form-control input-sm','rows'=>'2']) }}

                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" ng-if="itemlist.length>0">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th colspan="5">CI Product table</th>
                                                </tr>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Product Name</th>
                                                    <th>Qnantity</th>
                                                    <th>Unit Price Used ($)</th>
                                                    <th>Amount ($)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="item in itemlist">
                                                    <th><% $index+1 %> <input  value="<%item.product_id%>"type="hidden" name="items[<%$index%>][product_id]"></th>
                                                     <td class="checkbox">
                                                        <label class="i-checks">
                                                            <input type="checkbox" ng-init="checked[$index] = true" ng-model="checked[$index]"><% item.name %>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <input ng-disabled="!checked[$index]" ng-model="quantity[$index]" ng-init="quantity[$index]=item.quantity" type="number" name="items[<%$index%>][quantity]" class="form-control input-sm">
                                                    </td>
                                                    <td>
                                                        <input ng-disabled="!checked[$index]" ng-model="unit_price[$index]" ng-init="unit_price[$index]=item.unit_price" type="text" name="items[<%$index%>][unit_price]" class="form-control input-sm" readonly>
                                                    </td>
                                                    <td>
                                                        <input ng-disabled="!checked[$index]" ng-model="amount[$index]" ng-value="amount[$index]=quantity[$index]*unit_price[$index]" type="text" class="form-control input-sm" disabled>
                                                    </td>
                                                </tr>
                                               <tr>
                                                    <td colspan="4" class="text-right">Sub Total =</td>
                                                    <td><%sub_total = sum(amount) %></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-right">Add Freight =</td>
                                                    <td> <input type="number" class="form-control input-sm" name="freight" ng-model="freight"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-right">Grand Total =</td>
                                                    <td> <% sub_total+freight %> </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                        <a href="{{route('commercial-invoice.index')}}" class="btn btn-default btn-sm">Cancel</a>
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
        $scope.unit_price = [];
        $scope.amount = [];
        $scope.freight = 0;
        $scope.getLc = function () {
            $scope.itemlist = [];
            $scope.piinfo = [];
            $scope.addToItemList($scope.letter_of_credit_id);
        }
        $scope.addToItemList = function(id){
            let url = "{{URL::to('get-lc')}}/" + id;
            $http.get(url)
                    .then(function(response) {
                        angular.forEach(response.data.items, function(value, key) {
                            $scope.itemlist.push(value);
                        });
                        angular.forEach(response.data.pi.pi_list, function(value, key) {
                            $scope.piinfo.push(value);
                        });
                        $scope.letter_of_credit_date = response.data.letter_of_credit_date;
                        $scope.beneficiary_ac_no = response.data.beneficiary_ac_no;
                        $scope.beneficiary_ac_name = response.data.beneficiary_ac_name;
                        $scope.beneficiary_bank_name = response.data.beneficiary_bank_name;
                        $scope.beneficiary_branch_name = response.data.beneficiary_branch_name;
                        $scope.port_of_loading_port_id = response.data.pi.pi_terms.port_of_loading_port_id.toString();
                        $scope.port_of_discharge_port_id = response.data.pi.pi_terms.port_of_discharge_port_id.toString();
                        $scope.final_destination_country_id = response.data.pi.pi_terms.final_destination_country_id.toString();
                        $scope.final_destination_city_id = response.data.pi.pi_terms.final_destination_city_id.toString();
                        $scope.origin_of_goods_country_id = response.data.pi.pi_terms.origin_of_goods_country_id.toString();
                        console.log($scope.piinfo);
                    });
        }
        $scope.removeItem = function(index){
            $scope.itemlist.splice(index);
        }

        $scope.sum = function($arr){
            var sum = 0;
            for(i=0; i<$arr.length; i++){
                sum += $arr[i];
            }
            return sum;
        }
    });
</script>
@endsection
