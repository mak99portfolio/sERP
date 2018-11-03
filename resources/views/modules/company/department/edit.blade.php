@extends('layout')
@section('title', 'Department')
@section('style')
<link rel="stylesheet" href="{{asset('assets/vendors/jstree/default/style.min.css')}}">
@endsection
@section('content')
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
                        <a class="btn btn-primary btn-sm pull-right" href="{{route('department.index')}}"><i class="fa fa-list-ul"></i> Department List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @include('partials.flash_msg')
                        <form class="form-horizontal form-label-left" action="{{ route('department.update', $department) }}" method="POST" autocomplete="off">
                        <input name="_method" type="hidden" value="PUT"> 
                         {{csrf_field()}}
                         <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Parent Department</label>
                                <input type="hidden" id="treeField" name="parent_department_id">
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
                            <div class="col-md-6 offset-md-3 col-sm-6 col-xs-12">
                                {{ BootForm::text('name', 'Department Name', $department->name, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::textarea('description', 'Description', $department->description, ['class'=>'form-control input-sm','rows'=>1]) }}
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                                    <a class="btn btn-default btn-sm" href="{{route('department.index')}}">Cancel</a>
                                </div>
                            </div>
                        </form>
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
