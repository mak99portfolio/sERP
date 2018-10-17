@extends('layout')
@section('title', 'District')
@section('content')

<!-- page content -->
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
                        <h2>District</h2>
                        <a href="{{ route('own-vehicle.create') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id="popup_area">
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="25">#</th>
                                        <th>Vehicle No</th>
                                        <th>Driver Name</th>
                                        <th>License Number</th>
                                        <th>Creator</th>
                                        <th>Created At</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paginate as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->vehicle_no }}</td>
                                        <td>{{ $row->employee->name }}</td>
                                        <td>{{ $row->license_nimber }}</td>
                                        <td>{{ $row->creator->name ?? 'Not Specified' }}</td>
                                        <td>{{ empty($row->created_at)?'Not Specified':$row->created_at->diffForHumans() }}</td>
                                        <td class="text-center"><a href="{{ route('own-vehicle.edit', $row->id) }}" type="button" class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a></td>
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
    </div>
</div>
<!-- /page content -->
@endsection
