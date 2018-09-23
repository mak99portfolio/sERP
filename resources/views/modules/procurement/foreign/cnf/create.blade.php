@extends('layout')
@section('title', 'Duty TAX, VAT and CNF Bill')
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
                        <h2>Duty TAX, VAT and CNF Bill</h2>
                        <a href="{{route('cnf.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> See Duty TAX, VAT and CNF Bill List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left input_mask">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Consignee</label>
                                        <input type="text" class="form-control input-sm" name="consignee">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Bill No</label>
                                        <input type="text" class="form-control input-sm" name="bill_no">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Bill Date</label>
                                        <input type="date" class="form-control input-sm" name="bill_date">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">LC No</label>
                                        <select class="form-control input-sm">
                                            <option value="" selected>Select CI No</option>
                                            <option value="one">One</option>
                                            <option value="one">One</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">LC Opening Date</label>
                                        <input type="date" class="form-control input-sm" name="lc_opening_date">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">LC Value</label>
                                        <input type="text" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Commercial invoice No</label>
                                        <select name="commercial_invoice_no" class="form-control input-sm">
                                            <option value="" selected>Select CI No</option>
                                            <option value="one">One</option>
                                            <option value="one">One</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Commercial Invoice Date</label>
                                        <input type="date" class="form-control input-sm" name="invoice_date">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">B/L No</label>
                                        <input type="text" class="form-control input-sm" name="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">B/L Date</label>
                                        <input type="date" class="form-control input-sm" name="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">B/E No</label>
                                        <input type="text" class="form-control input-sm" name="be_no">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">B/E Date</label>
                                        <input type="date" class="form-control input-sm" name="be_date">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Arrival Date</label>
                                        <input type="date" class="form-control input-sm" name="arrival_date">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Delivery Date</label>
                                        <input type="date" class="form-control input-sm" name="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Job No</label>
                                        <input type="text" class="form-control input-sm" name="job_no">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Exporter</label>
                                        <select class="form-control input-sm">
                                            <option value="" selected>Select Exporter No</option>
                                            <option value="one">One</option>
                                            <option value="one">One</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">C&F Value</label>
                                        <input type="number" class="form-control input-sm" name="cf_value">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">USD Amount</label>
                                        <input type="number" class="form-control input-sm" name="usd_amount">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Exchange Rate</label>
                                        <input type="number" class="form-control input-sm" name="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">BDT Amount</label>
                                        <input type="number" class="form-control input-sm" name="bd_amount">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Total Days</label>
                                        <input type="number" class="form-control input-sm" name="total_days">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Duty Payment Date</label>
                                        <input type="date" class="form-control input-sm" name="duty_payment_date">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Container No</label>
                                        <input type="text" class="form-control input-sm" name="container_no">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="">Particulars of Consignments</label>
                                            <select class="form-control input-sm">
                                                <option value="" selected>Select</option>
                                                <option value="one">One</option>
                                                <option value="one">One</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="">Amount</label>
                                            <input type="number" class="form-control input-sm" name="">
                                        </div>
                                    </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Particulars of Consignments Table</div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th scope="col" class="text-center">#</th>
                                                            <th scope="col" class="text-center">Particulars of Consignments</th>
                                                            <th scope="col" class="text-center">Taka</th>
                                                            <th scope="col" class="text-center">Poisa</th>
                                                            <th scope="col" class="text-center"><i class="fa fa-trash"></i></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">01</th>
                                                            <th>Particulars</th>
                                                            <td>20</td>
                                                            <td>10</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="2" class="text-right">Voucher Tk</th>
                                                            <td>
                                                                <input type="number" class="form-control input-sm">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control input-sm">
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="2" class="text-right">Previous Due Tk</th>
                                                            <td>
                                                                <input type="number" class="form-control input-sm">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control input-sm">
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="2" class="text-right">Total Voucher Tk</th>
                                                            <td>
                                                                <input type="number" class="form-control input-sm">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control input-sm">
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="2" class="text-right">Cash Received/Pay Order Tk</th>
                                                            <td>
                                                                <input type="number" class="form-control input-sm">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control input-sm">
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="2" class="text-right">Due Tk</th>
                                                            <td>
                                                                <input type="number" class="form-control input-sm">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control input-sm">
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Amount In Words</label>
                                        <input type="text" class="form-control input-sm" name="amount_in_word">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Notes</label>
                                        <textarea name="notes" class="form-control input-sm" id="" cols="30" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <a href="#" class="btn btn-success btn-sm">Submit</a>
                                        <a href="{{route('cnf.index')}}" class="btn btn-default btn-sm">Cancel</a>
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
