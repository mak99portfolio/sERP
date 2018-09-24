@extends('layout')
@section('title', 'Foreign Payment')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Procurement</h3>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
    @include('partials/flash_msg')
        <form class="form-horizontal form-label-left input_mask">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-lg-12 col-md-12 col-sm-12 col-xs-12 pt-0">Payment Type</legend>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="1" checked>
                                <label class="form-check-label1" for="exampleRadios1">
                                    Insurance
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="exampleRadios2" value="2">
                                <label class="form-check-labe2" for="exampleRadios2">
                                    L/C Charge
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="exampleRadios3" value="3">
                                <label class="form-check-labe3" for="exampleRadios3">
                                    L/C Retirement
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="exampleRadios4" value="4">
                                <label class="form-check-labe4" for="exampleRadios4">
                                    C&F Express
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="exampleRadios5" value="5">
                                <label class="form-check-labe5" for="exampleRadios5">
                                    Transport Charge
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Insurance</div>
                    <div class="panel-body">
                        <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">L/C Charge</div>
                    <div class="panel-body">
                        <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">L/C Retirment</div>
                    <div class="panel-body">
                        <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">C/F Express</div>
                    <div class="panel-body">
                        <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Transport Charge</div>
                    <div class="panel-body">
                        <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <a href="" class="btn btn-success btn-sm">Submit</a>
                    <a href="" class="btn btn-default btn-sm">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection