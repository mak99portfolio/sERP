@extends('layout')
@section('title', 'foreign purchase order')
@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Procurement</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Foreign Purchase Order</h2>
                        <button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive print-area font-12">
                            <table class="">
                                <tbody>
                                    <tr>
                                        <td class="p-5"><strong>{{ Date('F d,Y', strtotime($purchase_order->purchase_order_date)) }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="p-10">Ref No : ME/TYRE/07/2017</td>
                                    </tr>
                                    <tr>
                                        <td>{{ $purchase_order->vendor->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>124,Greams Road</td>
                                    </tr>
                                    <tr>
                                        <td>{{ $purchase_order->vendor->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Attn:Mr Rohit Kr. Mandal (RM - Bangladesh)</td>
                                    </tr>
                                    <tr>
                                        <td class="p-10"><strong>Subect: <u>{{ $purchase_order->subject }}</u></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="p-t-8">Dear Sir,</td>
                                    </tr>
                                    <tr>
                                        <td class="p-b-8">{{ $purchase_order->letter_header }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="text-center">#</td>
                                        <td class="text-center">PRODUCT -DESC</td>
                                        <td class="text-center">QTY</td>
                                        <td class="text-center">UOM</td>
                                        {{-- <td class="text-center">Remark</td> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($purchase_order->items as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->product->name }}</td>
                                        <td class="text-center">{{ $item->quantity }}</td>
                                        <td>{{ $item->product->unit_of_measurement->name }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <p>{{ $purchase_order->letter_footer }}</p>
                            <p>NOTE: {{ $purchase_order->notes }}</p>
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