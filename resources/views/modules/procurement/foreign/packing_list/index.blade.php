@extends('layout')
@section('title', 'Packing List')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Procurement</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        {{-- Content here --}}
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Packing List</h2>
                        <a href="{{route('packing-list.create')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add New Packing List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered">
                                <thead class="bg-primary">
                                    <tr>
                                        <th scope="col">Ci No</th>
                                        <th scope="col">Ci Date</th>
                                        <th scope="col">Customer Code</th>
                                        <th scope="col">Net Total</th>
                                        <th scope="col">Gross Total</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($packing_list as $item)
                                    <tr>
                                        <td>{{$item->commercial_invoice->commercial_invoice_no}}</td>
                                        <td>{{$item->commercial_invoice->date}}</td>
                                        <td>{{$item->customer_code}}</td>
                                        <td>{{$item->net_total}}</td>
                                        <td>{{$item->gross_total}}</td>
                                       <td class="text-right">
                                            <a href="{{route('packing-list.show',$item)}}" class="btn btn-sm btn-default btn-xs"><i class="fa fa-eye"></i>View</a>
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

        {{--end content here--}}
    </div>
</div>
@endsection