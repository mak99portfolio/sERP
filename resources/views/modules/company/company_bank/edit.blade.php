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
                      <a class="btn btn-primary btn-sm pull-right" href="{{route('company-bank.index')}}"><i class="fa fa-list-"></i> Company Bank List</a>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    @include('partials.flash_msg')
                    <form class="form-horizontal form-label-left" action="{{ route('company-bank.update',$companyBank) }}" method="POST" autocomplete="off">
                    <input name="_method" type="hidden" value="PUT"> 
                    @csrf
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::select('company_id', 'Company', $company_list, $companyBank->company_id, ['class'=>'form-control input-sm select2']) }}
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('account_no','Account No', $companyBank->account_no, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('account_name','Account Name', $companyBank->account_name, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::select('bank_id', 'Bank', $bank_list, $companyBank->bank_id, ['class'=>'form-control input-sm select2']) }}
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('branch_name','Branch Name', $companyBank->branch_name, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('swift_code','Swift Code', $companyBank->swift_code, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {{ BootForm::textarea('address','Bank Address', $companyBank->address, ['class'=>'form-control input-sm', 'rows' => '3']) }}
                        </div>
                      </div>
                        <br>
                        <hr>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                  <button type="submit" class="btn btn-success">Update</button>
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
