@extends('layout')
@section('title', 'Product Model')
@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                      <h2>Product Model</h2>
                      <a class="btn btn-primary btn-sm pull-right" href="{{route('product-model.index')}}"><i class="fa fa-list-ul"></i> Product Model List</a>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <br />
                      @include('partials.flash_msg')
                  <form class="form-horizontal form-label-left" action="{{ route('product-model.store') }}" method="POST" autocomplete="off">
                      {{ csrf_field() }}
                          <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('name', 'Name', null, ['class'=>'form-control input-sm','required']) }}
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('short_name', 'Short Name', null, ['class'=>'form-control input-sm','required']) }}
                          </div>
                          <br>
                          <hr>
                          <div class="col-md-12">
                              <button type="submit" class="btn btn-success btn-sm">Save</button>
                              <a class="btn btn-default btn-sm" href="{{route('product-model.index')}}">Cancel</a>
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
