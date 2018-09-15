@extends('layout')
@section('title', 'General Information')

@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
        <div class="title_left"><h3>Employee Profile</h3></div>
    </div>

    <div class="clearfix"></div>
    {{-- Content here --}}

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Employee Profile<small>Form</small></h2>
                    <a href="{{route('employee-profile.index')}}" class="mb-xs mt-xs mr-xs  btn btn-success btn-sm pull-right"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Employee Profile List</a>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">


                    {{-- Begining of form wizard --}}
                    <div id="wizard" class="form_wizard wizard_horizontal">

                      <ul class="wizard_steps anchor">
                        <li>
                          <a href="#" class="selected">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                              Step 1<br>
                              <small>Step 1 General Information</small>
                          </span>
                      </a>
                  </li>
                  <li>
                      <a href="#">
                        <span class="step_no">2</span>
                        <span class="step_descr">
                          Step 2<br>
                          <small>Step 2 Organizational Information</small>
                      </span>
                  </a>
              </li>
              <li>
                  <a href="#">
                    <span class="step_no">3</span>
                    <span class="step_descr">
                      Step 3<br>
                      <small>Step 3 Academic Information</small>
                  </span>
              </a>
          </li>
          <li>
              <a href="#">
                <span class="step_no">4</span>
                <span class="step_descr">
                  Step 4<br>
                  <small>Step 4 Experience</small>
              </span>
          </a>
      </li>
      <li>
          <a href="#">
            <span class="step_no">5</span>
            <span class="step_descr">
              Step 5<br>
              <small>Step 5 Referance</small>
          </span>
      </a>
    </li>
    <li>
      <a href="#">
        <span class="step_no">6</span>
        <span class="step_descr">
          Step 6<br>
          <small>Step 6 Training</small>
      </span>
    </a>
    </li>
    <li>
      <a href="#">
        <span class="step_no">7</span>
        <span class="step_descr">
          Step 7<br>
          <small>Step 7 Spouse</small>
      </span>
    </a>
    </li>
    <li>
      <a href="#">
        <span class="step_no">8</span>
        <span class="step_descr">
          Step 8<br>
          <small>Step 8 Certification</small>
      </span>
    </a>
    </li>
    </ul>               


    <div id="step-1" class="content">
        @include('partials.flash_msg')
        {{ BootForm::open(['model'=>$employee_profile, 'store'=>'employee-profile.store', 'update'=>'employee-profile.update']) }}

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            {{ BootForm::text('employee_id') }}
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            {{ BootForm::text('name') }}
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {{ BootForm::text('nationality') }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {{ BootForm::text('national_id', 'National ID (NID)') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {{ BootForm::select('blood_group_id', null, $bloodGroups) }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {{ BootForm::textarea('present_address', null, null, ['rows'=>1]) }}
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {{ BootForm::textarea('permanent_address', null, null, ['rows'=>1]) }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Next {!! fa('fa-arrow-right') !!} Organizational Information</button>
                        {!! btnCustom(['url'=>url()->current(), 'title'=>'Reset', 'icon'=>'fa-refresh']) !!}
                    </div>
                </div>
            </div>

        {{ BootForm::close() }}
    </div>
    </div>
    {{-- End of form wizard --}}


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
</script>
@endsection