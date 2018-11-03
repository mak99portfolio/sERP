@extends('layout')
@section('title', 'Delivery Schedule')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
        <div class="x_panel" ng-app="myApp">
                <div class="x_title">
                    <h2>Delivery Schedule</h2>
                    <a href="{{ route('delivery-schedule.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> Delivery Schedule List</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" ng-controller="myCtrl">
                    <br />
                    @include('partials/flash_msg')
                    <form class="form-horizontal form-label-left" action="{{route('delivery-schedule.store')}}" method="POST" autocomplete="off">
                    @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::select('customer_id', 'Customer',$customer_list,null, ['class'=>'form-control input-sm select2','ng-model'=>"customer_id",'ng-change'=>"getSalesOrder()",'data-placeholder'=>"Select Customer"]) }}
                             </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Sales Order No</label>
                                    <select name="sales_order_id" id="" ng-change="getSalesOrderItems()" ng-model ="sales_order_id" class="form-control input-sm select2" data-placeholder="Select Sales Order">
                                        <option value=""></option>
                                        <option value="<% sales_order.sales_order_id %>" ng-repeat="sales_order in sales_order_list"><% sales_order.sales_order_no %></option>
                                    </select>
                                </div>
                             </div>
                            <div class="col-lg-12 col-sm-12 col-sm-12"  ng-if="itemlist.length > 0">
                                <div class="table-responsive m-t-20">
                                <table class="table table-bordered">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th width="25">#</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-center">Remaining Quantity</th>
                                                <th class="text-center">Delivery Quantity</th>
                                                <th class="text-center">Date</th>
                                                <th width="30">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="item in itemlist">
                                                <th><% $index+1 %> <input  value="<%item.product_id%>"type="hidden" name="items[<%$index%>][product_id]"></th>
                                                <td class=""> <% item.name %></td>
                                                <td class=""> <% item.total_quantity %><input ng-model ="total_quantity"  value="<%item.total_quantity%>"type="hidden" name="items[<%$index%>][total_quantity]"></td>
                                                <td class=""> <% item.total_quantity %></td>
                                                <td class="text-center"><input type="text" class="form-control input-sm"></td>
                                                <td class="text-center"><input type="text" id="date_expected" class="form-control input-sm datepicker"></td>
                                                <td class="text-center"><button type="button" class="btn btn-default btn-sm" title="Remove" ng-click="removeItem($index)"><i class="fa fa-trash text-danger"></i></button></td>
                                            </tr>
                                          
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    <button type="button" ng-click="add_delivery()" class="btn btn-default btn-sm" style="margin-top: 5px"><i class="fa fa-plus"></i> Add More</button>
                                 </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-sm-12">
                               
                            </div>
                            <div class="col-lg-12 col-sm-12 col-sm-12">
                                <div class="table-responsive m-t-20">
                                <table class="table table-bordered">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th width="25">#</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-center">Remaining Quantity</th>
                                                <th class="text-center">Delivery Quantity</th>
                                                <th class="text-center">Date</th>
                                                <th width="30">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>1</th>
                                                <td class="">Product 1</td>
                                                <td class="">12</td>
                                                <td class="">2</td>
                                                <td class="text-center">10</td>
                                                <td class="text-center">10/11/2018</td>
                                                <td class="text-center"><button type="button" class="btn btn-default btn-sm" title="Remove" ng-click="removeItem($index)"><i class="fa fa-trash text-danger"></i></button></td>
                                            </tr>
                                            <tr>
                                                <th>2</th>
                                                <td class="">Product 2</td>
                                                <td class="">12</td>
                                                <td class="">0</td>
                                                <td class="text-center">12</td>
                                                <td class="text-center">11/11/2018</td>
                                                <td class="text-center"><button type="button" class="btn btn-default btn-sm" title="Remove" ng-click="removeItem($index)"><i class="fa fa-trash text-danger"></i></button></td>
                                            </tr>
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-sm-12"  ng-if="previousitemlist.length > 0">
                                <div class="table-responsive m-t-20">
                                <h3>Previous Delivery</h3>
                                <table class="table table-bordered">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th width="25">#</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-center">Remaining Quantity</th>
                                                <th class="text-center">Delivery Quantity</th>
                                                <th class="text-center">Date</th>
                                                <th width="30">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr ng-repeat="item in previousitemlist">
                                                <th>1</th>
                                                <td class="">Product 1</td>
                                                <td class="">12</td>
                                                <td class="">2</td>
                                                <td class="text-center">10</td>
                                                <td class="text-center">10/11/2018</td>
                                                <td class="text-center"><button type="button" class="btn btn-default btn-sm" title="Remove" ng-click="removeItem($index)"><i class="fa fa-trash text-danger"></i></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                                    <a href="{{ route('delivery-schedule.index')}}" class="btn btn-default btn-sm">Cancel</a>
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
<script>
    var app = angular.module('myApp', [], function($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        });
    app.controller('myCtrl', function($scope, $http) {
        $scope.itemlist = [];
        $scope.previousitemlist = [];
        $scope.sales_order_list = [];
      


        $scope.getSalesOrder = function () {
          //  alert($scope.customer_id);
            $scope.itemlist = [];
            $scope.previousitemlist = [];
            let url = "{{URL::to('get-sales-order')}}/" + $scope.customer_id;
            $http.get(url)
                .then(function(response) {
                   // console.log(response.data.sales_order);
                    $scope.sales_order_list = response.data.sales_order;
            });
           
        }
        $scope.getSalesOrderItems = function () {
            $scope.delivery_list = [];  
            $scope.itemlist = [];
            $scope.previousitemlist = [];
            if($scope.sales_order_id){
                let url = "{{URL::to('get-sales-order-items')}}/" + $scope.sales_order_id;
          //   alert($scope.sales_order_id);
                $http.get(url)
                    .then(function(response) { 
                        console.log(response.data.items);
                        angular.forEach(response.data.items, function(value, key) {
                            $scope.itemlist.push(value);
                        });
                        angular.forEach(response.data.previous_items, function(value, key) {
                            $scope.previousitemlist.push(value);
                        });
                   
                });
            }else{
                $scope.itemlist = null;
            }
        }
       $scope.add_delivery = function(){
           var delivery = {};
             if(!$scope.customer_id){
                $scope.warning('Select Customer first');
                return;
            }else if(!$scope.sales_order_id){
                $scope.warning('Select Sales Order No');
                return;
            }else if(!$scope.total_quantity){
                $scope.warning('Insert Total Quantity');
                return;
            }else if($scope.payment_amount > $scope.available_amount){
                $scope.warning('Payment amount must be less than available amount');
                return;
            }
            console.log();
            delivery.payment_amount = $scope.payment_amount;
            delivery.payment_date = $scope.payment_date;
            $scope.delivery_list.push(delivery);
          
        }
        $scope.removeItem = function(index){
            $scope.itemlist.splice(index, 1);
            
        }
        $scope.warning = function(msg){
            var data = {
                'title': 'Warning!',
                'text': msg,
                'type': 'notice',
                'styling': 'bootstrap3',
            };
            new PNotify(data);
        }
        $scope.sum_of_property = function (items, prop) {
            if (items == null) {
                return 0;
            }
            return items.reduce(function (a, b) {
                return b[prop] == null ? a : a + b[prop];
            }, 0);
        };


      });

        $(function(){
        $('#date_expected').daterangepicker({
            singleDatePicker: true,
            singleClasses: "picker_3",
            minDate: moment().add(1, 'days'),
            locale: {
                format: 'DD-MM-YYYY',
            }
        });
    });
</script>
@endsection