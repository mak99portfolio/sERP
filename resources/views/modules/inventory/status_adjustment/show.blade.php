@extends('layout')
@section('title', 'Inventory Status Adjustment Details')
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
                        <h2>Status Adjustment Details</h2>
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
                                        <td colspan="4">Status Adjustment</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Adjustment No:</strong> {{ $status_adjustment->inventory_status_adjustment_no }}</td>
                                        <td><strong>Working Unit:</strong>  {{ $status_adjustment->working_unit->name }}</td>
                                        <td><strong>Date:</strong> {{ $carbon->parse($status_adjustment->date)->toFormattedDateString() }}</td>
                                        <td><strong>Product Name:</strong> {{ $status_adjustment->product->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Selected Type:</strong> {{ $status_adjustment->selected_type->name ?? 'Not Specified' }}</td>
                                        <td><strong>Selected Status:</strong> {{ $status_adjustment->selected_status->name ?? 'Not Specified' }}</td>
                                        <td><strong>Selected Status:</strong> {{ $status_adjustment->adjusted_status->name ?? 'Not Specified' }}</td>
                                        <td><strong>Adjusted Quantity:</strong> {{ $status_adjustment->quantity ?? 'Not Specified' }} Pcs.</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><strong>Remarks:</strong> {{ $inventory_receive->remarks ?? 'Not Specified' }}</td>
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