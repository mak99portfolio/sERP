@extends('layout')
@section('title', 'Customer Profile')
@section('content')
 <!-- page content -->
 <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="x_panel" ng-app="myApp">
                    <div class="x_title">
                        <h2>Customer Profile</h2>
                        <a href="{{ route('customer-profile.index') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> See Customer Profile</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content"  ng-controller="myCtrl">
                        <form class="form-horizontal form-label-left input_mask" action="{{route('customer-profile.store')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                {{-- <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Customer Id *</label>
                                        <input type="text" name="customer_id" class="form-control input-sm" readonly>
                                    </div>
                                </div> --}}
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('customer_name','Customer Name *', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('customer_type_id', 'Customer Type *',$customer_type_list , null, ['class'=>'form-control input-sm select2', 'data-placeholder'=>'Select Customer Type', 'required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('status', 'Status *', [''=>'','Active' => 'Active','Inactive' => 'Inactive'], null, ['class'=>'form-control input-sm select2', 'data-placeholder'=>'Select Status', 'required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('establishment_date','Establishment *', null, ['class'=>'form-control input-sm datepicker']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Customer Zone *</label>
                                        <select name="customer_zone" class="form-control input-sm select2">
                                            <option value="">Dhaka</option>
                                            <option value="">Rangpur</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('contact_number','Contact No *', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('fax','Fax', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('website','Website', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('email','Email', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('tin_number','TIN Number', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('trade_license_number','Trade License No *', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('trade_license_issue_date','Trade License Issue Date', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('certificate_of_incorporation','Certificate Of Incorporation', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('incorporation_date','Incorporation Date', null, ['class'=>'form-control input-sm datepicker']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('vat_number','Vat No', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    {{ BootForm::textarea('address','Address *', null, ['class'=>'form-control input-sm','cols'=>"30" ,'rows'=>"2"]) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Type Of Business *</div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="type_of_business" ng-model="type_of_business" value="LTD company">LTD company
                                                    </label>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="type_of_business" ng-model="type_of_business" value="Partnership">Partnership
                                                    </label>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="type_of_business" ng-model="type_of_business" value="Proprietorship">Proprietorship
                                                    </label>
                                                </div>
                                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="type_of_business" ng-model="type_of_business" value="other">Other
                                                    </label>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <div class="form-group">
                                                        <input type="text" name="type_of_business" class="form-control input-sm" ng-disabled="type_of_business != 'other'">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <fieldset>
                                    <legend>Bank Information *</legend>
                                    <div class="panel panel-default" ng-repeat="i in bank track by $index">
                                    <div class="panel-heading" ng-bind="'Bank-' + (1+$index)"></div>
                                        <div class="panel-body">
                                           <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::text('banks[<% $index %>][account_number]','A/C no', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::text('banks[<% $index %>][account_name]','A/C Name', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::text('banks[<% $index %>][bank_name]','Bank Name', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::text('banks[<% $index %>][branch]','Branch', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::text('banks[<% $index %>][swift_code]','Swift Code', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::text('banks[<% $index %>][bank_address]','Bank Address', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button ng-disabled="bank.length>=5" type="button" class="btn btn-default btn-sm" style="margin-top: 5px" ng-click="increaseBank()"><i class="fa fa-plus"></i> Add Bank Information</button>
                                        <button ng-disabled="bank.length<=1" type="button" class="btn btn-default btn-sm" style="margin-top: 5px" ng-click="decreaseBank()"><i class="fa fa-minus"></i> Remove Bank Information</button>
                                    </div>
                                </fieldset>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <fieldset>
                                        <legend>Contact Person Information</legend>
                                        <div class="panel panel-default" ng-repeat="i in person track by $index">
                                        <div class="panel-heading" ng-bind="'Person-' + (1+$index)"></div>
                                            <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            {{ BootForm::text('persons[<% $index %>][contact_name]','Contact Name *', null, ['class'=>'form-control input-sm']) }}
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            {{ BootForm::text('persons[<% $index %>][designation]','Designation', null, ['class'=>'form-control input-sm']) }}
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            {{ BootForm::text('persons[<% $index %>][contact_number]','Contact No *', null, ['class'=>'form-control input-sm']) }}
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            {{ BootForm::text('persons[<% $index %>][email]','Email', null, ['class'=>'form-control input-sm']) }}
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            {{ BootForm::text('persons[<% $index %>][job_role]','Job Role', null, ['class'=>'form-control input-sm']) }}
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            {{ BootForm::text('persons[<% $index %>][tell_number]','Tell No', null, ['class'=>'form-control input-sm']) }}
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            {{ BootForm::text('persons[<% $index %>][cell_number]','Cell No *', null, ['class'=>'form-control input-sm']) }}
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button ng-disabled="person.length>=5" type="button" class="btn btn-default btn-sm" style="margin-top: 5px" ng-click="increasePerson()"><i class="fa fa-plus"></i> Add Person </button>
                                            <button ng-disabled="person.length<=1" type="button" class="btn btn-default btn-sm" style="margin-top: 5px" ng-click="decreasePerson()"><i class="fa fa-minus"></i> Remove Person </button>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Notes</label>
                                        <textarea name="notes" cols="30" rows="2" class="form-control input-sm"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-sm">Save</button>
                                        <a href="" class="btn btn-default btn-sm">Cancel</a>
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
        app.controller('myCtrl',function($scope){
        //    Bank
            $scope.minBank = 1;
            $scope.maxBank = 5;

            $scope.getNumberBank = function(num) {
                $scope.bank = new Array(num);
            }
            $scope.getNumberBank(1);
            $scope.increaseBank = function(){
                if($scope.bank.length < $scope.maxBank){
                    $scope.getNumberBank($scope.bank.length+1);
                }
            }
            $scope.decreaseBank = function(){
                if($scope.bank.length > $scope.minBank){
                    $scope.getNumberBank($scope.bank.length-1);
                }
            }
        //    Bank
        //    Person
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
        //    Person

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
