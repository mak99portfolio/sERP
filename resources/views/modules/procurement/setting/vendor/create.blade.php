@extends('layout') @section('title', 'Vendor') @section('content')

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
                        <h2>Vendor</h2>
                        <a href="{{route('vendor.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list" aria-hidden="true"></i> Vendor List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" ng-controller="myCtrl">
                        <br />
                        @include('partials/flash_msg')
                        <form class="form-horizontal form-label-left" action="{{route('vendor.store')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('vendor_id','Vendor Id', $vendor_id, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('name','Vendor Name', null, ['class'=>'form-control input-sm','required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::select('status_id', 'Status', [1=>'Active', 0=>'Inactive'], null, ['class'=>'form-control input-sm select2','required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('establishment_date','Establishment Date', null, ['class'=>'form-control input-sm datepicker','required']) }}

                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::select('country_id', 'Country', $country_list, null, ['class'=>'form-control input-sm select2','required', 'data-popup'=> route('country.index')]) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::select('vendor_category_id', 'Vendor Category', $vendor_category_list, null, ['class'=>'form-control input-sm select2','required', 'data-popup'=> route('vendor-category.index')]) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('zip_code','Zip Code', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::tel('telephone','Tel. No.', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('fax','Fax', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('website','Web Site', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::email('email','Email', null, ['class'=>'form-control input-sm','required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::tel('tin_no','TIN Number', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('trade_license_no','Trade License No', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('trade_license_issue_date','Trade License Issue Date', null, ['class'=>'form-control input-sm datepicker']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('certificate_of_incorporation','Certificate of Incorporation', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('incorporation_date','Incorporation Date', null, ['class'=>'form-control input-sm datepicker']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('vat_no','VAT No', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::textarea('address','Address', null, ['class'=>'form-control input-sm', 'rows'=>2]) }}
                                </div>
                            </div>
                            <div class="panel panel-default m-t-20">
                                <div class="panel-heading">Type of Business</div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <div class="checkbox">
                                                <label class="i-checks">
                                                    <input type="checkbox" name="business_type[]" value="Ltd. Company" required autofocus><i></i> Ltd. Company
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <div class="checkbox">
                                                <label class="i-checks">
                                                    <input type="checkbox" name="business_type[]" value="Partnership" required><i></i> Partnership
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <div class="checkbox">
                                                <label class="i-checks">
                                                    <input type="checkbox" name="business_type[]" value="Proprietorship" required><i></i> Proprietorship
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="col-sm-2">
                                                <div class="checkbox">
                                                    <label class="i-checks">
                                                        <input type="checkbox" ng-model="other_business_type" required> Other
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <input class="form-control input-sm" type="text" name="business_type[]" value="" ng-disabled="!other_business_type" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default m-t-20">
                                <div class="panel-heading">Nature of Business</div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <div class="checkbox">
                                                <label class="i-checks">
                                                    <input type="checkbox" name="business_nature[]" value="Manufacturer"><i></i> Manufacturer
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <div class="checkbox">
                                                <label class="i-checks">
                                                    <input type="checkbox" name="business_nature[]" value="Trader"><i></i> Trader
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <div class="checkbox">
                                                <label class="i-checks">
                                                    <input type="checkbox" name="business_nature[]" value="Service Provide"><i></i> Service Provide
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <div class="checkbox">
                                                <label class="i-checks">
                                                    <input type="checkbox" name="business_nature[]" value="Contractor"><i></i> Contractor
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <div class="checkbox">
                                                <label class="i-checks">
                                                    <input type="checkbox" name="business_nature[]" value="Agent/Distributor"><i></i> Agent/Distributor
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="col-sm-2">
                                                <div class="checkbox">
                                                    <label class="i-checks">
                                                        <input type="checkbox" ng-model="other_business_nature"> Other
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <input class="form-control input-sm" type="text" name="business_nature[]" ng-disabled="!other_business_nature">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default m-t-20">
                                <div class="panel-heading">Credit Information</div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            {{ BootForm::text('credit_period','Credit Period', null, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            {{ BootForm::text('credit_limit','Credit Limit', null, ['class'=>'form-control input-sm']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default m-t-20">
                                <div class="panel-heading">Acceptance of payment terms and other discounts (if applicable)</div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 item">
                                            {{ BootForm::number('payment_term[net_days]','Net Day', null, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-12 item">
                                            {{ BootForm::text('payment_term[payment_discount]','Prompt payment discount', null, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-12 item">
                                            {{ BootForm::text('payment_term[other_discount]',' Other Discounts', null, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            {{ BootForm::textarea('payment_term[discount_terms]','Specify Discount Terms', null, ['class'=>'form-control input-sm', 'rows'=>2]) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <fieldset>
                                <legend>Bank Information</legend>
                                <div class="panel panel-default" ng-repeat="i in bank track by $index">
                                    <div class="panel-heading" ng-bind="'Bank-' + (1+$index)"></div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::text('banks[<% $index %>][ac_no]','A/C No', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::text('banks[<% $index %>][ac_name]','A/C Name', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::text('banks[<% $index %>][bank_name]','Bank', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::text('banks[<% $index %>][branch_name]','Branch', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::text('banks[<% $index %>][swift_code]','SWIFT Code', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::textarea('banks[<% $index %>][address]','Bank Address', null, ['class'=>'form-control input-sm', 'rows'=>2]) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button ng-disabled="bank.length>=5" type="button" class="btn btn-default btn-sm" style="margin-top: 5px" ng-click="increaseBank()"><i class="fa fa-plus"></i> Add Bank</button>
                                    <button ng-disabled="bank.length<=1" type="button" class="btn btn-default btn-sm" style="margin-top: 5px" ng-click="decreaseBank()"><i class="fa fa-minus"></i> Remove Bank</button>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Contact Person Information</legend>
                                <div class="panel panel-default" ng-repeat="i in person track by $index">
                                    <div class="panel-heading" ng-bind="'Person-' + (1+$index)"></div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::text('contacts[<% $index %>][name]','Contact Name', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::text('contacts[<% $index %>][designation]','Designation', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::tel('contacts[<% $index %>][telephone]','Tel.No', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::email('contacts[<% $index %>][email]','E-Mail', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::text('contacts[<% $index %>][role]','Job Role', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::tel('contacts[<% $index %>][mobile]','Cell No', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button ng-disabled="person.length>=5" type="button" class="btn btn-default btn-sm" style="margin-top: 5px" ng-click="increasePerson()"><i class="fa fa-plus"></i> Add Person</button>
                                    <button ng-disabled="person.length<=1" type="button" class="btn btn-default btn-sm" style="margin-top: 5px" ng-click="decreasePerson()"><i class="fa fa-minus"></i> Remove Person</button>
                                </div>
                            </fieldset>
                             <fieldset>
                                <legend>Enclosures Information:</legend>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">Enclosure LIst</th>
                                                </tr>
                                                <tr>
                                                    <th style="width: 60px;">SL No</th>
                                                    <th>Enclosure Name</th>
                                                    <th>Attachment</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($enclosure_list as $item)
                                                <tr>
                                                    <td class="text-center">{{$loop->iteration}}</td>
                                                    <td>
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox" ng-model="enclosure{{$item->id}}"> {{$item->name}}
                                                                <input type="hidden" value="{{$item->id}}" name="enclosures[{{$loop->index}}][enclosure_id]" ng-disabled="!enclosure{{$item->id}}"> </td>
                                                            </label>
                                                        </div>
                                                    <td>
                                                        <input ng-disabled="!enclosure{{$item->id}}" type="file"  name="enclosures[{{$loop->index}}][enclosure_file]" />
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a class="btn btn-default" href="{{route('vendor.index')}}">Cancel</a>
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
        var app = angular.module('myApp', [], function($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        });
        app.controller('myCtrl',function($scope){
           
            // Person 
            $scope.minPerson = 1;
            $scope.maxPerson = 5;
            $scope.getNumber = function(num) {
                $scope.person = new Array(num);
            }
            $scope.getNumber(1);
            $scope.increasePerson = function(){
                if($scope.person.length < $scope.maxPerson){
                    $scope.getNumber($scope.person.length+1);
                }
            }
            $scope.decreasePerson = function(){
                if($scope.person.length > $scope.minPerson){
                    $scope.getNumber($scope.person.length-1);
                }
            }
             // Person 
            // Bakn 
            $scope.minBank = 1;
            $scope.maxBank = 5;
            $scope.getBank = function(num) {
                $scope.bank = new Array(num);
            }
            $scope.getBank(1);
            $scope.increaseBank = function(){
                if($scope.bank.length < $scope.maxBank){
                    $scope.getBank($scope.bank.length+1);
                }
            }
            $scope.decreaseBank = function(){
                if($scope.bank.length > $scope.minBank){
                    $scope.getBank($scope.bank.length-1);
                }
            }
             // Bank 

        });
        $(function(){

var requiredCheckboxes = $(':checkbox[required]');

requiredCheckboxes.change(function(){

    if(requiredCheckboxes.is(':checked')) {
        requiredCheckboxes.removeAttr('required');
    }

    else {
        requiredCheckboxes.attr('required', 'required');
    }
});

});
        </script>
@endsection
