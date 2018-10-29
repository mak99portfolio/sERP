@extends('layout')
@section('title', 'Product Brand List')
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
                        <h2>Product Brand List</h2>
                        <a href="{{route('product-brand.create')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add New Brand</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id="popup_area">
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover datatable-buttons">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="25">#</th>
                                        <th>Brand Name</th>
                                        <th>Short Name</th>
                                        <th class="text-center" width="30">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($product_brand as $brand)
                                    <tr>
                                        <td>{{$brand->id}}</td>
                                        <td>{{$brand->name}}</td>
                                        <td>{{$brand->short_name}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('product-brand.edit',$brand) }}" type="button" class="btn btn-default btn-sm"><i class="fa fa-pencil-square-o"></i> Edit</a>
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