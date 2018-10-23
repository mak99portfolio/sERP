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
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                           
                                    {{ BootForm::select('invoice_id', 'Invoice No',['1'=>'1','2'=>'2'], null, ['class'=>'form-control input-sm select2', 'ng-model'=>'invoice_no']) }}
                                </div>
                     <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('invoice_date','Invoice Date', null, ['class'=>'form-control input-sm datepicker','id'=>'date_expected']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                   
                                   {{ BootForm::text('invoice_pending_amount','Invoice Pending AMount', null, ['class'=>'form-control input-sm'])}}
                               </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('collection_date','Collection Date', null, ['class'=>'form-control input-sm datepicker','id'=>'date_expected']) }}
                        </div>
                         
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('amount','Amount', null, ['class'=>'form-control input-sm'])}}
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
  $(function(){
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

