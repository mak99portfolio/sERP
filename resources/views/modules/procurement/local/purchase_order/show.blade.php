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
                                        <td><strong>Ship To Information:</strong> {{ $localPurchaseOrder->ship_info }}</td>
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
                                            <th>Requisition Date</th>
                                            <th>Purchase Requisition Title</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    @foreach ($localPurchaseOrder->requisitions as $item)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $item->requisition_no }} </td>
                                        <td> {{ $item->issued_date }} </td>
                                        <td> {{ $item->requisition_title }} </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                    <thead>
                                            <tr>
                                                <th colspan="12">PO Product Details</th>
                                            </tr>
                                            <tr>
                                                <th>#</th>
                                                <th>Requisition No</th>
                                                <th>Item Name</th>
                                                <th>HS Code</th>
                                                <th>Purchase Quantity</th>
                                                <th>MOU</th>
                                                <th>Unit Price</th>
                                                <th>Sub Total</th>
                                                <th>Discount Rate</th>
                                                <th>Total Discount</th>
                                                <th>VAT Rate(%)</th>
                                                <th>VAT Amount</th>
                                                <th>Total (Net)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($localPurchaseOrder->items as $item)
                                            <tr>
                                                <td> {{ $loop->iteration }} </td>
                                                <td> {{ $item->requisitions->requisition_no }} </td>
                                                <td> {{ $item->product->name }} </td>
                                                <td> {{ $item->product->hs_code }} </td>
                                                <td> {{ $item->quantity }} </td>
                                                <td> {{ $item->product->unit_of_measurement->name }} </td>
                                                <td> {{ $item->unit_price }} </td>
                                                <td> {{ $item->sub_amount() }} </td>
                                                <td> {{ $item->discount_rate }} </td>
                                                <td> {{ $item->discount_amount() }} </td>
                                                <td> {{ $item->vat_rate }} </td>
                                                <td> {{ $item->vat_amount() }} </td>
                                                <td> {{ $item->net_amount() }} </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="7">Total</td>
                                                <td> {{ $localPurchaseOrder->amount() }} </td>
                                                <td></td>
                                                <td> {{ $localPurchaseOrder->total_discount_amount() }} </td>
                                                <td></td>
                                                <td> {{ $localPurchaseOrder->total_vat_amount() }} </td>
                                                <td> {{ $localPurchaseOrder->total_net_amount() }} </td>
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
                                            @foreach ($localPurchaseOrder->payment_terms as $item)
                                            <tr>
                                                <td> {{ $loop->iteration }} </td>
                                                <td> {{ $item->payment_type->name }} </td>
                                                <td> {{ $item->payment_date }} </td>
                                                <td> {{ $item->description }} </td>
                                                <td> {{ $item->amount }} </td>
                                            </tr>
                                            @endforeach
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
                                            @foreach ($localPurchaseOrder->terms_conditions as $item)
                                            <tr>
                                                <td> {{ $loop->iteration }} </td>
                                                <td> {{ $item->terms_condition_type->name }} </td>
                                                <td> {{ $item->description }} </td>
                                            </tr>
                                            @endforeach
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
