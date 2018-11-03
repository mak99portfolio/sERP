@extends('layout')
@section('title', 'Insurance Cover Note')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Procurement</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        {{-- Content here --}}
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" ng-app="myApp">
                    <div class="x_title">
                        <h2>Insurance Cover Note</h2>
                        <a href="{{ route('insurance-cover-note.index') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list" aria-hidden="true"></i> Insurance Cover Note List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" ng-controller="myCtrl">
                        <br />
                        @include('partials.flash_msg')
                        <form class="form-horizontal form-label-left input_mask" action="{{ route('insurance-cover-note.store') }}" method="POST" autocomplete="off">
                            @csrf
                            <input type="hidden" name="company_bank_id" value='<% company_bank_id %>'>
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::select('letter_of_credit_id', 'LC No', $lc_list, null, ['class'=>'form-control input-sm select2', 'data-placeholder'=>'Select LC', 'required','data-popup'=> route('letter-of-credit.index')]) }}
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('insurance_cover_note_no','ICN No', null, ['class'=>'form-control input-sm', 'required']) }}
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('insurance_cover_note_date','ICN Date', null, ['class'=>'form-control input-sm datepicker', 'required']) }}
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::select('vendor_id', 'ICN Agency Name', $vendor_list, null, ['class'=>'form-control input-sm select2', 'data-placeholder'=>'Select ICN Agency Name', 'ng-model'=>'vendor_id', 'ng-change'=>'searchVendorBank()', 'required','data-popup'=> route('vendor.index')]) }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">ICN Bank Info</div>
                                        <div class="panel-body">
                                            {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('icn_bank_account_no','Account No', null, ['class'=>'form-control input-sm', 'ng-model'=>'icn_bank_account_no', 'readonly']) }}
                                            </div> --}}
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Account No.</label>
                                                    <select class="form-control input-sm select2" name="vendor_bank_id" ng-model="vendor_bank_id" ng-change="getIcnAccountDetails()" required>
                                                        <option value="" disabled>--Select Account No--</option>
                                                        <option ng-repeat="account in icn_account_list" value="<% account.id %>"><% account.ac_no %></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text(null,'Account Name', null, ['class'=>'form-control input-sm', 'ng-model'=>'icn_bank_account_name', 'readonly']) }}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text(null,'Bank Name', null, ['class'=>'form-control input-sm', 'ng-model'=>'icn_bank_name', 'readonly']) }}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::textarea(null,'Bank Address', null, ['class'=>'form-control input-sm','rows'=>2, 'ng-model'=>'icn_bank_address', 'readonly']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Consignee Bank Info</div>
                                        <div class="panel-body">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{-- {{ BootForm::text('company_bank_id','Account No', null, ['class'=>'form-control input-sm']) }} --}}
                                                {{ BootForm::select('company_bank_id', 'Account No', $account_list, null, ['class'=>'form-control input-sm select2', 'data-placeholder'=>'Select Account No', 'ng-model'=>'company_bank_id','ng-change'=>'searchConsigneeBank()','required','data-popup'=> route('company-bank.index')]) }}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text(null,'Account Name', null, ['class'=>'form-control input-sm', 'ng-model'=>'consignee_bank_account_name', 'readonly']) }}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text(null,'Bank Name', null, ['class'=>'form-control input-sm', 'ng-model'=>'consignee_bank_name', 'readonly']) }}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::textarea(null,'Bank Address', null, ['class'=>'form-control input-sm', 'ng-model'=>'consignee_bank_address','rows'=>2, 'readonly']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {{ BootForm::textarea('note','Notes', null, ['class'=>'form-control input-sm','rows'=>2]) }}
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th colspan="4">Cover Note Details</th>
                                            </tr>
                                            <tr>
                                                <th>Name</th>
                                                <th>Percent</th>
                                                <th></th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Marine</td>
                                                <td>{{ Form::number('percent_of_marine', 0, ['class'=>'form-control input-sm', 'required']) }}</td>
                                                <td>Tk</td>
                                                <td><input type="number" class="form-control input-sm" name="amount_of_marine" ng-model="amount_of_marine" required></td>
                                            </tr>
                                            <tr>
                                                <td>WAR & SRCC</td>
                                                <td>{{ Form::number('percent_of_war', 0, ['class'=>'form-control input-sm', 'required']) }}</td>
                                                <td>Tk</td>
                                                <td><input type="number" class="form-control input-sm" name="amount_of_war" ng-model="amount_of_war" required></td>
                                            </tr>
                                            <tr>
                                                <td>Net Premium</td>
                                                <td>{{ Form::number('percent_of_net_premium', 0, ['class'=>'form-control input-sm', 'required']) }}</td>
                                                <td>Tk</td>
                                                <td><input type="number" class="form-control input-sm" name="amount_of_net_premium" ng-model="amount_of_net_premium" required></td>
                                            </tr>
                                            <tr>
                                                <td>VAT</td>
                                                <td>{{ Form::number('percent_of_vat', 0, ['class'=>'form-control input-sm', 'required']) }}</td>
                                                <td>Tk</td>
                                                <td><input type="number" class="form-control input-sm" name="amount_of_vat" ng-model="amount_of_vat" required></td>
                                            </tr>
                                            <tr>
                                                <td>Stamp Duty</td>
                                                <td>{{ Form::number('percent_of_stamp_duty', 0, ['class'=>'form-control input-sm', 'required']) }}</td>
                                                <td>Tk</td>
                                                <td><input type="number" class="form-control input-sm" name="amount_of_stamp_duty" ng-model="amount_of_stamp_duty" required></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Grand Total</td>
                                                <td>Tk</td>
                                                <td class="text-right"><% amount_of_grand_total() %></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--end table-->
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a href="{{route('insurance-cover-note.index')}}" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        {{--end Content here --}}
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


        $scope.amount_of_grand_total = function () {
            var total = 0;
            total = $scope.amount_of_marine + $scope.amount_of_war + $scope.amount_of_net_premium + $scope.amount_of_vat + $scope.amount_of_stamp_duty;
            return total;
        }

        $scope.searchConsigneeBank = function () {
            $scope.getConsigneeBankDetails($scope.company_bank_id);
        }

        $scope.getConsigneeBankDetails = function(id){
            let url = "{{URL::to('get-bank-info')}}/" + id;
            $http.get(url).then(function(response) {
                $scope.consignee_bank_account_name = response.data.account_name;
                $scope.consignee_bank_name = response.data.bank.name;
                $scope.consignee_bank_address = response.data.address;
            });
        }
        $scope.icn_account_list = [];
        $scope.searchVendorBank = function(){
            let url = "{{URL::to('get-vendor-bank-info')}}/" + $scope.vendor_id;
            $http.get(url).then(function(response) {
                $scope.icn_account_list = response.data;
                // console.log($scope.icn_account_list[0].ac_no);
                $scope.vendor_bank_id = $scope.icn_account_list[0].id.toString();
                $scope.icn_bank_account_name = $scope.icn_account_list[0].ac_name;
                $scope.icn_bank_name = $scope.icn_account_list[0].bank_name;
                $scope.icn_bank_address = $scope.icn_account_list[0].address;
            });
        }

        $scope.getIcnAccountDetails = function(){

            // alert($scope.icn_bank_account_no);

            index = $scope.icn_account_list.findIndex(item => item.id==$scope.vendor_bank_id);
            var account  = $scope.icn_account_list[index];
            // console.log(index);
            $scope.icn_bank_account_name = account.ac_name;
            $scope.icn_bank_name = account.bank_name;
            $scope.icn_bank_address = account.address;
        }

        // for old data holding in the field start

        $scope.vendor_id = '{{ old('vendor_id') }}';
        $scope.company_bank_id = '{{ old('company_bank_id') }}';
        $scope.amount_of_marine = '{{ old('amount_of_marine') }}' | 0;
        $scope.amount_of_war = '{{ old('amount_of_war') }}' | 0;
        $scope.amount_of_net_premium = '{{ old('amount_of_net_premium') }}' | 0;
        $scope.amount_of_vat = '{{ old('amount_of_vat') }}' | 0;
        $scope.amount_of_stamp_duty = '{{ old('amount_of_stamp_duty') }}' | 0;
        if($scope.vendor_id){
            $scope.searchVendorBank();
        }
        if($scope.company_bank_id){
            $scope.searchConsigneeBank();
        }

        // for old data holding in the field end

    });
</script>
@endsection
