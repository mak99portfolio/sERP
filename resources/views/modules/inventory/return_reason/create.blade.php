@extends('layout')
@section('title', 'Return Reason')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Inventory</h2>
                        <a class="btn btn-primary btn-sm pull-right" href="{{route("$route_name.index")}}"><i class="fa fa-list-ul"></i> {{ $title }}</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @include('partials.flash_msg')
                        {{ BootForm::open(['model'=>$model, 'store'=>"$route_name.store", 'update'=>"$route_name.update"]) }}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('name', null, null, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('short_name', null, null, ['class'=>'form-control input-sm']) }}
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
