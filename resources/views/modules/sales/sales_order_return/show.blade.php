@extends('layout')
@section('title', 'Sales Order Return Details')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
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
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-4 hidden-xs"><h2 class="text-center">Sales Order Return</h2></div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        </div>
                        <div class="visible-xs col-xs-6"><button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</button></div>
                        <div class="visible-xs col-xs-6"><button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button></div>
                        <div class="visible-xs col-xs-12"><h2 class="text-center">Sales Order Return</h2></div>
                    </div>
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive print-area">
                                <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="3" class="text-center">Sales Order Return</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><strong>Sales Order Return Date:</strong> {{$sales_order_return->sales_order_return_date}}</td>
                                            <td><strong>Sales Order No:</strong> {{$sales_order_return->sales_order->sales_order_no}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Customer Name:</strong> {{$sales_order_return->sales_order->customer->name}}</td>
                                            <td><strong>Sales Refarence Name:</strong> {{$sales_order_return->sales_order->sales_reference->name}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Sales Order Date :</strong> {{$sales_order_return->sales_order->date}}</td>
                                            <td><strong>Return Reason:</strong> {{$sales_order_return->return_reason->reason}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><strong>Return Person:</strong> {{$sales_order_return->return_person->name}}</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th colspan="11">Sales Order Items</th>
                                        </tr>
                                        <tr>
                                            <th width="30">#</th>
                                            <th>Product Name</th>
                                            <th class="text-center">Return Quantity </th>
                                            <th class="text-center">Unit Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach ($sales_order_return->items as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$item->product->name}}</td>
                                                <td>{{$item->quantity}}</td>
                                                <td>{{$item->unit_price}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td><strong>Remarks:</strong>{{$sales_order_return->remark}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                            <!--start approved by-->
                            <table id="print-footer" style="margin-top: 200px; width: 100%; display: none;">
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
