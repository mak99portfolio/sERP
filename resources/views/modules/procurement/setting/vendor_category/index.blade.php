@extends('layout')
@section('title', 'Vendor Category List')
@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Procurement</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Vendor Category List</h2>
                        <a href="{{route('vendor-category.create')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add New Category</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Category Title</th>
                                        <th>Short Title</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($vendor_category_list as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->short_name}}</td>
                                        <td class="text-center">
                                        <a href="{{route('vendor-category.show', $item)}}" class="btn btn-block btn-sm btn-default btn-xs">View</a>
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
    </div>
</div>
<!-- /page content -->
@endsection