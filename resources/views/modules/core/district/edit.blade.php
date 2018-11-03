@extends('layout')
@section('title', 'District ')

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
                        <h2>District</h2>
                        <a class="btn btn-primary btn-sm pull-right" href="{{route('district.index')}}"><i class="fa fa-list"></i> Division List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @include('partials.flash_msg')
                        <form class="form-horizontal form-label-left" action="{{ route('district.update',$district) }}" method="POST" autocomplete="off">
                        <input name="_method" type="hidden" value="PUT"> 
                        {{ csrf_field() }}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('country_id', 'Country', $country_list, $district->country_id, ['class'=>'form-control input-sm select2']) }}
                            </div>
                         
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('division_id', 'Division', $division_list, $district->division_id, ['class'=>'form-control input-sm select2']) }}
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('name','District Name', $district->name, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('latitute','Latitute', $district->latitute, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('longitude','Longitude', $district->longitude, ['class'=>'form-control input-sm']) }}
                            </div>
                            <br>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a class="btn btn-default" href="{{route('district.index')}}">Cancel</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection
