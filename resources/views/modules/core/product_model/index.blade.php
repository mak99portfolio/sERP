@extends('layout')
@section('title', 'Product Model')
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
                        <h2>Product Model</h2>
                        <a href="{{ route('product-model.create') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Short Name</th>
                                    </tr>
                                </thead>
                                @foreach($product_model_list as $product_model)
                                        <tr>
                                            <th>{{$loop->iteration}}</th>
                                            <th>{{$product_model->name}}</th>
                                            <th>{{$product_model->short_name}}</th>
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
