@extends('layout')
@section('title', 'Product Size')
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
                        <h2>Product Size</h2>
                        <a href="{{ route('product-size.create') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
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
                                @foreach($product_size_list as $product_size)
                                        <tr>
                                            <th>{{$loop->iteration}}</th>
                                            <th>{{$product_size->name}}</th>
                                            <th>{{$product_size->short_name}}</th>
                                            <td class="text-center"><a href="{{ route('product-size.edit',$product_size) }}" type="button" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i>Edit</a></td>
                                   
                                        </tr>
                                @endforeach
                                <tbody>

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
