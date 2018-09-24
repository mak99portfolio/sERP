@extends('layout')
@section('title', 'Company General Information')
@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                      <h2>Company General Information</h2>
                      <a class="btn btn-primary btn-sm pull-right" href="{{route('company-profile.index')}}"><i class="fa fa-list-ul"></i> Company General Information List</a>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    @include('partials.flash_msg')
                    <form class="form-horizontal form-label-left" action="{{ route('company-profile.store') }}" method="POST">
                        @csrf
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('name','Company Name', null, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::email('email','Email', null, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::tel('phone','Phone Number', null, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::select('country_id', 'Country', $country_list, null, ['class'=>'form-control input-sm select2']) }}
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {{ BootForm::textarea('address','Address', null, ['class'=>'form-control input-sm', 'rows' => '3']) }}
                        </div>
                      </div>
                        <br>
                        <hr>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success btn-sm">Save</button>
                            <a class="btn btn-default btn-sm" href="{{route('company-profile.index')}}">Cancel</a>
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
