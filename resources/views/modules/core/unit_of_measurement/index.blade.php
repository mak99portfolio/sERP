@extends('layout')
@section('title', 'Country')
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
                    <h2>Unit Of Measurement</h2>
                    <a class="btn btn-primary btn-sm pull-right" href="{{route('unit-of-measurement.create')}}"><i class="fa fa-plus-circle"></i> Add new</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" id="popup_area">
                    <br />
                    <div class="table-responsive">
                        <table  class="table table-bordered datatable-buttons">
                            <thead class="bg-primary">
                            <tr>
                                <th width="25">#</th>
                                <th>Unit Of Measurement Name</th>
                                <th>Short Name</th>  
                                <th class="text-center" width="40">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($uom_list as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->short_name }}</td>
                                    <td class="text-center"><a href="{{ route('unit-of-measurement.edit',$item) }}" type="button" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i>Edit</a></td>
                                
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
