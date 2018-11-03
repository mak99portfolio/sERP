@extends('layout')
@section('title', 'Terms And Condition Type')
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
                        <h2>Terms Condition Type</h2>
                        <a href="{{ route('terms-and-condition-type.create') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id="popup_area">
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover datatable-buttons">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="25">#</th>
                                        <th>Name</th>
                                        <th>Short Name</th>
                                        <th  class="text-center" width="40">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($terms_and_condition_type_list as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->short_name }}</td>
                                        <td class="text-center"><a href="{{ route('terms-and-condition-type.edit',$item) }}" type="button" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i>Edit</a></td>
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
