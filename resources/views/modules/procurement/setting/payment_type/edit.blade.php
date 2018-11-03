@extends('layout')
@section('title', 'Payment Type')
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
                        <h2>Payment Type</h2>
                        <a class="btn btn-primary btn-sm pull-right" href="{{route('payment-type.index')}}"><i class="fa fa-list"></i> Payment Type List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        {{-- @include('partials.flash_msg') --}}
                        <form class="form-horizontal form-label-left" action="{{route('payment-type.update',$paymentType)}}" method="POST" autocomplete="off">
                        <input name="_method" type="hidden" value="PUT"> 
                        {{csrf_field()}}
                            <div class="col-md-6 offset-md-3 col-sm-6 col-xs-12">
                                {{ BootForm::text('name', 'Name', $paymentType->name, ['class'=>'form-control input-sm','required'=>'required']) }}
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('short_name', 'Short Name', $paymentType->short_name, ['class'=>'form-control input-sm','required'=>'required']) }}
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                                    <a class="btn btn-default btn-sm" href="{{route('payment-type.index')}}">Cancel</a>
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

