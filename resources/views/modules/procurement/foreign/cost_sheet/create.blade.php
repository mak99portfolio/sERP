@extends('layout')
@section('title', 'Cost Sheet')
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
                        <h2>Cost Sheet</h2>
                        <a href="{{route('cost-sheet.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Cost Sheet List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" ng-controller="myCtrl">
                        <br />
                        @include('partials.flash_msg')
                        <form class="form-horizontal form-label-left" action="{{ route('cost-sheet.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>LC No.</label>
                                        <select class="form-control input-sm select2" name="letter_of_credit_id" ng-model="letter_of_credit_id" ng-change="getLc()">
                                            <option value="">--Select LC No--</option>
                                            @foreach($lc_list as $item)
                                            <option value="{{$item->id}}">{{$item->letter_of_credit_no}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('letter_of_credit_date','LC Opening Date', null, ['class'=>'form-control input-sm', 'ng-model'=>'letter_of_credit_date', 'readonly']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('currency', 'Currency', [''=>'-- select currency --','Doller'=>'Doller'], null, ['class'=>'form-control input-sm select2']) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">LC Bank Info</div>
                                        <div class="panel-body">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('issue_ac_no','A/C No ', null, ['class'=>'form-control input-sm', 'ng-model'=>'issue_ac_no', 'readonly']) }}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('issue_ac_name','A/C Name', null, ['class'=>'form-control input-sm', 'ng-model'=>'issue_ac_name', 'readonly']) }}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('issue_bank_name','Bank Name', null, ['class'=>'form-control input-sm', 'ng-model'=>'issue_bank_name', 'readonly']) }}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('issue_branch_name','Branch Name', null, ['class'=>'form-control input-sm', 'ng-model'=>'issue_branch_name', 'readonly']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::number('letter_of_credit_value','LC Amount (USD)', null, ['class'=>'form-control input-sm', 'ng-model'=>'letter_of_credit_value', 'readonly']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::number('exchange_rate','Exchange Rate', null, ['class'=>'form-control input-sm', 'ng-model'=>'exchange_rate']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>BDT Amount</label>
                                        <input type="number" class="form-control input-sm" name="bdt_amount" ng-model="bdt_amount" value="<% getBdtAmount() %>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    {{ BootForm::textarea('note','Note', null, ['class'=>'form-control input-sm','rows'=>2]) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th colspan="5">Particulars</th>
                                                </tr>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Cost Particulars</th>
                                                    <th>Percent (%)</th>
                                                    <th>Amount</th>
                                                    <th>Amt. in round Figure</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>01</td>
                                                    <td>LC Margin</td>
                                                    <td>{{ Form::number('percent_of_lc_margin', null, ['class'=>'form-control input-sm', 'ng-model'=>'percent_of_lc_margin']) }}</td>
                                                    <td><input type="number" class="form-control input-sm" name="amount_of_lc_margin" ng-model="amount_of_lc_margin" value="<% amount_of_lc_margin = bdt_amount * (percent_of_lc_margin/100) %>"></td>
                                                    <td><input type="number" class="form-control input-sm" name="round_amount_of_lc_margin" ng-model="round_amount_of_lc_margin"></td>
                                                </tr>
                                                <tr>
                                                    <td>02</td>
                                                    <td>LC Commision</td>
                                                    <td>{{ Form::number('percent_of_lc_commision', null, ['class'=>'form-control input-sm', 'ng-model'=>'percent_of_lc_commision']) }}</td>
                                                    <td><input type="number" class="form-control input-sm" name="amount_of_lc_commision" ng-model="amount_of_lc_commision" value="<% amount_of_lc_commision = bdt_amount * (percent_of_lc_commision/100) %>"></td>
                                                    <td><input type="number" class="form-control input-sm" name="round_amount_of_lc_commision" ng-model="round_amount_of_lc_commision"></td>
                                                </tr>
                                                <tr>
                                                    <td>03</td>
                                                    <td>VAT</td>
                                                    <td>{{ Form::number('percent_of_vat', null, ['class'=>'form-control input-sm', 'ng-model'=>'percent_of_vat']) }}</td>
                                                    <td><input type="number" class="form-control input-sm" name="amount_of_vat" ng-model="amount_of_vat" value="<% amount_of_vat = amount_of_lc_commision * (percent_of_vat/100) %>"></td>
                                                    <td><input type="number" class="form-control input-sm" name="round_amount_of_vat" ng-model="round_amount_of_vat"></td>
                                                </tr>
                                                <tr>
                                                    <td>04</td>
                                                    <td>SWIFT</td>
                                                    <td>{{ Form::number('percent_of_swift', null, ['class'=>'form-control input-sm']) }}</td>
                                                    <td><input type="number" class="form-control input-sm" name="amount_of_swift" ng-model="amount_of_swift"></td>
                                                    <td><input type="number" class="form-control input-sm" name="round_amount_of_swift" ng-model="round_amount_of_swift"></td>
                                                </tr>
                                                <tr>
                                                    <td>05</td>
                                                    <td>Stamp Charge</td>
                                                    <td>{{ Form::number('percent_of_stamp_charge', null, ['class'=>'form-control input-sm']) }}</td>
                                                    <td><input type="number" class="form-control input-sm" name="amount_of_stamp_charge" ng-model="amount_of_stamp_charge"></td>
                                                    <td><input type="number" class="form-control input-sm" name="round_amount_of_stamp_charge" ng-model="round_amount_of_stamp_charge"></td>
                                                </tr>
                                                <tr>
                                                    <td>06</td>
                                                    <td>LCAF Issue Charge</td>
                                                    <td>{{ Form::number('percent_of_lcaf_issue_charge', null, ['class'=>'form-control input-sm']) }}</td>
                                                    <td><input type="number" class="form-control input-sm" name="amount_of_lcaf_issue_charge" ng-model="amount_of_lcaf_issue_charge"></td>
                                                    <td><input type="number" class="form-control input-sm" name="round_amount_of_lcaf_issue_charge" ng-model="round_amount_of_lcaf_issue_charge"></td>
                                                </tr>
                                                <tr>
                                                    <td>07</td>
                                                    <td>IMP</td>
                                                    <td>{{ Form::number('percent_of_imp', null, ['class'=>'form-control input-sm']) }}</td>
                                                    <td><input type="number" class="form-control input-sm" name="amount_of_imp" ng-model="amount_of_imp"></td>
                                                    <td><input type="number" class="form-control input-sm" name="round_amount_of_imp" ng-model="round_amount_of_imp"></td>
                                                </tr>
                                                <tr>
                                                    <td>08</td>
                                                    <td>LC Application Form</td>
                                                    <td>{{ Form::number('percent_of_lc_application_form', null, ['class'=>'form-control input-sm']) }}</td>
                                                    <td><input type="number" class="form-control input-sm" name="amount_of_lc_application_form" ng-model="amount_of_lc_application_form"></td>
                                                    <td><input type="number" class="form-control input-sm" name="round_amount_of_lc_application_form" ng-model="round_amount_of_lc_application_form"></td>
                                                </tr>
                                                <tr>
                                                    <td>09</td>
                                                    <td>Other Charge(If any)</td>
                                                    <td>{{ Form::number('percent_of_others', null, ['class'=>'form-control input-sm']) }}</td>
                                                    <td><input type="number" class="form-control input-sm" name="amount_of_others" ng-model="amount_of_others"></td>
                                                    <td><input type="number" class="form-control input-sm" name="round_amount_of_others" ng-model="round_amount_of_others"></td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="3">Total</td>
                                                    <td class="text-right"><% get_total_amount() %></td>
                                                    <td class="text-right"><% get_total_amount_round() %></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>


                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <br />

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Save</button>
                                        <a class="btn btn-default" href="{{ route('cost-sheet.index') }}">Cancel</a>
                                    </div>
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
    app.controller('myCtrl', function($scope, $http) {

        $scope.getLc = function () {
            $scope.getLcDetails($scope.letter_of_credit_id);
        }

        $scope.getLcDetails = function(id){
            let url = "{{URL::to('get-lc')}}/" + id;
            $http.get(url).then(function(response) {
                $scope.letter_of_credit_date = response.data.letter_of_credit_date;
                $scope.letter_of_credit_value = parseInt(response.data.letter_of_credit_value);
                $scope.issue_ac_no = response.data.issue_ac_no;
                $scope.issue_ac_name = response.data.issue_ac_name;
                $scope.issue_bank_name = response.data.issue_bank_name;
                $scope.issue_branch_name = response.data.issue_branch_name;
            });

            $scope.getBdtAmount = function () {
                var total = 0;
                total = $scope.letter_of_credit_value * $scope.exchange_rate;
                $scope.bdt_amount = total;
                return $scope.bdt_amount;
            }
        }

        $scope.get_total_amount = function () {
            var total = 0;
            total = $scope.amount_of_lc_margin + $scope.amount_of_lc_commision + $scope.amount_of_vat + $scope.amount_of_swift + $scope.amount_of_stamp_charge + $scope.amount_of_lcaf_issue_charge + $scope.amount_of_imp + $scope.amount_of_lc_application_form + $scope.amount_of_others;
            return total;
        }

        $scope.get_total_amount_round = function () {
            var total = 0;
            total = $scope.round_amount_of_lc_margin + $scope.round_amount_of_lc_commision + $scope.round_amount_of_vat + $scope.round_amount_of_swift + $scope.round_amount_of_stamp_charge + $scope.round_amount_of_lcaf_issue_charge + $scope.round_amount_of_imp + $scope.round_amount_of_lc_application_form + $scope.round_amount_of_others;
            return total;
        }

    });
</script>
@endsection
