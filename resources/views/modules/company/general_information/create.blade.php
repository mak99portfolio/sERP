@extends('layout')
@section('title', 'Company General Information')
@section('content')
<div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Company Setting</h3>
            </div>
        </div>
        <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>General Information</h2>
                    <a class="btn btn-primary btn-sm pull-right" href="{{route('company-profile.index')}}"><i class="fa fa-list"></i> General Information List</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    @include('partials.flash_msg')
                    <form class="form-horizontal form-label-left" action="{{ route('company-profile.store') }}" method="POST" autocomplete="off">
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
                            {{ BootForm::tel('telephone','Telephone Number', null, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('fax','Fax', null, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('website','Website', null, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::select('country_id', 'Country', $country_list, null, ['class'=>'form-control input-sm select2', 'data-popup'=>route('country.index')]) }}
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {{ BootForm::textarea('address','Address', null, ['class'=>'form-control input-sm', 'rows' => '3']) }}
                        </div>
                        <br>
                        <hr>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <br />
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a class="btn btn-default" href="{{route('company-profile.index')}}">Cancel</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

  </div>
@endsection
