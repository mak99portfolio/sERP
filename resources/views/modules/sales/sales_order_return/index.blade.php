@extends('layout')
@section('title', 'Sales Order Return')
@section('content')
<!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Sales Order Return</h2>
                            <a href="{{route('sales-order-return.create')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-bordered datatable-buttons">
                                    <thead class="bg-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Sales Order Return Date</th>
                                        <th>Select Sales Order No</th>
                                        <th>Customer Name</th>
                                        <th>Sales Order Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <body>
                                    @foreach ($sales_order_return_list as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->sales_order_return_date}}</td>
                                        <td>{{$item->sales_order->sales_order_no}}</td>
                                        <td>{{$item->sales_order->customer->name}}</td>
                                        <td>{{$item->sales_order->sales_date}}</td>
                                        <td  width="40" class="text-center">
                                            <a href="{{ route('sales-order-return.show', $item) }}" class="btn btn-block btn-sm btn-default btn-xs"><i class="fa fa-eye"></i>View</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                    </body>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- /page content -->
@endsection
