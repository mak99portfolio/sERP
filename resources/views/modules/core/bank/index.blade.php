@extends('layout')
@section('title', 'Bank')
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
                        <h2>Bank</h2>
                        <a href="{{ route('bank.create') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id="popup_area">
                        <br />
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered table-hover">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="25">#</th>
                                        <th>Bank Name</th>
                                        <th>Short Name</th>
                                        <th>Bank Description</th>
                                        <th>Country</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bank_list as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->short_name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->country->name }}</td>
                                        <td class="text-center"><a href="{{ route('bank.edit',$item) }}" type="button" class="btn btn-default btn-sm"><i class="fa fa-pencil-square-o"></i> Edit</a></td>
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
