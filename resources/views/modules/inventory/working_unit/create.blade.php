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
                <a href="{{route('working-unit.index')}}" class="mb-xs mt-xs mr-xs  btn btn-success btn-sm pull-right"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Working Unit List</a>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />

                {{-- <form class="form-horizontal form-label-left"> --}}
                    {{ BootForm::open(['model'=>$working_unit, 'store'=>'working-unit.store', 'update'=>'working-unit.update', 'left_column_class' => 'col-md-4 col-xs-12 col-sm-6',  'right_column_class' => 'col-md-8 col-xs-12 col-sm-6']) }}

<div class="row">

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {{ BootForm::text('name','Unit Name', null, ['class'=>'form-control input-sm']) }}
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {{ BootForm::select('working_unit_type_id', 'Select Unit Type', $working_unit_types, null, ['class'=>'form-control input-sm']) }}
                    </div>
                    </div>
<div class="row">

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {{ BootForm::text('short_name','Short Name', null, ['class'=>'form-control input-sm']) }}
                    </div>

                   
                    </div>
                    
<div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {{ BootForm::select('parent_unit_id', 'Parent Working Unit', $working_units, null, ['class'=>'form-control input-sm']) }}
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {{ BootForm::select('company_id', 'Select Company', $companies, null, ['class'=>'form-control input-sm']) }}
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {{ BootForm::select('in_charge', 'Select In-charge', $users, null, ['class'=>'form-control input-sm']) }}
                    </div>
                    </div>


<div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">

                        {{ BootForm::select('country_id', 'Country', $countries, ['class'=>'form-control input-sm']) }}
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">

                        {{ BootForm::select('division_id', 'Division', $divisions, ['class'=>'form-control input-sm','id'=>'division_id']) }}
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">

                        {{ BootForm::select('district_id', 'District', $districts, ['class'=>'form-control input-sm']) }}
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {{ BootForm::textarea('address','Address',null,['class'=>'form-control input-sm','rows'=>'2']) }}
                    </div>
                    </div>

<div class="row">
                    <div class="col-md-12">
                        <br />

                        <div class="ln_solid"></div>

                        <div class="form-group">



                           <button type="submit" class="btn btn-primary">Submit</button>
                           {!! btnCustom(["url"=>url()->current(), "title"=>"reset"]) !!}
                       </div>

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
@section('script')
<script>
	$(document).ready(function(){

$('#division_id').change(function(){

  var division_id = $('#division_id').val();

 
 $.get("{{ url('inventory/district-search') }}/" + division_id, function(data){
    console.log(data);
  });


});

});

</script>
@endsection