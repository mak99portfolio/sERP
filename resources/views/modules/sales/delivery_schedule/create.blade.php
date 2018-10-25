@extends('layout')
@section('title', 'Delivery Schedule')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Delivery Schedule</h2>
                    <a href="{{ route('delivery-schedule.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> Delivery Schedule List</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" action="{{route('delivery-schedule.store')}}" method="POST" autocomplete="off">

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('customer', 'Customer',[], null, ['class'=>'form-control input-sm select2']) }}
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('so_no','SO No',[], null, ['class'=>'form-control input-sm select2'])}}
                            </div>
                            <div class="col-lg-12 col-sm-12 col-sm-12">
                                <div class="table-responsive m-t-20">
                                    <table class="table table-bordered">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th width="25">#</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-center" width="200px;">Delivery Quantity</th>
                                                <th class="text-center">Date</th>
                                                <th width="30">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td rowspan="2">01</td>
                                                <td class="text-center">product</td>
                                                <td class="text-right">320</td>
                                                <td class="text-center"><input type="text" class="form-control input-sm"></td>
                                                <td class="text-center" rowspan="2">20/03/2018</td>
                                                <td class="text-center" rowspan="2"><button type="button" class="btn btn-default btn-sm" title="Remove"><i class="fa fa-trash text-danger"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">product</td>
                                                <td class="text-right">320</td>
                                                <td class="text-center"><input type="text" class="form-control input-sm"></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>02</td>
                                                <td class="text-center">product</td>
                                                <td class="text-right">320</td>
                                                <td class="text-center"><input type="text" class="form-control input-sm"></td>
                                                <td class="text-center">20/03/2018</td>
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
                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
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

