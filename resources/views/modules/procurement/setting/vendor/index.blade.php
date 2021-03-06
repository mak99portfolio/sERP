@extends('layout')
@section('title', 'Vendor List')
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
                        <h2>Vendor</h2>
                        <a href="{{route('vendor.create')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id="popup_area">
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover datatable-buttons">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="25">#</th>
                                        <th>Vendor Id</th>
                                        <th>Vendor Name</th>
                                        <th>Status</th>
                                        <th>Country</th>
                                        <!-- <th>Vendor Category</th> -->
                                        <th width="40">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($vendor_list as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->vendor_id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->status_id}}</td>
                                        <td>{{$item->country->name}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('vendor.show', $item) }}" class="btn btn-sm btn-default btn-xs btn-block"><i class="fa fa-eye"></i>View</a>
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