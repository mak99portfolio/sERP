@extends('layout')
@section('title', 'Designation')
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
                        <h2>Designation</h2>
                        <a href="{{ route('designation.create') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id="popup_area">
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover datatable-buttons">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="25">#</th>
                                        <th>Designation No</th>
                                        <th>Name</th>
                                        <th>Short Name</th>
                                        <th>Creator</th>
                                        <th>Created At</th>
                                        <th class="text-center" width="40">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paginate as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->designation_no }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->short_name }}</td>
                                        <td>{{ $row->creator->name ?? 'Not Specified' }}</td>
                                        <td>{{ empty($row->created_at)?'Not Specified':$row->created_at->diffForHumans() }}</td>
                                        <td class="text-center"><a href="{{ route('designation.edit', $row) }}" type="button" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i>Edit</a></td>
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
