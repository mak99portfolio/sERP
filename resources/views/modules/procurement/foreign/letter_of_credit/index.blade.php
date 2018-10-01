@extends('layout')
@section('title', 'LC Details')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
    <div class="x_title">
                        <h2>LC List</h2>
                    <a href="{{route('letter-of-credit.create')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New LC</a>
                        <div class="clearfix"></div>
                    </div>
    </div>
    <div class="clearfix"></div>
    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered table-hover">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>LC No</th>
                                        <th>LC Date</th>
                                        <th>LC Value</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($letter_of_credit_list as $letter_of_credit)
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $letter_of_credit->letter_of_credit_no }}</td>
                                    <td>{{ $letter_of_credit->letter_of_credit_date }}</td>
                                    <td>{{ $letter_of_credit->letter_of_credit_value }}</td>
                                        <td class="text-right">
                                            <a href="{{route('letter-of-credit.show',$letter_of_credit)}}" class="btn btn-sm btn-default btn-xs"><i class="fa fa-eye"></i>View</a>
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
            <!--end table-->
        </div>
    </div>
</div>
@endsection
