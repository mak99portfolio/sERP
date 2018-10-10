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
                    <h2>Product Category</h2>
                    <a class="btn btn-primary btn-sm pull-right" href="{{route('product-category.create')}}"><i class="fa fa-plus"></i> Add new</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" id="popup_area">
                    <br />
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-primary">
                            <tr>
                                <th>Product Category Name</th>
                                <th>Short Name</th>      
                                <th class="text-center">Action</th>
                            </tr>
                            <thead>
                            <tbody>
                            @foreach ($product_category as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->short_name}}</td>
                                    <td class="text-center"><a href="{{ route('product-category.edit',$item) }}" type="button" class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a></td>
                              
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <label>Category Tree</label>
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
        </div>
        </div>
    <div class="clearfix"></div>
  </div>
</div>
@endsection
@section('script')

<script src="{{asset('assets/vendors/jstree/jstree.min.js')}}"></script>
<script>
    $(function () {
        // 6 create an instance when the DOM is ready
        $('#jstree').jstree();
        // 7 bind to events triggered on the tree
        $('#jstree').on("changed.jstree", function (e, data) {
            // console.log(data.selected[0]);
            $('#treeField').val($('#'+data.selected[0]).data('category-id'))
        });
    });
</script>
@endsection
