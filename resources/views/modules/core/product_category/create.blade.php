@extends('layout')
@section('title', 'Product Category')
@section('style')
<link rel="stylesheet" href="{{asset('assets/vendors/jstree/default/style.min.css')}}">
@endsection
@section('content')

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
                    @include('partials/flash_msg')
                <form class="form-horizontal form-label-left" action="{{route('product-category.store')}}" method="POST" autocomplete="off">
                    {{csrf_field()}}

                        
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Parent Category</label>
                                <input type="hidden" id="treeField" name="parent_product_category_id">
                                <div id="jstree">
                                    <ul>
                                        <li data-jstree='{"selected":true}'>Root
                                            <ul>
                                                {{ generate_tree($product_category_tree) }}
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
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
                                <label>Short Name</label>
                                <input class="form-control input-sm" type="text" name="short_name">
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <br />
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <a class="btn btn-default btn-sm" href="{{route('product-category.index')}}">Cancel</a>
                                <button type="submit" class="btn btn-success btn-sm">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection

@section('script')

<script src="{{asset('assets/vendors/jstree/jstree.min.js')}}"></script>
<!-- js-tree-start-->
<script>
    $(function () {
        // 6 create an instance when the DOM is ready
        $('#jstree').jstree();
        // 7 bind to events triggered on the tree
        $('#jstree').on("changed.jstree", function (e, data) {
            // console.log(data.selected[0]);
            $('#treeField').val($('#'+data.selected[0]).data('category-id'))
        });
        // 8 interact with the tree - either way is OK
        // $('button').on('click', function () {
        //     $('#jstree').jstree(true).select_node('child_node_1');
        //     $('#jstree').jstree('select_node', 'child_node_1');
        //     $.jstree.reference('#jstree').select_node('child_node_1');
        // });
        
    });
</script>
<!-- js-tree-end-->
@endsection