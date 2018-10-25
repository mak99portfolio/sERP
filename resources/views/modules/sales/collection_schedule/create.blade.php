@extends('layout')
@section('title', 'Collection Schedule')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel" ng-app="myApp">
                <div class="x_title">
                    <h2>Collection Schedule</h2>
                    <a href="{{ route('collection-schedule.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> Collection Schedule List</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" ng-controller="myCtrl">
                    <br />
                    @include("partials/flash_msg")
                    <form class="form-horizontal form-label-left" action="{{route('collection-schedule.store')}}" method="POST" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('customer', 'Customer',$customer_list,null, ['class'=>'form-control input-sm select2','ng-model'=>"customer_id",'ng-change'=>"getInvoice()"]) }}
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::number('dues','Dues', null, ['class'=>'form-control input-sm'])}}
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::number('payment_amount','Payment Amount', null, ['class'=>'form-control input-sm', 'ng-model' => 'payment_amount']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::text('payment_date','Payment Date', null, ['class'=>'form-control input-sm datepicker', 'ng-model' => 'payment_date']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::select('invoice_no','Invoice No',[], null, ['class'=>'form-control input-sm select2', 'ng-model' => 'invoice_no']) }}
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="button" ng-click="add_payment()" class="btn btn-default btn-sm" style="margin-top: 5px"><i class="fa fa-plus"></i> Add Multi Payment</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th width="25">#</th>
                                            <th class="text-right">Amount</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-right">Invoice No</th>
                                            <th width="30">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01</td>
                                            <td class="text-right">200</td>
                                            <td class="text-center">20/03/2018</td>
                                            <td class="text-right">32200</td>
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
                                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
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

        $scope.itemlist = [];
        $scope.requisitions = [];
        $scope.max_quantity = [];
        $scope.quantity = [];
        $scope.unit_price = [];
        $scope.amount = [];
        $scope.discount_rate = [];
        $scope.vat_rate = [];
        $scope.total_discount = [];
        $scope.vat_amount = [];
        $scope.total_net_amount = [];
        $scope.payment_terms = [];
        $scope.conditions = [];
        $scope.payments = [];

         $scope.getInvoice = function () {
     alert($scope.customer_id);
 
    }
       $scope.add_payment = function(){
        var payment = {};
        
            payment.id = item.id;
            payment.name = item.name;
            payment.description = $scope.condition_description;
            $scope.payments.push(payment);
            $scope.condition_description = null;
            
}


        


        $scope.add_condition = function(){
            var condition = {};
            if(!$scope.terms_and_condition_type){
                $scope.warning('Please select terms and condition type first');
                return;
            }

            if(!$scope.condition_description){
                $scope.warning('Description of terms and condition is empty');
                return;
            }

            var item = JSON.parse($scope.terms_and_condition_type);

            index = $scope.conditions.findIndex(value => value.id == item.id);

            if(index >= 0){
                $scope.warning('Terms and conditions already exist');
                return;
            }

            condition.id = item.id;
            condition.name = item.name;
            condition.description = $scope.condition_description;
            $scope.conditions.push(condition);
            $scope.condition_description = null;
        }

        $scope.removeCondition = function(index){
            $scope.conditions.splice(index, 1);
        }

        $scope.sum = function($arr){
            var sum = 0;
            for(i=0; i<$arr.length; i++){
                if($arr[i] instanceof Object){
                    sum += $scope.sum(Object.values($arr[i]));
                }else{
                    sum += $arr[i];
                }
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
            new PNotify(data);
        }

        $scope.quantityValidate = function(parentIndex, index){
            if($scope.quantity[parentIndex][index] > $scope.max_quantity[parentIndex][index] ){
                $scope.quantity[parentIndex][index] = $scope.max_quantity[parentIndex][index] ;
            }
            if($scope.quantity[parentIndex][index]<1){
                $scope.quantity[parentIndex][index] = 1;
            }
        }

    });
</script>
<script>
    $(function () {
        $('#date_expected').daterangepicker({
            singleDatePicker: true,
            singleClasses: "picker_3",
            minDate: moment().add('days', 1),
            locale: {
                format: 'DD-MM-YYYY',
            }
        });
    });
</script>
@endsection

