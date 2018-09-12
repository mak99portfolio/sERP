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
                <h2>Working Unit <small>Form</small></h2>
                <a href="" class="btn btn-primary btn-sm pull-right">Working List</a>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />

                {{-- <form class="form-horizontal form-label-left"> --}}
                    {{ BootForm::horizontal(['model'=>$working_unit, 'store'=>'working-unit.store', 'update'=>'working-unit.update', 'left_column_class' => 'col-md-4 col-xs-12 col-sm-6',  'right_column_class' => 'col-md-8 col-xs-12 col-sm-6']) }}



                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {{ BootForm::text('name','Unit Name', null, ['class'=>'form-control input-sm']) }}
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {{ BootForm::select('working_unit_type_id', 'Select Unit Type', $working_unit_types, null, ['class'=>'form-control input-sm']) }}
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {{ BootForm::select('parent_unit_id', 'Parent Working Unit', $working_units, null, ['class'=>'form-control input-sm']) }}
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {{ BootForm::select('in_charge', 'Select In-charge', $users, null, ['class'=>'form-control input-sm']) }}
                    </div>


                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {{ BootForm::text('geo_location','Geo Location',null,['class'=>'form-control input-sm']) }}
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {{ BootForm::textarea('address','Address',null,['class'=>'form-control input-sm','rows'=>'2']) }}
                    </div>
                    <div class="col-md-12">
                        <br />

                        <div class="ln_solid"></div>

                        <div class="form-group">



                           <button type="submit" class="btn btn-primary">Submit</button>
                       </div>

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