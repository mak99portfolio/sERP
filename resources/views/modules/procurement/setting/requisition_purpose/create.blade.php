@extends('layout')
@section('title', 'Product Brand')
@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Requisition Purpose</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Requisition Purpose</h2>

                         {!! goBack(['url'=>route('requisition-purpose.index'), 'icon'=>'fa-list', 'title'=>'Requisition Purpose List']) !!}
                       
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @include('partials.flash_msg')
                        {{ BootForm::open(['model'=>$requisitionPurpose, 'store'=>'requisition-purpose.store', 'update'=>'requisition-purpose.update']) }}

 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {{ BootForm::text('name','Requisition Purpose', null, ['class'=>'form-control input-sm']) }}
                                </div>
                             </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                             
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {{ BootForm::text('short_name','Short Name', null, ['class'=>'form-control input-sm']) }}
                                </div>
                             </div>
                        </div>
       <div class="col-md-12 col-sm-12 col-xs-12">
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
    </div>
</div>
<!-- /page content -->
@endsection