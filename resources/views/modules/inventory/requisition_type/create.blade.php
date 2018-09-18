@extends('layout')
@section('title', 'Requisition Type')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Requisition Type</h2>
                        <a class="btn btn-primary btn-sm pull-right" href="{{route('requisition-type.index')}}"><i class="fa fa-list-ul"></i> Requisition Type List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @include('partials.flash_msg')
                        <form class="form-horizontal form-label-left" action="{{route('requisition-type.store')}}" method="POST">
                            {{csrf_field()}}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Requisition Type</label>
                                    <input class="form-control input-sm" type="text" name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Shortname</label>
                                    <input class="form-control input-sm" type="text" name="short_name" value="{{ old('short_name') }}">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                                    <a class="btn btn-default btn-sm" href="{{route('requisition-type.index')}}">Cancel</a>
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
