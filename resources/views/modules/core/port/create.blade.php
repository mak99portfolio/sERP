@extends('layout')
@section('title', 'Port')
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
                      <h2>Port</h2>
                      <a class="btn btn-primary btn-sm pull-right" href="{{route('port.index')}}"><i class="fa fa-list"></i> Port List</a>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <br />
                      @include('partials.flash_msg')
                  <form class="form-horizontal form-label-left" action="{{ route('port.store') }}" method="POST" autocomplete="off">
                      {{ csrf_field() }}
                          <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('name', 'Port Name', null, ['class'=>'form-control input-sm']) }}
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('country_id', 'Country', $country_list, null, ['class'=>'form-control input-sm select2', 'data-popup'=> route('country.index')]) }}
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('city_id', 'City', $city_list, null, ['class'=>'form-control input-sm select2', 'data-popup'=> route('city.index')]) }}
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('contact_person', 'Contact Person Name', null, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('contact_person_number', 'Contact Person Phone Number', null, ['class'=>'form-control input-sm']) }}
                            </div>
                        </div>
                          <br>
                          <hr>
                          <div class="col-md-12 col-sm-6 col-xs-12">
                            <br />
                            <div class="ln_solid"></div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-success">Save</button>
                              <a class="btn btn-default" href="{{route('port.index')}}">Cancel</a>
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
