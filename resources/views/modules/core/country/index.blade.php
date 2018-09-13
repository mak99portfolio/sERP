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
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                <form class="form-horizontal form-label-left" action="{{route('country.store')}}" method="POST">
                    {{csrf_field()}}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Country Name</label>
                                <input class="form-control input-sm" type="text" name="name">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Shortname</label>
                                <input class="form-control input-sm" type="text" name="short_name">
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success">Save</button>
                            <button class="btn btn-default source" onclick="new PNotify({
                                title: 'Regular Success',
                                text: 'That thing that you were trying to do worked!',
                                type: 'success',
                                styling: 'bootstrap3'
                            });">Success</button>
                        </div>
                    </form>
                    
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