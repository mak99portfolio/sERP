@extends('layout')
@section('title', 'Invoice Schedule')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Invoice Schedule</h2>
                    <a href="{{ route('invoice-schedule.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> Invoice Schedule List</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                 
                   
                   <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th width="300">Customer:</th>
                                            <td>{{$invoiceSchedule->customer->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Sales Order No:</th>
                                            <td>{{ $invoiceSchedule->sales_order->sales_order_no }}</td>
                                        </tr>
                                        <tr>
                                            <th>Total Amount:</th>
                                            <td>{{ $invoiceSchedule->sales_order->amount()}}</td>
                                        </tr>
                                        <tr>
                                            <th>Invoice Schedule No:</th>
                                            <td>{{$invoiceSchedule->invoice_schedule_no}}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                         
                            <div class="table-responsive">  
                            <h5>Invoice Schedule Items</h5>        
                            <table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Sales Order No</th>
        <th>Payment Amount</th>
        <th>Payment Date</th>
       
      </tr>
    </thead>
    <tbody>
@foreach($invoiceSchedule->items as $item)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->invoice_schedule->sales_order->sales_order_no }}</td>
        <td class="text-right">{{ $item->payment_amount }}</td>
        <td>{{ $item->payment_date }}</td>
       
      </tr>
      @endforeach
      <tr>
        <td></td>
        <td class="text-right">Total</td>
        <td class="text-right">{{$invoiceSchedule->items->sum('payment_amount')}}</td>
        <td></td>
       
      </tr>
    </tbody>
  </table>
  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

