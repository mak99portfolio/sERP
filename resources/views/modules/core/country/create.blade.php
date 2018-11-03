@extends('layout')
@section('title', 'Country')
@section('content')
<div class="right_col" role="main">
    <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Master Data</h3>
                </div>
            </div>
            <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Country</h2>
                        <a class="btn btn-primary btn-sm pull-right" href="{{route('country.index')}}"><i class="fa fa-list"></i> Country List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @include('partials.flash_msg')
                        <form class="form-horizontal form-label-left" action="{{route('country.store')}}" method="POST" autocomplete="off">
                            {{csrf_field()}}
                            <div class="col-md-6 offset-md-3 col-sm-6 col-xs-12">
                                {{ BootForm::text('name', 'Country Name', null, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('short_name', 'Short Name', null, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a class="btn btn-default" href="{{route('country.index')}}">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
