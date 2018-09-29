@extends('layout')
@section('title', 'Foreign Purchase Requisition Details')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                {{--<!-- <div class="breadcrumb">
                    <a>Procurement</a>
                    <a>Foreign Purchase</a>
                    <span>Requisition</span>
                </div>-->--}}
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-reply" aria-hidden="true"></i>&nbsp;Back</button>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-4 hidden-xs"><h2 class="text-center">Requisition Title :{{$foreignRequisition->requisition_title}}</h2></div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        </div>
                        <div class="visible-xs col-xs-6"><button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</button></div>
                        <div class="visible-xs col-xs-6"><button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button></div>
                        <div class="visible-xs col-xs-12"><h2 class="text-center">Requisition Title :{{$foreignRequisition->requisition_title}}</h2></div>
                    </div>
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive DivIdToPrint">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="2" class="text-center">Foreign Purchase Requisition</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row"><strong>Requisition No :</strong>{{$foreignRequisition->requisition_no}}</td>
                                        <td><strong>Requisition Title :</strong>{{$foreignRequisition->requisition_title}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Requisition Purpose :</strong> {{$foreignRequisition->purpose->name}}</td>
                                        <td scope="row"><strong>Requisition Priority :</strong> {{$foreignRequisition->priority->name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="2">Reference No : req-11</th>
                                    </tr>

                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="5">Purchase Requistion Items</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th width="40">#</th>
                                        <th>H.S. CODE</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>UOM</th>
                                    </tr>
                                    @foreach($foreignRequisition->items as $key=>$item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->product->hs_code}}</td>
                                        <td>{{$item->product->name}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->product->unit_of_measurement->name}}</td>
                                    </tr> 
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Date Issued : {{$foreignRequisition->issued_date}}</th>
                                        <th scope="col">Date expected :{{$foreignRequisition->date_expected}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="2">Notes : {{$foreignRequisition->note}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--start approved by-->
                            <table id="print-footer" style="position: absolute; bottom: 20px; width: 100%; display: none;">
                                <tr>
                                    <td style="text-align: center; font-weight: bold;">
                                        <span style="border-top: 2px solid black;"> Prepared By</span>
                                    </td>
                                    <td style="text-align: center; font-weight: bold;">
                                        <span style="border-top: 2px solid black;"> Checked By</span>
                                    </td>
                                    <td style="text-align: center; font-weight: bold;">
                                        <span style="border-top: 2px solid black;"> Approved By</span>
                                    </td>
                                </tr>
                            </table>
                            <!--end approved by-->
                        </div>
                        <!--end table-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection