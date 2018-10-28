@extends('layout')
@section('title', 'Company General Information')
@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
                    <div class="x_title">
                        <h2>Company</h2>
                        <a href="{{ route('company-profile.create') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add Company</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id="popup_area">
                        <br />
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered table-hover">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="25">#</th>
                                        <th>Company Name</th>
                                        <th>Phone Number</th>
                                        <th>Country</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($company_list as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->country->name }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('company-profile.edit',$item) }}" type="button" class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                            <a href="{{ route('company-profile.show',$item) }}" type="button" class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o"></i> View</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end table-->
                    </div>
                </div>
          </div>
          </div>
      <div class="clearfix"></div>
    </div>
  </div>
@endsection