@extends('layout')
@section('title', 'Product Category')
@section('content')

@section('style')

    <link href="{{asset('assets/vendors/easy_tree/easyTree.min.css')}}" rel="stylesheet">
@endsection

<div class="right_col" role="main">
  <div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Product Category </h2>
                    <div class="btn-group pull-right">
                        <a href="{{route('product-category.index')}}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> See Product Category</a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                <form class="form-horizontal form-label-left" action="{{route('product-category.store')}}" method="POST" autocomplete="off">
                    {{csrf_field()}}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Product Category</label>
                                <select class="form-control input-sm select2" name="product_categorie_id">
                                        <option value="" disabled selected>Select Category</option>

                            @foreach ($product_category as $item)
                                        <option value="{{$item->id}}"> {{$item->name}}</option>
                            @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Product Category Name</label>
                                <input class="form-control input-sm" type="text" name="name">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Shortname</label>
                                <input class="form-control input-sm" type="text" name="short_name">
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <br />
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-sm">Save</button>
                            </div>
                        </div>
                    </form>
                </div>


            <div class="">
                    <div class="col-md-3">
                            <h3 class="text-success">Easy Tree Example</h3>
                            <div class="easy-tree">
                                <ul>
                                    <li>Example 1</li>
                                    <li>Example 2</li>
                                    <li>Example 3
                                        <ul>
                                            <li>Example 1</li>
                                            <li>Example 2
                                                <ul>
                                                    <li>Example 1</li>
                                                    <li>Example 2</li>
                                                    <li>Example 3</li>
                                                    <li>Example 4</li>
                                                </ul>
                                            </li>
                                            <li>Example 3</li>
                                            <li>Example 4</li>
                                        </ul>
                                    </li>
                                    <li>Example 0
                                        <ul>
                                            <li>Example 1</li>
                                            <li>Example 2</li>
                                            <li>Example 3</li>
                                            <li>Example 4
                                                <ul>
                                                    <li>Example 1</li>
                                                    <li>Example 2</li>
                                                    <li>Example 3</li>
                                                    <li>Example 4</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
            </div>



            </div>
        </div>
    </div>
  </div>
</div>
@endsection

@section('script')

    <script src="{{asset('assets/vendors/easy_tree//easyTree.min.js')}}"></script>

<script>
        (function ($) {
            function init() {
                $('.easy-tree').EasyTree({
                    addable: true,
                    editable: true,
                    deletable: true
                });
            }
    
            window.onload = init();
        })(jQuery)
    </script>
@endsection