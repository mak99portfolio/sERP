@extends('layout')
@section('title', 'Cost Sheet List')
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
                        <h2>Cost Sheet List</h2>
                        <a href="{{route('cost-sheet.create')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Cost Sheet</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover datatable-buttons">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="25">#</th>
                                        <th>L/C No</th>
                                        <th>L/C Opening Date</th>
                                        <th>Currency</th>
                                        <th>L/C Amount</th>
                                        <th>Exchange Rate</th>
                                        <th>BDT Amount</th>
                                        <th width="30">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cost_sheet_list as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->letter_of_credit->letter_of_credit_no }}</td>
                                        <td>{{ $item->letter_of_credit->letter_of_credit_date }}</td>
                                        <td>{{ $item->currency->name }}</td>
                                        <td>{{ $item->letter_of_credit->letter_of_credit_value }}</td>
                                        <td>{{ $item->exchange_rate }}</td>
                                        <td>{{ $item->bdt_amount }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('cost-sheet.show', $item) }}" class="btn btn-sm btn-default btn-xs btn-block" ><i class="fa fa-eye"></i>View</a>
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
