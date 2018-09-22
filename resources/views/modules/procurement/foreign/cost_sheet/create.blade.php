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
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>L/C No</label>
                                        <select data-placeholder="L/C No" class="form-control input-sm select2" style="width: 100%">
                                            <option>option2</option>
                                            <option>option3</option>
                                            <option>option4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <label>L/C Opening Date</label>
                                    <input type="date" class="form-control input-sm">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Currency</label>
                                        <select data-placeholder="Currency" class="form-control input-sm select2" style="width: 100%">
                                            <option>option2</option>
                                            <option>option3</option>
                                            <option>option4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Bank Info</div>
                                        <div class="panel-body">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <label>A/C No</label>
                                                <input type="text" class="form-control input-sm">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <label>A/C Name</label>
                                                <input type="text" class="form-control input-sm">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <label>Branch Name</label>
                                                <input type="text" class="form-control input-sm">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <label>Bank Name</label>
                                                <input type="text" class="form-control input-sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <label>L/C Amount</label>
                                    <input type="number" class="form-control input-sm">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <label>Exchange Rate</label>
                                    <input type="text" class="form-control input-sm">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <label>BDT Amount</label>
                                    <input type="number" class="form-control input-sm">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    {{ BootForm::textarea('notes','Description', null, ['class'=>'form-control input-sm','rows'=>2]) }}
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
                                        <!-- <a class="btn btn-default" href="{{route('vendor.index')}}">Cancel</a> -->
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
