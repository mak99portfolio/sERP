@extends('layout')
@section('title', 'Working Unit')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Working Unit</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    {{-- Content here --}}

<div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Working Unit <small>Form</small></h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <br />
                                        
                                        <form class="form-horizontal form-label-left">
                                            
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-4 col-xs-12">Unit Name</label>
                                                    <div class="col-md-9 col-sm-8 col-xs-12">
                                                        <input type="text" class="form-control input-sm" placeholder="Default Input">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            {{ BootForm::select('working_unit_type_id', 'Select Unit Type', $working_unit_types) }}
                                            </div>
                                           
                                            
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

    {{-- Content end --}}
  </div>
</div>
@endsection