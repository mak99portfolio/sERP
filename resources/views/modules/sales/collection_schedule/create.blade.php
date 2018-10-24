@extends('layout')
@section('title', 'Collection Schedule')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Collection Schedule</h2>
                    <a href="{{ route('collection-schedule.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> Collection Schedule List</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    @include("partials/flash_msg")
                    <form class="form-horizontal form-label-left" action="{{route('collection-schedule.store')}}" method="POST" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('customer', 'Customer',[], null, ['class'=>'form-control input-sm select2']) }}
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::number('dues','Dues', null, ['class'=>'form-control input-sm'])}}
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::number('payment_amount','Payment Amount', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::text('payment_date','Payment Date', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::select('invoice_no','Invoice No', null, ['class'=>'form-control input-sm select2']) }}
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-default btn-sm" style="margin-top: 5px"><i class="fa fa-plus"></i> Add Multi Payment</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th width="25">#</th>
                                            <th class="text-right">Amount</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-right">Invoice No</th>
                                            <th width="30">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01</td>
                                            <td class="text-right">200</td>
                                            <td class="text-center">20/03/2018</td>
                                            <td class="text-right">32200</td>
                                            <td class="text-center"><button type="button" class="btn btn-default btn-sm" title="Remove"><i class="fa fa-trash text-danger"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                    <a href="{{ route('collection-schedule.index')}}" class="btn btn-default btn-sm">Cancel</a>
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
    $(function () {
        $('#date_expected').daterangepicker({
            singleDatePicker: true,
            singleClasses: "picker_3",
            minDate: moment().add('days', 1),
            locale: {
                format: 'DD-MM-YYYY',
            }
        });
    });
</script>
@endsection

