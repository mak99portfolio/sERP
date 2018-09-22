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
                        <a href="{{route('insurance-cover-note.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> See Insurance Cover Note</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" ng-controller="myCtrl">
                        <br />
                        @include('partials.flash_msg')
                        <form class="form-horizontal form-label-left input_mask" action="{{ route('insurance-cover-note.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('letter_of_credit_id', 'LC No', $lc_list, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('insurance_cover_note_no','ICN No', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('insurance_cover_note_date','ICN Date', null, ['class'=>'form-control input-sm datepicker']) }}
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('vendor_id', 'ICN Agency Name', $vendor_list, ['class'=>'form-control input-sm']) }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">ICN Bank Info</div>
                                        <div class="panel-body">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('icn_bank_account_no','Account No', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('icn_bank_account_name','Account Name', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('icn_bank_name','Bank Name', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::textarea('icn_bank_address','Bank Address', null, ['class'=>'form-control input-sm','rows'=>2]) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Consignee Bank Info</div>
                                        <div class="panel-body">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('consignee_bank_account_no','Account No', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('consignee_bank_account_name','Account Name', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('consignee_bank_name','Bank Name', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::textarea('consignee_bank_address','Bank Address', null, ['class'=>'form-control input-sm','rows'=>2]) }}
                                            </div>
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
                                                <td>{{ Form::number('percent_of_marine', null, ['class'=>'form-control input-sm']) }}</td>
                                                <td>Tk</td>
                                                <td><input type="number" class="form-control input-sm" name="amount_of_marine" ng-model="amount_of_marine" ng-init="amount_of_marine = 0"></td>
                                            </tr>
                                            <tr>
                                                <td>WAR & SRCC</td>
                                                <td>{{ Form::number('percent_of_war', null, ['class'=>'form-control input-sm']) }}</td>
                                                <td>Tk</td>
                                                <td><input type="number" class="form-control input-sm" name="amount_of_war" ng-model="amount_of_war" ng-init="amount_of_war = 0"></td>
                                            </tr>
                                            <tr>
                                                <td>Net Premium</td>
                                                <td>{{ Form::number('percent_of_net_premium', null, ['class'=>'form-control input-sm']) }}</td>
                                                <td>Tk</td>
                                                <td><input type="number" class="form-control input-sm" name="amount_of_net_premium" ng-model="amount_of_net_premium" ng-init="amount_of_net_premium = 0"></td>
                                            </tr>
                                            <tr>
                                                <td>VAT</td>
                                                <td>{{ Form::number('percent_of_vat', null, ['class'=>'form-control input-sm']) }}</td>
                                                <td>Tk</td>
                                                <td><input type="number" class="form-control input-sm" name="amount_of_vat" ng-model="amount_of_vat" ng-init="amount_of_vat = 0"></td>
                                            </tr>
                                            <tr>
                                                <td>Stamp Duty</td>
                                                <td>{{ Form::number('percent_of_stamp_duty', null, ['class'=>'form-control input-sm']) }}</td>
                                                <td>Tk</td>
                                                <td><input type="number" class="form-control input-sm" name="amount_of_stamp_duty" ng-model="amount_of_stamp_duty" ng-init="amount_of_stamp_duty = 0"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Grand Total</td>
                                                <td>Tk</td>
                                                <td><% amount_of_grand_total() %></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--end table-->
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                    <a href="{{route('insurance-cover-note.index')}}" class="btn btn-default btn-sm">Cancel</a>
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

    });
</script>
@endsection
