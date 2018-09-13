@extends('layout')
@section('title', 'General Information')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Employee Profile</h3>
    </div>
</div>
<div class="clearfix"></div>
{{-- Content here --}}

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>General Information<small>Form</small></h2>
                <a href="{{route('working-unit.index')}}" class="mb-xs mt-xs mr-xs  btn btn-success btn-sm pull-right"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Employee Profile List</a>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                  @include('partials.flash_msg')

               <div class="" role="tabpanel" data-example-id="togglable-tabs">
    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">General Information</a>
        </li>
        <li role="presentation" class=""><a href="{{route('employee-profile.organizational-info')}}">Organizational Information</a>
        </li>
       
    </ul>
    <div id="myTabContent" class="tab-content">
        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
            <form class="form-horizontal form-label-left">
            <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label>Employee ID</label>
                        <input class="form-control input-sm" type="text">
                    </div>
                </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label>Employee Name</label>
                        <input class="form-control input-sm" type="text">
                    </div>
                </div>

            
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label>Blood Group</label>
                        <select class="form-control input-sm">
                            <option value="" disabled selected>Select Blood Group</option>
                            <option>option1</option>
                            <option>option2</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label>Nationality</label>
                        <input class="form-control input-sm" type="text">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label>Present Address</label>
                        <input class="form-control input-sm" type="text">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label>Permanent NAddress</label>
                        <input class="form-control input-sm" type="text">
                    </div>
                </div>
               
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>


        </div>
       
      
    </div>
</div>


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

