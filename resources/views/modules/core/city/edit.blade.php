@extends('layout')
@section('title', 'City')

@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>City</h2>
                        <a class="btn btn-primary btn-sm pull-right" href="{{route('city.index')}}"><i class="fa fa-list-ul"></i> City List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @include('partials.flash_msg')
                        <form class="form-horizontal form-label-left" action="{{ route('city.update',$city_info->id) }}" method="POST" autocomplete="off">
                        <input name="_method" type="hidden" value="PUT"> 
                        {{ csrf_field() }}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('name','City Name', $city_info->name, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('country_id', 'Country', $country_list, $city_info->country_id, ['class'=>'form-control input-sm select2']) }}
                            </div>
                            <br>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success btn-sm">Update</button>
                                <a class="btn btn-default btn-sm" href="{{route('city.index')}}">Cancel</a>
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
