@extends('layout')
@section('title', 'Local Purchase Order Details')
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
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-4 hidden-xs"><h2 class="text-center">Local Purchase Order No: {{ $localPurchaseOrder->purchase_order_no }}</h2></div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        </div>
                        <div class="visible-xs col-xs-6"><button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</button></div>
                        <div class="visible-xs col-xs-6"><button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button></div>
                        <div class="visible-xs col-xs-12"><h2 class="text-center">Local Order No: </h2></div>
                    </div>
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive print-area font-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Vendor Information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Vendor:</strong> {{ $localPurchaseOrder->order_vendor->vendor->name ?? "not specified" }}</td>
                                        <td><strong>Vendor Selection Criteria:</strong> {{ $localPurchaseOrder->order_vendor->vendor_selection_criteria ?? "not specified" }}</td>
                                        <td><strong>Reference No:</strong> {{ $localPurchaseOrder->order_vendor->reference_no ?? "not specified" }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Additional Information:</strong> {{ $localPurchaseOrder->order_vendor->additional_information ?? "not specified" }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Address:</strong> {{ $localPurchaseOrder->order_vendor->address ?? "not specified" }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Genaral PO Information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Purchase Oder Date:</strong> {{ $localPurchaseOrder->purchase_order_date }}</td>
                                        <td><strong>Inco-Terms:</strong> {{ $localPurchaseOrder->inco_terms }}</td>
                                        <td><strong>Inco-Term Info:</strong> {{ $localPurchaseOrder->inco_term_info }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Procurement Type:</strong> {{ $localPurchaseOrder->procurement_type }}</td>
                                        <td><strong>Purchase Order Type:</strong> {{ $localPurchaseOrder->purchase_order_type }}</td>
                                        <td><strong>Status:</strong> {{ $localPurchaseOrder->status }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Shipping Method:</strong> {{ $localPurchaseOrder->shipping_method }}</td>
                                        <td><strong>Payment Method:</strong> {{ $localPurchaseOrder->payment_method }}</td>
                                        <td><strong>Remarks:</strong> {{ $localPurchaseOrder->remarks }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Ship To Information:</strong> {{ $localPurchaseOrder->ship_to_address }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                        <tr>
                                            <th colspan="4">PR Information</th>
                                        </tr>
                                        <tr>
                                            <th>SL NO</th>
                                            <th>Purchase Requisition No</th>
                                            <th>Date</th>
                                            <th>Purchase Requisition Name</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>4352525</td>
                                            <td>2018-10-08 10:00:09</td>
                                            <td>Test Requisition 2</td>
                                        </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                    <thead>
                                            <tr>
                                                <th colspan="12">PO Product Details</th>
                                            </tr>
                                            <tr>
                                                <th>#</th>
                                                <th>Item Name</th>
                                                <th>HS Code</th>
                                                <th>Qty</th>
                                                <th>MOU</th>
                                                <th>Price</th>
                                                <th>Sub Total</th>
                                                <th>D.Rt</th>
                                                <th>Total Disc</th>
                                                <th>VAT Rt(%)</th>
                                                <th>VAT Amt</th>
                                                <th>Total (Net)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>tube </td>
                                                <td>sdfsdfhgf</td>
                                                <td>550</td>
                                                <td>kilogram</td>
                                                <td>25</td>
                                                <td>41</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="6">Total</td>
                                                <td>25</td>
                                                <td></td>
                                                <td>85</td>
                                                <td></td>
                                                <td>85</td>
                                                <td>25</td>
                                            </tr>
                                        </tfoot>
                            </table>
                            <table class="table table-bordered">
                                    <thead>
                                            <tr>
                                                <th colspan="5">Payment Terms</th>
                                            </tr>
                                            <tr>
                                                <th>#</th>
                                                <th>Payment term</th>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>% or Fixed Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>tube </td>
                                                <td>02-20-2018</td>
                                                <td>550</td>
                                                <td>52</td>
                                            </tr>
                                        </tbody>
                            </table>
                            <table class="table table-bordered">
                                    <thead>
                                            <tr>
                                                <th colspan="3">Terms and Condition</th>
                                            </tr>
                                            <tr>
                                                <th>#</th>
                                                <th>Terms and Condition</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>Warranty Terms</td>
                                                <td>asdsa</td>
                                            </tr>
                                        </tbody>
                            </table>
                            <!--start approved by-->
                            <table id="print-footer" style="margin-top: 60px; width: 100%; display: none;">
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
