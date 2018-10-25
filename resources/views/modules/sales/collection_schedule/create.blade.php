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
                                {{ BootForm::number('due','Due', null, ['class'=>'form-control input-sm', 'ng-model'=>'due'])}}
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::number('payment_amount','Payment Amount', null, ['class'=>'form-control input-sm', 'ng-model' => 'payment_amount']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::text('payment_date','Payment Date', null, ['id'=>'date_expected','class'=>'form-control input-sm datepicker', 'ng-model' => 'payment_date']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                <div class="form-group">
                                                    <label for="">Invoice No</label>
                                                    <select name="invoice_no" id="" ng-model ="invoice_id" class="form-control input-sm select2" data-placeholder="Select Invoice">
                                                        <option value=""></option>
                                                        <option value="<% invoice.invoice_id %>" ng-repeat="invoice in invoice_list"><% invoice.invoice_no %></option>
                                                    </select>
                                                </div>
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
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Invoice No</th>
                                            <th width="30">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="payment in payment_list">
                                            <td><% $index+1 %></td>
                                            <td class="text-center"><% payment.payment_amount %></td>
                                            <td class="text-center"><% payment.payment_date %></td>
                                            <td class="text-center"><% payment.invoice_no %></td>
                                            <td class="text-center"><button type="button" class="btn btn-default btn-sm" title="Remove" ng-click="removePayment($index)"><i class="fa fa-trash text-danger"></i></button></td>
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
        $scope.payment_list = [];
        $scope.invoice_list = [];
        $scope.getInvoice = function () {
            let url = "{{URL::to('get-invoice')}}/" + $scope.customer_id;
            $http.get(url)
                .then(function(response) {
                    $scope.invoice_list = response.data.invoices;
                    $scope.due = response.data.due;
            });
        }
       $scope.add_payment = function(){
           var payment = {};
            payment.payment_amount = $scope.payment_amount;
            payment.payment_date = $scope.payment_date;
            payment.invoice_no = $scope.invoice_list.find(value => value.invoice_id == $scope.invoice_id).invoice_no;
            $scope.payment_list.push(payment);
            $scope.payment_amount = null;
        }
        $scope.removePayment = function(index){
            $scope.payment_list.splice(index, 1);
        }


      });

        $(function(){
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

