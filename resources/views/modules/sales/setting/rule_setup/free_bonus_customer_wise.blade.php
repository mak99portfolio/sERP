@extends('layout')
@section('title', 'Rule Setup')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel" ng-app="myApp">
                <div class="x_title">
                    <h2>Rule Setup</h2>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" ng-controller="myCtrl">
                    <div class="col-xs-3">
                        <!-- Nav tabs -->
                        @include('modules.sales.setting.rule_setup.tabs')
                    </div>

                    <div class="col-xs-9">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <div class="x_title">
                                    <h2>Free/Bonus(Customer Wise)</h2>
                                    <button type="button" class="btn btn-sm btn-default btn-addon pull-right btn-form-toggle"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New</button>
                                    <div class="clearfix"></div>
                                </div>
                                <div id="form-area" style="display:none">
                                    {{ BootForm::horizontal(['model' => $free_bonus_customer_wise, 'store' => 'free-bonus-customer-wise.store', 'update' => 'free-bonus-customer-wise.update']) }}
                                        <div class="row">
                                            <div class="well">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 item">
                                                        {{ BootForm::select('customer_id', 'Customer', $customer_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;", 'data-placeholder'=>'Select Customer', 'required']) }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td colspan="5">
                                                                <div class="col-lg-12 ol-md-12 col-sm-12 col-xs-12">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            Search Product
                                                                        </span>
                                                                        <select class="form-control input-sm select2"  data-placeholder="Select Product" ng-model='product_id'>
                                                                            <option></option>
                                                                            @foreach ($product_list as $item)
                                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <span class="input-group-btn">
                                                                            <button class="btn btn-default btn-sm" type="button" ng-click="addItem()"><i class="fa fa-plus-circle fa-lg text-primary"></i></button>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr ng-show="itemlist.length > 0">
                                                            <th>Product Name</th>
                                                            <th>Type</th>
                                                            <th>Bonus</th>
                                                            <th>Active</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr ng-repeat="item in itemlist">
                                                            <td><% item.name %> <input type="hidden" name="items[<% $index %>][product_id]" value="<% item.id %>"></td>
                                                            <td>
                                                                <select name="items[<% $index %>][bonus_type]" ng-model="bonus_type[$index]" class="form-control input-sm" ng-init="bonus_type[$index] = 'fixed'">
                                                                    <option value="fixed">Fixed</option>
                                                                    <option value="ratio">Ratio</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center" style="width: 25%">
                                                                <div class="item">
                                                                    <input type="text" class="form-control input-sm" name="items[<% $index %>][bonus_value]" ng-if="bonus_type[$index] == 'fixed'" required>
                                                                </div>
                                                                <div class="input-group item" ng-if="bonus_type[$index] == 'ratio'">
                                                                    <input type="number" class="form-control input-sm" ng-model="free_quantity[$index]" placeholder="Free" required>
                                                                    <span class="input-group-addon">&ratio;</span>
                                                                    <input type="number" class="form-control input-sm" ng-model="quantity[$index]" min="1" placeholder="Quantity" required>
                                                                    <input type="hidden" value="<% free_quantity[$index]/quantity[$index] %>" name="items[<% $index %>][bonus_value]">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <label>
                                                                    <input type="checkbox" class="js-switch" checked name="items[<% $index %>][active]" value="1">
                                                                </label>
                                                            </td>
                                                            <td class="text-center"><button type="button" class="btn btn-danger btn-xs" ng-click="removeItem($index)"><i class="fa fa-close"></i></button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-show="itemlist.length > 0">
                                                <br />
                                                <div class="ln_solid"></div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                                                    <button type="button" class="btn btn-default btn-sm btn-form-toggle"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    {{ BootForm::close() }}
                                </div>
                                <div class="table-responsive m-t-30">
                                    <table class="table table-bordered table-hover">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th>#</th>
                                                <th>Customer Name</th>		
                                                <th>Product Name</th>		
                                                <th>Type</th>
                                                <th>Bonus</th>
                                                <th>Active</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($free_bonus_customer_wise_list as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->customer->name }}</td>
                                                <td>{{ $item->product->name }}</td>
                                                <td>{{ $item->bonus_type }}</td>
                                                <td>{{ $item->bonus_value }}</td>
                                                <td>{{ $item->active ? "active": "inactive" }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!--end table-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        $scope.bonus_type = [];
        $scope.free_quantity = [];
        $scope.quantity = [];
        $scope.addItem = function () {
            let url = "{{URL::to('get-product')}}/" + $scope.product_id;
                $http.get(url)
                        .then(function(response) {
                            $scope.itemlist.push(response.data);
                        });
            // $scope.itemlist.push(item);
        }
        $scope.removeItem = function(index){
            $scope.itemlist.splice(index,1);
            $scope.bonus_type.splice(index,1);
            $scope.free_quantity.splice(index,1);
            $scope.quantity.splice(index,1);
        }
        $scope.sum = function($arr){
            var sum = 0;
            for(i=0; i<$arr.length; i++){
                sum += $arr[i];
            }
            return sum;
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
        $('.btn-form-toggle').on('click', function(){
            $('#form-area').slideToggle('fast', function() {
                if ($(this).is(':visible')) {
                    $('.btn-form-toggle').html('<i class="fa fa-times" aria-hidden="true"></i> Close');               
                } else {
                    $('.btn-form-toggle').html('<i class="fa fa-plus-circle" aria-hidden="true"></i> Add New');                
                }        
            });
        });
    });
</script>
@endsection