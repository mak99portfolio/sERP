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
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Insurance Cover Note</h2>
                        <a href="{{route('insurance-cover-note.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> See Insurance Cover Note</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left input_mask">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">LC No</label>
                                        <select name="lc-select" class="form-control input-sm">
                                            <option value="one" selected>One</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">ICN No</label>
                                        <input type="text" class="form-control input-sm" name="icn_no">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">ICN Date</label>
                                        <input type="text" class="form-control input-sm datepicker" name="icn_date">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">ICN Agency Name</label>
                                        <select name="vendor_id" class="form-control input-sm">
                                            <option value="one" selected>One</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">ICN Bank Info</div>
                                        <div class="panel-body">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Account No</label>
                                                    <input type="text" class="form-control input-sm" name="icn_account_no">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Account Name</label>
                                                    <input type="text" class="form-control input-sm" name="icn_account_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Bank Name</label>
                                                    <input type="text" class="form-control input-sm" name="icn_bank_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Bank Address</label>
                                                    <textarea name="icn_bank_address" class="form-control input-sm" id="" cols="30" rows="1"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Consignee Bank Info</div>
                                        <div class="panel-body">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Account Number</label>
                                                    <input type="text" class="form-control input-sm" name="consignee_account_number">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Account Name</label>
                                                    <input type="text" class="form-control input-sm" name="consignee_account_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Bank Name</label>
                                                    <input type="text" class="form-control input-sm" name="consignee_bank_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Bank Address</label>
                                                    <textarea name="consignee_bank_address" class="form-control" id="" cols="30" rows="1"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="">Notes</label>
                                    <textarea name="notes" class="form-control" rows="2"></textarea>
                                </div>
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
                                                <td>10%</td>
                                                <td>Tk</td>
                                                <td><input type="text" class="form-control input-sm"></td>
                                            </tr>
                                            <tr>
                                                <td>WAR & SRCC</td>
                                                <td>10%</td>
                                                <td>Tk</td>
                                                <td><input type="text" class="form-control input-sm"></td>
                                            </tr>
                                            <tr>
                                                <td>Net Premium</td>
                                                <td>10%</td>
                                                <td>Tk</td>
                                                <td><input type="text" class="form-control input-sm"></td>
                                            </tr>
                                            <tr>
                                                <td>VAT</td>
                                                <td>10%</td>
                                                <td>Tk</td>
                                                <td><input type="text" class="form-control input-sm"></td>
                                            </tr>
                                            <tr>
                                                <td>Stamp Duty</td>
                                                <td>10%</td>
                                                <td>Tk</td>
                                                <td><input type="text" class="form-control input-sm"></td>
                                            </tr>
                                            <tr>
                                                <td>Grand Total</td>
                                                <td>10%</td>
                                                <td>Tk</td>
                                                <td><input type="text" class="form-control input-sm"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--end table-->
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <a href="#" class="btn btn-success btn-sm">Submit</a>
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
