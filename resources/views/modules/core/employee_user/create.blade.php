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
                <h2>Employee Login Registration<small>Form</small></h2>
                <a href="{{route('employee-user.index')}}" class="mb-xs mt-xs mr-xs  btn btn-success btn-sm pull-right"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;User List</a>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                  @include('partials.flash_msg')

                {{-- <form class="form-horizontal form-label-left"> --}}
                    {{ BootForm::open(['model'=>$user, 'store'=>'employee-user.store', 'update'=>'employee-user.update']) }}
                    <div class="row">

                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 col-lg-offset-4 col-md-offset-3 col-sm-offset-3">
                            <div class="row">


                                {{ BootForm::select('employee_profile_id', 'Select Employee', $employees, null, ['class'=>'input-sm select2']) }}
                                {{ BootForm::text('username', null, null, ['class'=>'input-sm']) }}
                                {{ BootForm::text('email', null, null, ['class'=>'input-sm']) }}
                                {{ BootForm::password('password', null, ['class'=>'input-sm']) }}
                                {{ BootForm::password('password_confirmation', null, ['class'=>'input-sm']) }}
                                {{ BootForm::select('roles[]', 'Roles', $roles, null, ['class'=>'input-sm select2', 'multiple']) }}
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                {!! btnSubmitGroup() !!}
                                </div>


                            </div>
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