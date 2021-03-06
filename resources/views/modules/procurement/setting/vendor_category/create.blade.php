@extends('layout')
@section('title', 'Product Brand')
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
                        <h2>Vendor Category</h2>
                        <a href="{{route('vendor-category.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list" aria-hidden="true"></i> Category List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @include('partials.flash_msg')
                        <form class="form-horizontal form-label-left" action="{{route('vendor-category.store')}}" method="POST" autocomplete="off">
                        {{ BootForm::open(['store'=>'vendor-category.store', 'update'=>'vendor-category.update', 'left_column_class' => 'col-md-4 col-xs-12 col-sm-6',  'right_column_class' => 'col-md-8 col-xs-12 col-sm-6']) }}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item">
                            {{ BootForm::text('name','Category Title', null, ['class'=>'form-control input-sm', 'required']) }}
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item">
                            {{ BootForm::text('short_name','Short Title', null, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            {{ BootForm::textarea('description','Category Description', null, ['class'=>'form-control input-sm', 'rows' => 3]) }}
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a class="btn btn-default" href="{{route('vendor-category.index')}}">Cancel</a>
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