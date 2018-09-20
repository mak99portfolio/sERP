@extends('layout')
@section('title', 'LC Details')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="x_title">
                <h2>LC List</h2>
                <a href="{{route('letter-of-credit.create')}}" class="btn btn-sm btn-success btn-addon pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New LC</a>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="x_content">
            <br />
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
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
                        <tr>
                            <td>01</td>
                            <td>123</td>
                            <td>12-6-18</td>
                            <td>224</td>    
                            <td class="text-right">
                                <a href="{{route('letter-of-credit.show',1)}}" class="btn btn-sm btn-default btn-xs"><i class="fa fa-eye"></i>View</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!--end table-->
        </div>
    </div>
</div>
@endsection
