@extends('layout')
@section('title', 'Business Type')
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
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Business Type</h2>
                        <a href="{{route('business-type.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> See Business Type Lists</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @include('partials.flash_msg')
                        <form class="form-horizontal form-label-left" action="{{route('business-type.store')}}" method="POST" autocomplete="off">
                        {{ BootForm::open(['store'=>'business-type.store', 'update'=>'business-type.update', 'left_column_class' => 'col-md-4 col-xs-12 col-sm-6',  'right_column_class' => 'col-md-8 col-xs-12 col-sm-6']) }}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item">
                            {{ BootForm::text('name','Title', null, ['class'=>'form-control input-sm', 'required']) }}
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item">
                            {{ BootForm::text('short_name','Short Title', null, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                                    <a class="btn btn-default btn-sm" href="{{route('business-type.index')}}">Cancel</a>
                                </div>
                            </div>
                        {{ BootForm::close() }}
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection