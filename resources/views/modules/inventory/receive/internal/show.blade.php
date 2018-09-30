@extends('layout')
@section('title', 'Foreign Purchase Order Details')
@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Inventory</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Internal Receive Details</h2>
                        <div class="btn-group pull-right">
                            <button class="btn btn-sm btn-info print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                            <button type="button" onclick="window.history.back();" class="btn btn-sm btn-success btn-addon"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Back</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive print-area">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td colspan="3">Internal Receive</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Receive No:</strong> {{ $inventory_receive->inventory_receive_no }}</td>
                                        <td><strong>Working Unit:</strong>  {{ $inventory_receive->working_unit->name }}</td>
                                        <td><strong>Date:</strong> {{ $carbon->parse($inventory_receive->receive_date)->toFormattedDateString() }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Requisition No:</strong> {{ $inventory_receive->internal->issue->requisition->inventory_requisition_no }}</td>
                                        <td><strong>Challan No:</strong> {{ $inventory_receive->internal->challan_no ?? 'Not Specified' }}</td>
                                        <td><strong>Receive From:</strong> {{ $inventory_receive->internal->issue->requisition->requested_to->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Product Status:</strong> {{ $inventory_receive->item_status->name }}</td>
                                        <td><strong>Product Pattern:</strong> {{ $inventory_receive->item_pattern->name }}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Remarks:</strong> {{ $inventory_receive->remarks ?? 'Not Specified' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td colspan="7">Product List</td>
                                    </tr>
                                    <tr>
                                        <td>#</td>
                                        <td>HS Code</td>
                                        <td>Item name</td>
                                        <td>Requisition Quantity</td>
                                        <td>Issue Quantity</td>
                                        <td>Return Quantity</td>
                                        <td>Return Status</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inventory_receive->stocks as $index=>$stock)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $stock->product->hs_code }}</td>
                                        <td>{{ $stock->product->name }}</td>
                                        <td>{{ $inventory_receive->internal->issue->requisition->items()->where('product_id', $stock->product_id)->first()->requested_quantity }}</td>
                                        <td>{{ $inventory_receive->internal->issue->items()->where('product_id', $stock->product_id)->first()->requested_quantity }}</td>
                                        <td>{{ $inventory_receive->internal->issue->return_items()->where('product_id', $stock->product_id)->first()->return_quantity ?? 0 }}</td>
                                        <td>{{ $inventory_receive->internal->issue->return_items()->where('product_id', $stock->product_id)->first()->status->name ?? 'Not Specified' }}</td>
                                    </tr>
                                    @endforeach
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