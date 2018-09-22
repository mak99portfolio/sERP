@extends('layout')
@section('title', 'Inventory Requisition')
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
                        <h2>Inventory status Adjustment</h2>
                        <a href="{{route('status-adjustment.index')}}" class="mb-xs mt-xs mr-xs  btn btn-primary btn-sm pull-right"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Inventory stock List</a>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @include('partials.flash_msg')
						{{ BootForm::open(['model'=>$status_adjustment, /*'store'=>'status-adjustment.store',*/ 'update'=>'status-adjustment.update']) }}
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('stock_id', null, $status_adjustment->id, ['class'=>'form-control input-sm', 'disabled'=>'true']) }}
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('product_name', null, $status_adjustment->product->name, ['class'=>'form-control input-sm', 'disabled'=>'true']) }}
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('working_unit_id', 'Working Unit', $working_units, null, ['class'=>'form-control input-sm', 'disabled'=>'true']) }}
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('product_status_id', 'Item Status', $product_statuses, null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('product_pattern_id', 'Item Pattern', $product_patterns, null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::textarea('remarks', null, null, ['class'=>'form-control input-sm', 'rows'=>'3']) }}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <br />
                                <div class="ln_solid"></div>
                                {!! btnSubmitGroup() !!}
                            </div>
                            {{ BootForm::close() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>


        {{-- Content end --}}
    </div>
</div>
@endsection