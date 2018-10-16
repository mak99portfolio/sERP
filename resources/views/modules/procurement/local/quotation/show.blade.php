@extends('layout')
@section('title', 'Quotation Details')
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
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-4 hidden-xs"><h2 class="text-center">Quotation No: {{ $quotation->quotation_no }}</h2></div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        </div>
                        <div class="visible-xs col-xs-6"><button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</button></div>
                        <div class="visible-xs col-xs-6"><button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button></div>
                        <div class="visible-xs col-xs-12"><h2 class="text-center">Quotation No: {{ $quotation->quotation_no }}</h2></div>
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
                                        <th scope="col" colspan="3" class="text-center">Local Purchase Quotation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><strong>Vendor:</strong> {{ $quotation->vendor->name }}</td>
                                    <td><strong>Delivery Date:</strong> {{ $quotation->delivery_date }}</td>
                                    <td><strong>Requisition No:</strong> {{ $quotation->local_requisition->requisition_no }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th width="40">#</th>
                                            <th>Product Name</th>
                                            <th>UOM</th>
                                            <th>Unit Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($quotation->items as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->product->name }} </td>
                                                <td>{{ $item->product->unit_of_measurement->name }} </td>
                                                <td>{{ $item->unit_price }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="4">Payment Type</th>
                                            </tr>
                                            <tr>
                                                <th width="40">#</th>
                                                <th>Payment Type </th>
                                                <th>Date </th>
                                                <th>Description</th>
                                                <th>% or Fixed Payment Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($quotation->payment_terms as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->payment_type->name }}</td>
                                                <td>{{ $item->payment_date }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->amount }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="3">Terms and Conditions</th>
                                            </tr>
                                            <tr>
                                                <th width="40">#</th>
                                                <th>Term & Condition </th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($quotation->terms_conditions as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->terms_condition_type->name }}</td>
                                                <td>{{ $item->description }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                </table>
                            </div>
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
