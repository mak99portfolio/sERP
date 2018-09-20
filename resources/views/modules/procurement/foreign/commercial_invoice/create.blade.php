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
                        <form class="form-horizontal form-label-left" action="{{route('commercial-invoice.store')}}" method="POST">
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
                                        <select class="form-control input-sm" name="letter_of_credit_id" ng-model="letter_of_credit_id" ng-change="getLc()">
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
                                    {{ BootForm::text('bill_no','Bl No', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('bill_date','Bl Date', null, ['class'=>'form-control input-sm datepicker']) }}
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
                                                {{ BootForm::select('port_of_loading_port_id', 'Port of Loading', $port_list, null, ['class'=>'form-control input-sm']) }}   
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">    
                                                {{ BootForm::select('port_of_discharge_port_id', 'Port of Discharge', $port_list, null, ['class'=>'form-control input-sm']) }}   
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">    
                                                {{ BootForm::select('destination_country_id', 'Country of Final Destination', $country_list, null, ['class'=>'form-control input-sm']) }}   
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">    
                                                {{ BootForm::select('destination_city_id', 'Final Destination', $city_list, null, ['class'=>'form-control input-sm']) }}   
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">    
                                                {{ BootForm::select('country_goods_country_id', 'Country of Origin of Goods', $country_list, null, ['class'=>'form-control input-sm']) }}   
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                    {{ BootForm::textarea('notes','Notes',null,['class'=>'form-control input-sm','rows'=>'2']) }}

                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th colspan="5">CI Product table</th>
                                                </tr>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Product Name</th>
                                                    <th>Qnantity</th>
                                                    <th>Unit Price Used ($)</th>
                                                    <th>Amoiunt ($)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>1</th>
                                                    <td>sas</td>
                                                    <td>5</td>
                                                    <td>80</td>
                                                    <td>
                                                        <input type="text" name="amount" class="form-control input-sm">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-right">Sub Total =</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-right">Add Fright =</td>
                                                    <td> <input type="text" name="amount" class="form-control input-sm"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-right">Grand Total =</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-right">Amount In word =</td>
                                                    <td></td>
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
        $scope.getLc = function () {
            $scope.itemlist = [];
            $scope.addToItemList($scope.letter_of_credit_id);
        }
        $scope.addToItemList = function(id){
            let url = "{{URL::to('procurement/get-lc')}}/" + id;
            $http.get(url)
                    .then(function(response) {
                        angular.forEach(response.data.items, function(value, key) {
                            $scope.itemlist.push(value);
                        });
                        $scope.letter_of_credit_date = response.data.letter_of_credit_date;
                        $scope.beneficiary_ac_no = response.data.beneficiary_ac_no;
                        $scope.beneficiary_ac_name = response.data.beneficiary_ac_name;
                        $scope.beneficiary_bank_name = response.data.beneficiary_bank_name;
                        $scope.beneficiary_branch_name = response.data.beneficiary_branch_name;
                    });
        }
        $scope.removeItem = function(index){
            $scope.itemlist.splice(index);
        }
    });
</script>
@endsection