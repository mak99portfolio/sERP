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
                        <h2>Incoming Requisition Details</h2>
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
                                        <td colspan="5">Inventory Requisition</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Requisition Date:</strong> {{ $carbon->parse($inventory_issue_request->requisition->date)->toFormattedDateString() }}</td>
                                        <td><strong>Requisition No:</strong> {{ $inventory_issue_request->requisition->inventory_requisition_no }}</td>
                                        <td><strong>Requisition Type:</strong> {{ $inventory_issue_request->requisition->type->name }}</td>
                                        <td><strong>Requisition From:</strong>  {{ $inventory_issue_request->requisition->sender->name }}</td>
                                        <td><strong>Requested To:</strong>  {{ $inventory_issue_request->requisition->requested_to->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Item Status:</strong>  {{ $inventory_issue_request->requisition->item_status->name }}</td>
                                        <td><strong>Item Type:</strong>  {{ $inventory_issue_request->requisition->item_type->name }}</td>
                                        <td><strong>Initial Approver:</strong>  {{ $inventory_issue_request->requisition->initial_approver->name ?? 'Not Specified' }}</td>
                                        <td colspan="2"><strong>Final Approver:</strong>  {{ $inventory_issue_request->requisition->final_approver->name ?? 'Not Specified' }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"><strong>Remarks:</strong> {{ $inventory_issue_request->requisition->remarks ?? 'Not Specified' }}</td>
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
                                        <td>Requested Quantity</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inventory_issue_request->items as $index=>$row)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $row->product->hs_code }}</td>
                                        <td>{{ $row->product->name }}</td>
                                        <td>{{ $row->quantity }}</td>
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