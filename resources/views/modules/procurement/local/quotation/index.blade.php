@extends('layout')
@section('title', 'Quotation List')
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
                        <h2>Quotation List</h2>
                        <a href="{{route('quotation.create')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add New Quotation</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover datatable-buttons">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="25">#</th>
                                        <th>Quotation No</th>
                                        <th>Vendor</th>
                                        <th>Requisition No</th>
                                        <th>Delivery Date</th>
                                        <th width="30">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($quotation_list as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->quotation_no }}</td>
                                        <td>{{ $item->vendor->name }}</td>
                                        <td>{{ $item->local_requisition->requisition_no }}</td>
                                        <td>{{ $item->delivery_date }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('quotation.show', $item) }}" class="btn btn-block btn-sm btn-default btn-xs"><i class="fa fa-eye"></i>View</a>
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
