@extends('layout')
@section('title', 'Payment')
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
                        <h2>Payment List</h2>
                        <a href="{{route('foreign-payment.create')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add New Payment</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered table-hover">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="25">#</th>
                                        <th>Payment Id</th>
                                        <th>Payment Date</th>
                                        <th>Vendor</th>
                                        <th>Payment Type</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($foreign_payment_list as $key=>$foreign_payment)
                                    <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$foreign_payment->payment_id}}</td>
                                    <td>{{$foreign_payment->payment_date}}</td>
                                    <td>{{$foreign_payment->vendor->name}}</td>
                                    <td>{{$foreign_payment->payment_type->name}}</td>
                                        <td  width="30" class="text-center">
                                            <a href="{{route('foreign-payment.show', $foreign_payment)}}" class="btn btn-block btn-sm btn-default btn-xs"><i class="fa fa-eye"></i>View</a>
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