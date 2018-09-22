@extends('layout')
@section('title', 'Foreign Purchase List')
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
                        <h2>Foreign Purchase order List</h2>
                    <a href="{{route('purchase-order.create')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Purchase</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered table-hover">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Purchase Order No</th>
                                        <th>Purchase Order Date</th>
                                        <th>Create time</th>
                                        <th>Port of loading</th>
                                        <th>Port of discharge</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($purchase_order_list as $purchase_order)
                                    <tr>
                                    <td>{{$purchase_order->id}}</td>
                                        <td>{{$purchase_order->purchase_order_no}}</td>
                                        <td>{{$purchase_order->purchase_order_date}}</td>
                                        <td>{{$purchase_order->requisition_date}}</td>   
                                        <td>{{$purchase_order->loading->name}}</td>   
                                        <td>{{$purchase_order->discharge->name}}</td>   
                                        <td class="text-right">
                                            <a href="{{route('purchase-order.show',$purchase_order)}}" class="btn btn-sm btn-default btn-xs"><i class="fa fa-eye"></i>View</a>
                                        </td>
                                    </tr>
                                     @endforeach
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