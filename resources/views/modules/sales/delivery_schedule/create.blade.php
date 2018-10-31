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
                                                <td>01</td>
                                                <td class="text-center">Product 1</td>
                                                <td class="text-right">300</td>
                                                <td class="text-right">300</td>
                                                <td class="text-center"><input type="text" class="form-control input-sm"></td>
                                                <td class="text-center"><input type="text" id="date_expected" class="form-control input-sm datepicker"></td>
                                                <td class="text-center"><button type="button" class="btn btn-default btn-sm" title="Remove"><i class="fa fa-trash text-danger"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td>02</td>
                                                <td class="text-center">Product 2</td>
                                                <td class="text-right">320</td>
                                                <td class="text-right">320</td>
                                                <td class="text-center"><input type="text" class="form-control input-sm"></td>
                                                <td class="text-center"><input type="text" id="date_expected" class="form-control input-sm datepicker"></td>
                                                <td class="text-center"><button type="button" class="btn btn-default btn-sm" title="Remove"><i class="fa fa-trash text-danger"></i></button></td>
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
                                    <a href="{{ route('collection-schedule.index')}}" class="btn btn-default btn-sm">Cancel</a>
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
        $scope.payment_list = [];
        $scope.sales_order_list = [];
        $scope.total_amount = [];
        $scope.total_invoice_amount = 0;


        $scope.getSalesOrder = function () {
          //  alert($scope.customer_id);
            $scope.payment_list = [];
            let url = "{{URL::to('get-sales-order')}}/" + $scope.customer_id;
            $http.get(url)
                .then(function(response) {
                   // console.log(response.data.sales_order);
                    $scope.sales_order_list = response.data.sales_order;
            });
           
        }
        $scope.getSalesOrderItems = function () {
            $scope.payment_list = [];
            if($scope.sales_order_id){
                let url = "{{URL::to('get-sales-order-items')}}/" + $scope.sales_order_id;
          //   alert($scope.sales_order_id);
                $http.get(url)
                    .then(function(response) {
                        $scope.total_amount = response.data.total_amount;
                    
                });
            }else{
                $scope.total_amount = null;
            }
        }
       $scope.add_payment = function(){
           var payment = {};
             if(!$scope.customer_id){
                $scope.warning('Select Customer first');
                return;
            }else if(!$scope.sales_order_id){
                $scope.warning('Select Sales Order No');
                return;
            }else if(!$scope.payment_amount){
                $scope.warning('Insert Inoice Amount');
                return;
            }else if($scope.payment_amount > $scope.available_amount){
                $scope.warning('Payment amount must be less than available amount');
                return;
            }
            console.log();
            payment.payment_amount = $scope.payment_amount;
            payment.payment_date = $scope.payment_date;
            $scope.payment_list.push(payment);
            $scope.total_invoice_amount = $scope.sum_of_property($scope.payment_list,'payment_amount');
            $scope.available_amount = $scope.total_amount - $scope.total_invoice_amount;
            $scope.payment_amount = null;
        }
        $scope.removePayment = function(index){
            $scope.payment_list.splice(index, 1);
            $scope.total_invoice_amount = $scope.sum_of_property($scope.payment_list,'payment_amount');
            $scope.available_amount = $scope.total_amount - $scope.total_invoice_amount;
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