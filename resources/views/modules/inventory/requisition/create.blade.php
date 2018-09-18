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
                        <h2>Inventory Requisition</h2>
                        <a href="{{route('requisition.index')}}" class="mb-xs mt-xs mr-xs  btn btn-success btn-sm pull-right"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Receive Item List</a>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
						{{ BootForm::open(['model'=>$inventory_requisition, 'store'=>'requisition.store', 'update'=>'requisition.update']) }}
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('requisition_no', null, $requisition_no, ['class'=>'form-control input-sm', 'disabled'=>'true']) }}
                                </div>
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
                </div>
            </div>
        </div>


        {{-- Content end --}}
    </div>
</div>
@endsection