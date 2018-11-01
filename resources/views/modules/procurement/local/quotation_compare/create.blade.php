@extends('layout')
@section('title', 'Quotation Compare')
@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel" ng-app="myApp">
                <div class="x_title">
                    <h2>Quotation Compare</h2>
                    <a href="{{ route('quotation-compare.index') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list" aria-hidden="true"></i> Quotation Compare List</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" ng-controller="myCtrl">
                    @include('partials/flash_msg')
                    <form class="form-horizontal form-label-left input_mask" action="{{ route('quotation-compare.store') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Date Range</label>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                            <input type="text" name="reservation" id="reservation" class="form-control input-sm" ng-model="date_range" ng-change="searchReq()"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Requisition No</label>
                                    <select name="local_requisition_id" ng-model="local_requisition_id" class="form-control input-sm select2" data-placeholder="Select Requisition" ng-change="searchQuotation()">
                                        <option value=""></option>
                                        <option value="<% req.id %>" ng-repeat="req in requisition_list"><% req.requisition_no %></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-if="itemlist.length > 0">
                                <div class="table-responsive m-t-15">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="25">#</th>
                                                <th>Product Name</th>
                                                <th ng-repeat="vendor in vendorlist"><% vendor.vendor_name %></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="item in itemlist">
                                                <td><% $index+1 %></td>
                                                <td><% item.product_name %></td>
                                                <td ng-repeat="unit_price in item.unit_prices track by $index">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" class="flat" name="iCheck"> <% unit_price %>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Total</td>
                                                <td ng-repeat="vendor in vendorlist"><% vendor.total_price %></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Approve</button>
                                    <a href="{{ route('quotation-compare.index') }}" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
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

        $scope.requisition_list = [];
        $scope.quotations = [];

        $scope.searchReq = function(){
            // var from_date = new Date($scope.date_range.split(' - ')[0]).getMonth();
            let url = "{{ URL::to('get-local-requisition-by-date-range') }}?date_range=" + $scope.date_range;
            $http.get(url)
                    .then(function(response) {
                        $scope.requisition_list = response.data.requisitions;
                    });
        }
        $scope.searchQuotation = function(){
            let url = "{{ URL::to('get-local-requisition-items-from-quotation') }}/" + $scope.local_requisition_id;
            $http.get(url)
                    .then(function(response) {
                        $scope.itemlist = response.data.items;
                        $scope.vendorlist = response.data.vendors;
                    });
        }


    });
</script>
@endsection
