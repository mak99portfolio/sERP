@extends('layout')
@section('title', 'Local Purchase Requisition Details')
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
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-4 hidden-xs"><h2 class="text-center">Requisition Title: {{ $localRequisition->requisition_title }}</h2></div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        </div>
                        <div class="visible-xs col-xs-6"><button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</button></div>
                        <div class="visible-xs col-xs-6"><button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button></div>
                        <div class="visible-xs col-xs-12"><h2 class="text-center">Requisition Title : {{ $localRequisition->requisition_title }}</h2></div>
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
                                        <th scope="col" colspan="3" class="text-center">Local Purchase Requisition</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><strong>Requisition No:</strong> {{ $localRequisition->requisition_no }}</td>
                                    <td><strong>Requisition Title:</strong> {{ $localRequisition->requisition_title }}</td>
                                    <td><strong>Issued Date:</strong> {{ $localRequisition->issued_date }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Expected Date:</strong> {{ $localRequisition->date_expected }}</td>
                                    <td><strong>Requisition Purpose:</strong> {{ $localRequisition->purpose->name }}</td>
                                    <td><strong>Requisition Priority:</strong> {{ $localRequisition->priority->name }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="6">Purchase Requistion Items</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td width="40">#</td>
                                    <td class="text-center">Product Name</td>
                                    <td class="text-center">Physical Stock</td>
                                    <td class="text-center">Pending</td>
                                    <td class="text-center">Total Quantity</td>
                                    <td class="text-center">Requisition Quantity</td>
                                </tr>
                                @foreach($localRequisition->items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-center"><strong></strong>{{ $item->product->name }}</td>
                                    <td class="text-right"><strong></strong>{{ $item->physical_stock() }}</td>
                                    <td class="text-right"><strong></strong>{{ $item->pending() }}</td>
                                    <td class="text-right"><strong></strong>{{ $item->total_local_quantity() }}</td>
                                    <td class="text-right"><strong></strong>{{ $item->quantity }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td colspan="7"><strong>Notes: </strong>{{ $localRequisition->note }}</td>
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
