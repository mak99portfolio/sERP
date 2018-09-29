@extends('layout')
@section('title', 'Company License')
@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                      <h2>Company License</h2>
                      <a class="btn btn-primary btn-sm pull-right" href="{{route('company-license.index')}}"><i class="fa fa-list-ul"></i> Company License List</a>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    @include('partials.flash_msg')
                    <form class="form-horizontal form-label-left" action="{{ route('company-license.store') }}" method="POST">
                        @csrf
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::select('company_profile_id','Company Name', $company_profile_list,null, ['class'=>'form-control input-sm select2']) }}
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('license_name','License Name', null, ['class'=>'form-control input-sm']) }}
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('license_no','License No', null, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('renewed_date','Renewed Date No', null, ['class'=>'form-control input-sm datepicker']) }}
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('expire_date','Expire Date No', null, ['class'=>'form-control input-sm datepicker']) }}
                        </div>
                        
                      </div>
                        <br>
                        <hr>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success btn-sm">Save</button>
                            <a class="btn btn-default btn-sm" href="{{route('company-license.index')}}">Cancel</a>
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
