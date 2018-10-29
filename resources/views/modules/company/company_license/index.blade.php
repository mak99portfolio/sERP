@extends('layout')
@section('title', 'Company License')
@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
                    <div class="x_title">
                        <h2>Company License</h2>
                        <a href="{{ route('company-license.create') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add Company License</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover datatable-buttons">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="25">#</th>
                                        <th>Company Name</th>
                                        <th>License Name</th>
                                        <th>License No</th>
                                        <th>Renewed Date</th>
                                        <th>Expire Date</th>
                                        <th width="30" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($company_license_list as $item)
                                    <tr> 
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->company->name }}</td>
                                        <td>{{ $item->license_name }}</td>
                                        <td>{{ $item->license_no }}</td>
                                        <td>{{ $item->renewed_date }}</td>
                                        <td>{{ $item->expire_date }}</td>
                                        <td class="text-center">
                                            <a href="{{route('company-license.show', $item) }}" class="btn btn-block btn-sm btn-default btn-xs"><i class="fa fa-eye"></i>View</a>
                                            <a href="{{ route('company-license.edit',$item) }}" type="button" class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>
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