@extends('layout')
@section('title', 'Sales Order Return')
@section('content')

<!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="x_panel" ng-app="myApp">
                        <div class="x_title">
                            <h2>Sales Order Return</h2>
                            <a href="{{route('sales-order-return.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> Sales Order Return List</a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" ng-controller="myCtrl">
                            <form class="form-horizontal form-label-left" action="{{route('sales-order-return.store')}}" method="POST" autocomplete="off">
                            @csrf
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('sales_order_return_date','Sales Order Return Date', date('Y-m-d'), ['class'=>'form-control input-sm','required','readonly']) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('sales_order_id','Sales Order No',$sales_order_list,null, ['class'=>'form-control input-sm select2','data-placeholder'=>'Select Sales Order No','ng-model'=>'sales_order_id','ng-change'=>"getSalesInfo()",'style'=>"width: 100%;",'required']) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('customer_name','Customer Name', null, ['class'=>'form-control input-sm','required','readonly','ng-model'=>'customer_name']) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('sales_order_date','Sales Order Date', null, ['class'=>'form-control input-sm','required','readonly','ng-model'=>'sales_date']) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('sales_refarence_name','Sales Refarence Name', null, ['class'=>'form-control input-sm','required','readonly','ng-model'=>'sales_reference']) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('seals_return_reason_id','Return Reason',$sales_return_reason_list,null, ['class'=>'form-control input-sm select2','data-placeholder'=>'Select Return Reason','style'=>"width: 100%;",'required']) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                 {{ BootForm::select('employee_id','Return Person',$employee_list,null, ['class'=>'form-control input-sm select2','data-placeholder'=>'Select Return Person','style'=>"width: 100%;",'required']) }}
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="">Remark</label>
                                    <textarea name="remark" id="" cols="30" rows="2" class="form-control input-sm"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <fieldset>
                                    <legend>Sales Order Return Table</legend>
                                </fieldset>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Sales Order Quantity</th>
                                        <th>Remaining Sales Order Quantity</th>
                                        <th>Return Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Ner Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>125</td>
                                        <td class="text-right">125</td>
                                        <td class="text-right">125</td>
                                        <td class="text-right"><input type="text" class="form-control input-sm"></td>
                                        <td class="text-right">125</td>
                                        <td class="text-right">125</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right">Total Return Quantity</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right">Total Price</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right">Vat</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right">Grand Total</td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a href="{{route('sales-order-return.index')}}" class="btn btn-default">Cancel</a>
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

        $scope.getSalesInfo = function(){
            let url = "{{URL::to('get-sales-info')}}/" + $scope.sales_order_id;
                $http.get(url)
                        .then(function(response) {
                            $scope.customer_name = response.data.customer_name;
                            $scope.sales_date = response.data.sales_date;
                            $scope.sales_reference = response.data.sales_reference;
                        });
        }

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