@extends('layout')
@section('title', 'Customer Zone')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Customer Zone</h2>
                        <a class="btn btn-primary btn-sm pull-right" href="{{route('customer-zone.index')}}"><i class="fa fa-list-ul"></i> Customer Zone  List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @include('partials.flash_msg')
                        <form class="form-horizontal form-label-left" action="{{route('customer-zone.store')}}" method="POST" autocomplete="off">
                            {{csrf_field()}}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('name', 'Zone Name', null, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('name', 'Zone Short Name', null, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('city_ids', 'City', $city_list, null, ['class'=>'form-control input-sm select2','multiple', 'data-placeholder'=>'Select City', 'required']) }}
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                                    <a class="btn btn-default btn-sm" href="{{route('customer-zone.index')}}">Cancel</a>
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
