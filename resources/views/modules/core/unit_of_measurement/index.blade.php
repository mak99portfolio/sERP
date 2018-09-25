@extends('layout')
@section('title', 'Country')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Unit Of Measurement</h2>
                    <a class="btn btn-primary btn-sm pull-right" href="{{route('unit-of-measurement.create')}}"><i class="fa fa-plus"></i> Add new</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-primary">
                            <tr>
                                <th>Unit Of Measurement Name</th>
                                <th>Short Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($uom_list as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->short_name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <div class="clearfix"></div>
  </div>
</div>
@endsection
