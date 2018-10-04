@extends('layout')
@section('title', 'Product List')
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
                        <h2>Product List</h2>
                        <a href="{{route('product.create')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add New Product</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            @include('partials.paginate_header')
                            <table class="table table-bordered table-hover">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>HS Code</th>
                                        <th>Type</th>
                                        <th>Size</th>
                                        <th>Pattern</th>
                                        <th>Set</th>
                                        <th>Brand</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($paginate->table as $key=>$product)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->hs_code}}</td>
                                        <td>{{$product->product_category->name}}</td>
                                        <td>{{$product->product_size->name}}</td>
                                        <td>{{$product->product_pattern->name}}</td>
                                        <td>{{$product->product_set->name}}</td>
                                        <td>{{$product->product_brand->name}}</td>
                                        <td class="text-center">
                                            <a href="{{route('product.show',$product)}}" class="btn btn-block btn-sm btn-default btn-xs"><i class="fa fa-eye"></i>View</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end table-->
                        @include('partials.paginate_footer')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection