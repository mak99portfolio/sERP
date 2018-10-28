@extends('layout')
@section('title', 'Department')
@section('style')
<link rel="stylesheet" href="{{asset('assets/vendors/jstree/default/style.min.css')}}">
@endsection
@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Company  Setting</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Department</h2>
                        <a href="{{ route('department.create') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id="popup_area">
                        <br />
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered table-hover">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="25">#</th>
                                        <th>Department Name</th>
                                        <th>Description</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($department_list as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td class="text-center"><a href="{{ route('department.edit',$item) }}" type="button" class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end table-->
                        <label>Department Tree</label>
                    <div id="jstree">
                        <ul>
                            <li data-jstree='{"selected":true}'>Root
                                <ul>
                                    {{ generate_tree($department_tree) }}
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
<!-- /page content -->
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
