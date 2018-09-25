@extends('layout')
@section('title', 'Product Category')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Product Category</h2>
                    <a class="btn btn-primary btn-sm pull-right" href="{{route('product-category.create')}}"><i class="fa fa-plus"></i> Add new</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-primary">
                            <tr>
                                <th>Product Name</th>
                                <th>Short Name</th>
                            </tr>
                            <thead>
                            <tbody>
                            @foreach ($product_category as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->short_name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <div class="clearfix"></div>
  </div>
</div>
@endsection
