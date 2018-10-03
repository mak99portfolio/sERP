@extends('layout')
@section('title', 'Payment')
@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Procurement</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" ng-app="myApp">
                    <div class="x_title">
                        <h2> Payment</h2>
                        <a href="{{route('foreign-payment.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-eye" aria-hidden="true"></i> List Foreign Payment</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" ng-controller="myCtrl">

                        <form class="form-horizontal form-label-left input_mask" action="{{route('foreign-payment.store')}}" method="POST" autocomplete="off">
                            {{-- <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('requisition_title','Payment Id', null, ['class'=>'form-control input-sm']) }}
                            </div> --}}
                            @csrf
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('payment_date','Payment Date', null, ['class'=>'form-control input-sm datepicker']) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('type_vendor_category_id', 'Select Vendor Type', $vendor_category_list , null,['class'=>'form-control input-sm select2']) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('vendor_id', 'Select Vendor', $vendor_list , null,['class'=>'form-control input-sm select2']) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('payment_by_id', 'Payment By', [''=>'-- Select Payment By --','1'=>'Purchase Order','2'=>'Proforma Invoice','3'=>'Letter Of Credit','4'=>'Insurance Cover Note','5'=>'Commercial Invoice','6'=>'Bill Of Lading'] , null,['class'=>'form-control input-sm select2']) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                 {{ BootForm::text('payment_by_no','Selected Payment By No', null, ['class'=>'form-control input-sm']) }}
                             </div>
                             <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                 {{ BootForm::select('payment_type_id', 'Payment Type',$payment_type_list , null,['class'=>'form-control input-sm select2']) }}
                                </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::number('due_amount','Due Amount', null, ['class'=>'form-control input-sm','readonly']) }}
                             </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::number('payment_amount','Payment Amount', null, ['class'=>'form-control input-sm']) }}
                             </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::number('discount_amount','Discount Amount', null, ['class'=>'form-control input-sm']) }}
                             </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                 {{ BootForm::number('vat','Vat(%)', null, ['class'=>'form-control input-sm']) }}
                             </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 {{ BootForm::textarea('note','Note', null, ['class'=>'form-control input-sm','rows'=>'2']) }}
                             </div>
                            {{-- <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm m-t-25" type="button">Add</button>
                                </div>
                            </div> --}}
                            {{-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <fieldset class="m-t-20">
                                        <form name="myForm">
                                    <legend>Payment Type</legend>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Insurance
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                            <label class="form-check-labe2" for="exampleRadios2">
                                                L/C Charge
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option2">
                                            <label class="form-check-labe3" for="exampleRadios3">
                                                L/C Retirement
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="option2">
                                            <label class="form-check-labe4" for="exampleRadios4">
                                                C&F Express
                                            </label>
                                        </div>
                                    </div>
                                        </form>
                                </fieldset>
                            </div> --}}
                            {{-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <fieldset class="m-t-20">
                                    <legend>Insurance</legend>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row">Insurance</td>
                                                    <td><input type="text" class="form-control input-sm" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Sub Total=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Total Discount=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Total Vat=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Grand Total=</td>
                                                    <td>125</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <fieldset class="m-t-20">
                                    <legend>L/C Charge</legend>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row">l/C Name</td>
                                                    <td><input type="text" class="form-control input-sm" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Sub Total=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Total Discount=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Total Vat=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Grand Total=</td>
                                                    <td>125</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <fieldset class="m-t-20">
                                    <legend>L/C Retirment</legend>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row">Retirment</td>
                                                    <td><input type="text" class="form-control input-sm"></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">Remitance</td>
                                                    <td><input type="text" class="form-control input-sm"></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">D/H Charge</td>
                                                    <td><input type="text" class="form-control input-sm"></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Sub Total=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Total Discount=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Total Vat=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Grand Total=</td>
                                                    <td>125</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <fieldset class="m-t-20">
                                    <legend>C/F Express</legend>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row">C/F Name</td>
                                                    <td><input type="text" class="form-control input-sm" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Sub Total=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Total Discount=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Total Vat=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Grand Total=</td>
                                                    <td>125</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <fieldset class="m-t-20">
                                    <legend>Transport Charge</legend>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row">Transport name</td>
                                                    <td><input type="text" class="form-control input-sm" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Sub Total=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Total Discount=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Total Vat=</td>
                                                    <td>125</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-right">Grand Total=</td>
                                                    <td>125</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </fieldset>
                            </div> --}}
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-sm">Save</button>
                                        <a class="btn btn-default btn-sm" href="{{route('payment-type.index')}}">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection


@section('script')
<script>
var app = angular.module('myApp', []);

app.controller('myCtrl', function($scope) {
    $scope.color = 'blue';
    $scope.isShown = function(color) {
        return color === $scope.color;
    };
});
</script>
@endsection
