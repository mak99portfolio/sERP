@extends('layout')
@section('title', 'Unit Of Measurement')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Unit Of Measurement</h2>
                    <div class="btn-group pull-right">
                        <a href="{{route('unit-of-measurement.index')}}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i>&nbsp;See Unit Of Measurement list</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                <form class="form-horizontal form-label-left" action="{{route('unit-of-measurement.store')}}" method="POST" autocomplete="off">
                    {{csrf_field()}}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('name', 'Unit Of Measurement Name', null, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('short_name', 'Short Name', null, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <br />
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-sm">Save</button>
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
