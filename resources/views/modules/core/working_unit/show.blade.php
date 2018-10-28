@extends('layout')
@section('title', 'Working Unit')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Company Settings</h3>
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
{{$workingUnit}}
                    
                </div>
                </div>
            </div>
        </div>


    </div>
{{-- Content end --}}
</div>
</div>
@endsection