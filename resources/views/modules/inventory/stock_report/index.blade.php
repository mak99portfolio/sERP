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
                        <h2>Stock Report</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        {{ BootForm::inline(['url'=>route('stock-report.store')]) }}
                        {{ BootForm::select('working_unit_id', 'Working Unit', $working_units, null, ['class'=>'input-sm select2']) }}
                        {{ BootForm::select('product_id', 'Product', $products, null, ['class'=>'input-sm select2']) }}
                        {{ BootForm::select('product_status_id', 'Status', $product_statuses, null, ['class'=>'input-sm select2']) }}
                        {{ BootForm::select('product_type_id', 'Pattern', $product_types, null, ['class'=>'input-sm select2']) }}
                        {{-- {{ BootForm::text('date_range', 'Select Date', null, ['class'=>'form-control input-sm date_range', ]) }} --}}
                        {{ BootForm::submit('submit', ['class'=>'btn btn-info btn-sm', 'style'=>'margin-top: 13px;']) }}
                        {{ BootForm::close() }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        {{-- <h2>Stock Report</h2> --}}
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
                                        <td colspan="2">Stock Report On</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Working Unit:</strong>
                                            <span id='working_unit'></span>
                                        </td>
                                        <td><strong>Product:</strong>  <span id="product"></span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status:</strong> <span id="status"></span></td>
                                        <td><strong>Type:</strong> <span id="type"></span></td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td colspan="4">Stock Status</td>
                                    </tr>
                                    <tr>
                                        <td>Physical Quantity</td>
                                        <td>Intransit Quantity</td>
                                        <td>Pending Quantity</td>
                                        <td>Total Quantity</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $physical_quantity ?? 0 }}</td>
                                        <td>{{ $intransit_quantity ?? 0 }}</td>
                                        <td>{{ $pending_quantity ?? 0 }}</td>
                                        <td>{{ $total_quantity ?? 0 }}</td>
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

@section('script')
<script>
    $(function(){

        $('.date_range').daterangepicker({
          singleClasses: "picker_3",
          locale: {
            format: 'DD/MM/YYYY'
          }
        });

        $('#working_unit').html($('#working_unit_id :selected').text());
        $('#product').html($('#product_id :selected').text());
        $('#status').html($('#product_status_id :selected').text());
        $('#type').html($('#product_type_id :selected').text());

    });
</script>
@endsection