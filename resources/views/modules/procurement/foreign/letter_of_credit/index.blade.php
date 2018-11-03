@extends('layout')
@section('title', 'LC Details')
@section('content')
    <div class="right_col" role="main">
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
                        <h2>LC List</h2>
                        <a href="{{route('letter-of-credit.create')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover datatable-buttons">
                                <thead class="bg-primary">
                                <tr>
                                    <th width="25">#</th>
                                    <th>LC No</th>
                                    <th>LC Date</th>
                                    <th>LC Value</th>
                                    <th width="40">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($letter_of_credit_list as $letter_of_credit)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $letter_of_credit->letter_of_credit_no }}</td>
                                        <td>{{ $letter_of_credit->letter_of_credit_date }}</td>
                                        <td>{{ $letter_of_credit->letter_of_credit_value }}</td>
                                        <td class="text-center">
                                            <a href="{{route('letter-of-credit.show',$letter_of_credit)}}" class="btn btn-sm btn-default btn-xs btn-block"><i class="fa fa-eye"></i>View</a>
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
@endsection
