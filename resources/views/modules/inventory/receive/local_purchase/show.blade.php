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
                        <h2>Foreign Receive Details</h2>
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
                                        <td colspan="3">Foreign Receive</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Receive No:</strong> {{ $inventory_receive->inventory_receive_no }}</td>
                                        <td><strong>Working Unit:</strong>  {{ $inventory_receive->working_unit->name }}</td>
                                        <td><strong>Date:</strong> {{ $carbon->parse($inventory_receive->receive_date)->toFormattedDateString() }}</td>                                        
                                    </tr>
                                    <tr>
                                        <td><strong>Purchase Order No:</strong> {{ $inventory_receive->local->purchase_order->purchase_order_no }}</td>
                                        <td><strong>Product Status:</strong> {{ $inventory_receive->item_status->name }}</td>
                                        <td><strong>Product Type:</strong> {{ $inventory_receive->item_pattern->name }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Remarks:</strong> {{ $inventory_receive->remarks ?? 'Not Specified' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td colspan="5">Product List</td>
                                    </tr>
                                    <tr>
                                        <td>#</td>
                                        <td>HS Code</td>
                                        <td>Item name</td>
                                        <td>PO Quantity</td>
                                        <td>Receive Quantity</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inventory_receive->stocks as $index=>$stock)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $stock->product->hs_code }}</td>
                                        <td>{{ $stock->product->name }}</td>
                                        <td>{{ $inventory_receive->local->purchase_order->items()->where('item_id', $stock->product_id)->first()->quantity }}</td>
                                        <td>{{ $stock->receive_quantity }}</td>
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