@extends('layout')
@section('title', 'Sales Order Cancel')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Sales Order Cancel</h2>
                    <a href="{{ route('sales-order-cancel.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> Sales Order Cancel List</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @include('partials.flash_msg')
                    <form class="form-horizontal form-label-left input_mask" action="{{ route('sales-order-cancel.store') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('sales_order_id', 'Sales Order No', $sales_order_list, null, ['class'=>'form-control input-sm select2', 'ng-model'=>'sales_order_id', 'data-placeholder'=>'Select Sales Order No', 'required','data-popup'=> route('sales-order.index')]) }}
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('sales_order_cancel_reason_id', 'Reason', $sales_order_cancel_reason_list, null, ['class'=>'form-control input-sm select2', 'ng-model'=>'sales_order_cancel_reason_id', 'data-placeholder'=>'Select Reason', 'required','data-popup'=> route('sales-order-cancel-reason.index')]) }}
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {{ BootForm::textarea('remarks','Remarks', NULL, ['class'=>'form-control input-sm','rows'=>2]) }}
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                                    <a href="{{ route('sales-order-cancel.index')}}" class="btn btn-default btn-sm">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
