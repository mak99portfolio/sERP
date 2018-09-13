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
                    <a class="btn btn-primary btn-sm pull-right" href="{{route('country.create')}}"><i class="fa fa-plus"></i> Add new</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Country Name</th>
                                <th>Shortname</th>
                            </tr>
                            @foreach ($country_list as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->short_name}}</td>
                            </tr>
                            @endforeach
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        </div>
    <div class="clearfix"></div>
  </div>
</div>
@endsection