@extends('layout')
@section('title', 'District ')

@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>District</h2>
                        <a class="btn btn-primary btn-sm pull-right" href="{{route('district.index')}}"><i class="fa fa-list-ul"></i> Division List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @include('partials.flash_msg')
                        <form class="form-horizontal form-label-left" action="{{ route('district.store') }}" method="POST" autocomplete="off">
                            {{ csrf_field() }}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('country_id', 'Country', $country_list, null, ['class'=>'form-control input-sm select2', 'data-popup'=> route('country.index')]) }}
                            </div>
                         
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('division_id', 'Division', $division_list, null, ['class'=>'form-control input-sm select2', 'data-popup'=> route('division.index')]) }}
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('name','District Name', null, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('latitute','Latitute', null, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('longitude','Longitude', null, ['class'=>'form-control input-sm']) }}
                            </div>
                            <br>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Save</button>
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
