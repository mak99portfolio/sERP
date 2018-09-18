@extends('layout')
@section('title', 'Receive Item')
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
                        <h2>Receive Item</h2>
                        <a href="{{route('receive.index')}}" class="mb-xs mt-xs mr-xs  btn btn-success btn-sm pull-right"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Receive Item List</a>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <!-- Nav tabs -->

                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"title="Receive Internal"><i class="fa fa-industry" aria-hidden="true"></i> <span class="hidden-xs">Internal Receive</span></a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"title="Receive Agains PO"><i class="fa fa-truck" aria-hidden="true"></i> <span class="hidden-xs">Receive Agains PO</span></a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false"title="Receive Agains Issue"><i class="fa fa-truck" aria-hidden="true"></i> <span class="hidden-xs">Receive Agains Issue</span></a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                    <form class="form-horizontal form-label-left">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input class="form-control input-sm" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Challan No</label>
                                                    <input class="form-control input-sm" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Req No</label>
                                                    <input class="form-control input-sm" type="text" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Receive From</label>
                                                    <input class="form-control input-sm" type="text" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
<!--                                                <div class="form-group">
                                                    <input class="form-control input-sm" type="text">
                                                </div>-->
                                                {{ BootForm::select('purpose_id', 'Working Unit', [''=>'select purpose'] ,['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Remarks</label>
                                                    <textarea class="form-control" rows="2"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border_1" style="border: 1px solid #ddd;margin: 5px 0px;padding: 5px;">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>HS Code</label>
                                                        <!--<input class="form-control input-sm" type="text">-->
                                                        <div class="input-group">
                                                        <input type="text" class="form-control input-sm" placeholder="Search for...">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-default btn-sm" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                                        </span>
                                                    </div><!-- /input-group -->
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Product</label>
                                                        <input class="form-control input-sm" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Issue/Challan Qty</label>
                                                        <input class="form-control input-sm" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Qty</label>
                                                        <input class="form-control input-sm" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-6 col-sm-6">
                                                    <label></label>
                                                    <button class="btn btn-success btn-md m-t-20">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive m-t-20">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>HS Code</th>
                                                    <th>Product</th>
                                                    <th>Issue/Challan Qty</th>
                                                    <th>Qty</th>
                                                </tr>
                                                <tr>
                                                    <td>23</td>
                                                    <td>abc</td>
                                                    <td>3223</td>
                                                    <td>1313</td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="col-md-12">
                                            <br />
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                {!! btnSubmitGroup() !!}
                                            </div>
                                        </div>
                                        {{ BootForm::close() }}
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                    {{ BootForm::open(['model'=>$inventory_receive, 'store'=>'receive.store', 'update'=>'receive.update']) }}
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                
                                                    <label>CI No</label>
                                                    <!--<input class="form-control input-sm" type="text">-->
                                                    <div class="input-group">
                                                        {{ Form::text('ci_no', null, ['class'=>'form-control input-sm', 'placeholder'=>'Insert CI Number']) }}
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-default btn-sm" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                                        </span>
                                                    </div><!-- /input-group -->
                                                
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    {{--<label>Date</label>
                                                    <input class="form-control input-sm" type="text"> --}}
                                                    {{ BootForm::text('receive_date', 'Select Date', null, ['class'=>'form-control input-sm datepicker']) }}
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    {{ BootForm::text('pr_no', 'PO No', null, ['class'=>'form-control input-sm', 'disabled'=>'true']) }}
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('po_no', 'PO No', null, ['class'=>'form-control input-sm', 'disabled'=>'true']) }}
                                            </div>
                                            
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('lc_no', 'LC No', null, ['class'=>'form-control input-sm', 'disabled'=>'true']) }}
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::select('working_unit_id', 'Select Working Unit', $working_units, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Remarks</label>
                                                    <textarea class="form-control" rows="2"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border_1" style="border: 1px solid #ddd;margin: 5px 0px;padding: 5px;">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>HS Code</label>
                                                        <!--<input class="form-control input-sm" type="text">-->
                                                        <div class="input-group">
                                                        <input type="text" class="form-control input-sm" placeholder="Search for...">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-default btn-sm" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                                        </span>
                                                    </div><!-- /input-group -->
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Product</label>
                                                        <input class="form-control input-sm" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Issue/Challan Qty</label>
                                                        <input class="form-control input-sm" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Qty</label>
                                                        <input class="form-control input-sm" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-6 col-sm-6">
                                                    <label></label>
                                                    <button class="btn btn-success btn-md m-t-20">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive m-t-20">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Product LIst</th>
                                                    <th>HS Code</th>
                                                    <th>CI Quantity</th>
                                                    <th>PO Quantity</th>
                                                </tr>
                                                <tr>
                                                    <td>abc</td>
                                                    <td>75</td>
                                                    <td>3223</td>
                                                    <td>1313</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-12">
                                            <br />
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                {!! btnSubmitGroup() !!}
                                            </div>
                                        </div>
                                        {{ BootForm::close() }}
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                    <form class="form-horizontal form-label-left">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Issue No</label>
                                                    <input class="form-control input-sm" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('datepicker','Date', null, ['class'=>'form-control input-sm','id'=>"single_cal4" ]) }}
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Req No</label>
                                                    <input class="form-control input-sm" type="text" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Receive From</label>
                                                    <input class="form-control input-sm" type="text" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive m-t-20">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Issue/Challan Qty</th>
                                                    <th>Qty</th>
                                                </tr>
                                                <tr>
                                                    <td>abc</td>
                                                    <td>3223</td>
                                                    <td>1313</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Remarks</label>
                                                    <textarea class="form-control" rows="2"></textarea>
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

@section('style')
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/eonasdan-bootstrap-datetimepicker@4.17.47/build/css/bootstrap-datetimepicker-standalone.min.css"> --}}
@endsection

@section('script')
{{-- <script src="https://cdn.jsdelivr.net/combine/npm/moment@2.22.2/min/moment.min.js,npm/eonasdan-bootstrap-datetimepicker@4.17.47/build/js/bootstrap-datetimepicker.min.js"></script> --}}
<script>
//$(function(){
    //$('#receive_date').datetimepicker();
//});//End of jquery after load
</script>
@endsection