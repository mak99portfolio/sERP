@extends('layout')
@section('title', 'Duty TAX, VAT and CNF Bill')
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
                        <h2>Duty TAX, VAT and CNF Bill</h2>
                        <a href="{{ route('cnf.create') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table  class="table table-bordered datatable-buttons">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="25">#</th>
                                        <th>LC No</th>
                                        <th>Bill No</th>
                                        <th>Bill Date</th>
                                        <th>B/E No</th>
                                        <th>B/E Date</th>
                                        <th width="40">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cnf_list as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->bill_of_lading->letter_of_credit->letter_of_credit_no }}</td>
                                        <td>{{ $item->bill_of_lading->bill_of_lading_no }}</td>
                                        <td>{{ $item->bill_of_lading->bill_of_lading_date }}</td>
                                        <td>{{ $item->bill_of_entry_no }}</td>
                                        <td>{{ $item->bill_of_entry_date }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('cnf.show', $item) }}" class="btn btn-block btn-default btn-xs"><i class="fa fa-eye"></i>View</a>
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
