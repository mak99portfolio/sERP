@extends('layout')
@section('title', 'Working Unit')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Inventory</h3>
    </div>
</div>
<div class="clearfix"></div>
{{-- Content here --}}


        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Working Unit<small>List</small></h2>

                    <div class="nav navbar-right panel_toolbox">
                        <a href="{{route('working-unit.create')}}" class="mb-xs mt-xs mr-xs  btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Create Working Unit</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <div class="table-responsive">

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Company</th>
                                <th class="text-center">Country</th>
                                <th class="text-center">Division</th>
                                <th class="text-center">Discrict</th>
                                <th class="text-center">Prent Unt Type</th>
                                <th class="text-center">In Charge</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            ?>
                            @foreach($working_unit_list as $value)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$value->company_id}}</td> 
                                <td>{{$value->parent_unit_id}}</td> 
                                <td>{{$value->name}}</td> 
                                <td>{{$value->name}}</td> 
                                <td>{{$value->name}}</td> 
                                <td>{{$value->name}}</td> 
                                <td>{{$value->name}}</td> 
                                <td>{{$value->name}}</td> 

                                <td> 
                                    <div class="pull-right">
                                        <form  action="{{route('working-unit.destroy',$value->id)}}" class="form-horizontal" method="post">
                                            <input name="_method" type="hidden" value="DELETE">
                                            {{ csrf_field() }}

                                            <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this?');" type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;Delete</button>
                                        </form>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{route('working-unit.edit',$value->id)}}"  class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Edit</a>
                                    </div>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>


    </div>
{{-- Content end --}}
</div>
</div>
@endsection