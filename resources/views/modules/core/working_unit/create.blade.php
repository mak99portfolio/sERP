@extends('layout')
@section('title', 'Working Unit')
@section('content')
<div class="right_col" role="main">
  <div class="">
      <div class="page-title">
          <div class="title_left">
              <h3>Company Setting</h3>
          </div>
      </div>
      <div class="clearfix"></div>
{{-- Content here --}}

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Working Unit</h2>
                <a href="{{route('working-unit.index')}}" class="mb-xs mt-xs mr-xs  btn btn-primary btn-sm pull-right"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Working Unit List</a>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                  @include('partials.flash_msg')

                {{-- <form class="form-horizontal form-label-left"> --}}
                    {{ BootForm::open(['model'=>$working_unit, 'store'=>'working-unit.store', 'update'=>'working-unit.update', 'left_column_class' => 'col-md-4 col-xs-12 col-sm-6',  'right_column_class' => 'col-md-8 col-xs-12 col-sm-6']) }}
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {{ BootForm::text('working_unit_no','Unit No', $working_unit_no, ['class'=>'form-control input-sm']) }}
                                </div>                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {{ BootForm::text('name','Unit Name', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {{ BootForm::text('short_name','Short Name', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                  
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {{ BootForm::select('parent_unit_id', 'Parent Working Unit', $working_units, null, ['class'=>'form-control input-sm select2']) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    {{ BootForm::select('working_unit_type_id', 'Select Unit Type', $working_unit_types, null, ['class'=>'form-control input-sm select2']) }}
                                </div>
                             

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {{ BootForm::select('company_id', 'Select Company', $companies, null, ['class'=>'form-control input-sm select2', 'data-popup'=> route('company-profile.index')]) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {{ BootForm::select('in_charge', 'Select In-charge', $employees, null, ['class'=>'form-control input-sm select2']) }}
                                </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {{ BootForm::select('country_id', 'Country', $countries,null, ['class'=>'form-control input-sm select2', 'data-popup'=> route('country.index')]) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {{ BootForm::select('division_id', 'Division', $divisions,null, ['class'=>'form-control input-sm select2','id'=>'division_id', 'data-popup'=> route('division.index')]) }}
                                </div>
                            
                                
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {{ BootForm::select('district_id', 'District', $districts,null, ['class'=>'form-control input-sm select2', 'data-popup'=> route('district.index')]) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {{ BootForm::textarea('address','Address',null,['class'=>'form-control input-sm','rows'=>'2']) }}
                                </div>
                            </div>
                        </div>
                    
                    </div>
                 
                    <div class="col-md-12">
                        <br />
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          {!! btnSubmitGroup() !!}
                       </div>
                   </div>
               {{ BootForm::close() }}

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

        var division_id = $(this).val();
     
        $.get("{{ url('core/country-detail') }}", {division_id: division_id}).done(function(response){

            $('#district_id').find('option').remove();

            $.each(response.districts, function(key, district){

                 $('#district_id').append($("<option></option>").attr("value",district.id).text(district.name)); 

            });

        });


    });

    $('#country_id').change(function(){

        var country_id = $(this).val();
     
        $.get("{{ url('core/country-detail') }}", {country_id: country_id}).done(function(response){

            $('#division_id').find('option').remove();
            $('#district_id').find('option').remove();

            var load_first=true;

            $.each(response.divisions, function(key, division){

                $('#division_id').append($("<option></option>").attr("value",division.id).text(division.name));

                if(load_first){

                    $.each(division.districts, function(key, district){

                         $('#district_id').append($("<option></option>").attr("value",district.id).text(district.name)); 

                    });

                    load_first=false;

                }

            });

        });


    });

});//End of jquery
</script>
@endsection