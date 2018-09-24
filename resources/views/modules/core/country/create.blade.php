@extends('layout')
@section('title', 'Country')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Country</h2>
                        <a class="btn btn-primary btn-sm pull-right" href="{{route('country.index')}}"><i class="fa fa-list-ul"></i> Country List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @include('partials.flash_msg')
                        <form class="form-horizontal form-label-left" action="{{route('country.store')}}" method="POST">
                            {{csrf_field()}}
                            
                              <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name1">Name 
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name1"  data-validate-length-range="6" data-validate-words="2" name="name1"  required="required" type="text">
                                        </div>
                                    </div>
                            
                            
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('name', 'Country Name', null, ['class'=>'form-control input-sm item','data-validate-length-range'=>'6', 'data-validate-words'=>'2', 'required'=>'required']) }}
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('short_name', 'Short Name', null, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                                    <a class="btn btn-default btn-sm" href="{{route('country.index')}}">Cancel</a>
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
