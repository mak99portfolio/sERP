@extends('layout')
@section('title', 'Own Vehicle')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Company Setting</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Own Vehicle</h2>
                        <a class="btn btn-primary btn-sm pull-right" href="{{route("$route_name.index")}}"><i class="fa fa-list"></i> Own Vehicle List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @include('partials.flash_msg')
                        {{ BootForm::open(['model'=>$model, 'store'=>"$route_name.store", 'update'=>"$route_name.update"]) }}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('license_number', null, null, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::select('employee_profile_id', 'Driver', $employees, null,['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <br />
                            <div class="ln_solid"></div>
                            {!! btnSubmitGroup() !!}
                        </div>
                        {{ BootForm::close() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection
