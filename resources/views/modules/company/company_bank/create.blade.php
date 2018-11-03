@extends('layout')
@section('title', 'Company Bank Information')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Company  Setting</h3>
            </div>
        </div>
        <div class="clearfix"></div>
      <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                      <h2>Company Bank Information</h2>
                      <a class="btn btn-primary btn-sm pull-right" href="{{route('company-bank.index')}}"><i class="fa fa-list-ul"></i> Company Bank List</a>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    @include('partials.flash_msg')
                    <form class="form-horizontal form-label-left" action="{{ route('company-bank.store') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::select('company_id', 'Company', $company_list, null, ['class'=>'form-control input-sm select2','data-popup'=> route('company-profile.index')]) }}
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('account_no','Account No', null, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('account_name','Account Name', null, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::select('bank_id', 'Bank', $bank_list, null, ['class'=>'form-control input-sm select2']) }}
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('branch_name','Branch Name', null, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('swift_code','Swift Code', null, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {{ BootForm::textarea('address','Bank Address', null, ['class'=>'form-control input-sm', 'rows' => '3']) }}
                        </div>
                      </div>
                        <br>
                        <hr>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <br />
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a class="btn btn-default" href="{{route('company-bank.index')}}">Cancel</a>
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
