@extends('layout')
@section('title', 'Product Details')
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
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-4 hidden-xs"><h2 class="text-center">Product Name : {{$product->name}}</h2></div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        </div>
                        <div class="visible-xs col-xs-6"><button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</button></div>
                        <div class="visible-xs col-xs-6"><button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button></div>
                        <div class="visible-xs col-xs-12"><h2 class="text-center">Product Name :  {{$product->name}}</h2></div>
                    </div>
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive print-area">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Product Name :</strong> {{$product->name}}</td>
                                        <td><strong>HS Code :</strong> {{$product->hs_code}}</td>
                                        <td><strong>Category:</strong> {{$product->product_category->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Select Pattern :</strong>{{$product->product_pattern->name}}</td>
                                        <td><strong>Product Model :</strong>{{$product->product_model->name}}</td>
                                        <td><strong>Product Size :</strong>{{$product->product_size->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Product Set :</strong>{{$product->product_set->name}}</td>
                                        <td colspan="2"><strong>Product Classification Group: </strong>{{$product->product_category->name}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Select Brand :</strong>{{$product->product_brand->name}}</td>
                                        <td><strong>Product Serial :</strong>{{$product->serial}}</td>
                                        <td><strong>Part No :</strong>{{$product->part_number}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Country of Origin :</strong>{{$product->origin_country->name}}</td>
                                        <td><strong>Country of Manufacture :</strong>{{$product->manufacture->name}}</td>
                                        <td><strong>Unit of Measurement -:</strong>{{$product->unit_of_measurement->name}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Active:</strong> {{$product->status()->name}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Rate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>TP:</strong>{{$product->tp_rate}}</td>
                                        <td><strong>MRP:</strong>{{$product->mrp_rate}}</td>
                                        <td><strong>Flat:</strong>{{$product->flat_rate}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Special Rate:</strong>{{$product->special_rate}}</td>
                                        <td><strong>Distributor Rate :</strong>{{$product->distribution_rate}}</td>
                                        <td><strong>Other:</strong>{{$product->other}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="2">Product Packing Info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Pack Size :</strong>{{$product->pack_size}}</td>
                                        <td><strong>Shipper Carton Size :</strong>{{$product->shipper_carton_size}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Description:</strong>{{$product->description}}</td>
                                    </tr>
                                </tbody>
                            </table>
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
