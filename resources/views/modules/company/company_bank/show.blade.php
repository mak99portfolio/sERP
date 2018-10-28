@extends('layout')
@section('title', 'Company Bank Information')
@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    {{$companyBank}}
                </div>
          </div>
          </div>
      <div class="clearfix"></div>
    </div>
  </div>
@endsection