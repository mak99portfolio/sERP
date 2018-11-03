@extends('layout')
@section('title', 'Product Model')
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
                      <h2>Product Model</h2>
                      <a class="btn btn-primary btn-sm pull-right" href="{{route('product-model.index')}}"><i class="fa fa-list"></i> Product Model List</a>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <br />
                      @include('partials.flash_msg')
                  <form class="form-horizontal form-label-left" action="{{ route('product-model.update',$product_model->id) }}" method="POST" autocomplete="off">
                  <input name="_method" type="hidden" value="PUT"> 
                  {{ csrf_field() }}
                          <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('name', 'Name', $product_model->name, ['class'=>'form-control input-sm','required']) }}
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('short_name', 'Short Name', $product_model->short_name, ['class'=>'form-control input-sm','required']) }}
                          </div>
                          <br>
                          <hr>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <br />
                          <div class="ln_solid"></div>
                          <div class="form-group">
                              <button type="submit" class="btn btn-success">Update</button>
                              <a class="btn btn-default" href="{{route('product-model.index')}}">Cancel</a>
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
