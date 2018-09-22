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
                        <a href="{{route('cost-sheet.index')}}" class="btn btn-sm btn-success btn-addon pull-right"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Cost Sheet List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('letter_of_credit_id', 'LC No', $lc_list, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('letter_of_credit_date','LC Opening Date', null, ['class'=>'form-control input-sm datepicker', 'readonly']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('currency', 'Currency', [''=>'-- select currency --','1'=>'Doller'], null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Bank Info</div>
                                        <div class="panel-body">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('issue_ac_no','A/C No ', null, ['class'=>'form-control input-sm', 'readonly']) }}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('issue_ac_name','A/C Name', null, ['class'=>'form-control input-sm', 'readonly']) }}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('issue_bank_name','Bank Name', null, ['class'=>'form-control input-sm', 'readonly']) }}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('issue_branch_name','Branch Name', null, ['class'=>'form-control input-sm', 'readonly']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::number('letter_of_credit_value','LC Value', null, ['class'=>'form-control input-sm', 'readonly']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::number('exchange_rate','Exchange Rate', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::number('bdt_amount','BDT Amount', null, ['class'=>'form-control input-sm']) }}
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
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                </tr>
                                                <tr>
                                                    <td>02</td>
                                                    <td>LC Commision</td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                </tr>
                                                <tr>
                                                    <td>03</td>
                                                    <td>VAT</td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                </tr>
                                                <tr>
                                                    <td>04</td>
                                                    <td>SWIFT</td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                </tr>
                                                <tr>
                                                    <td>05</td>
                                                    <td>Stamp Charge</td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                </tr>
                                                <tr>
                                                    <td>06</td>
                                                    <td>LCAF Issue Charge</td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                </tr>
                                                <tr>
                                                    <td>07</td>
                                                    <td>IMP</td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                </tr>
                                                <tr>
                                                    <td>08</td>
                                                    <td>LC Application Form</td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                </tr>
                                                <tr>
                                                    <td>09</td>
                                                    <td>Other Charge(If any)</td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                    <td><input type="number" class="form-control input-sm"></td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="3">Total</td>
                                                    <td>234</td>
                                                    <td>23423</td>
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
