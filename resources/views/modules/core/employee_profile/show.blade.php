@extends('layout')
@section('title', 'Bill of Lading')
@section('content')
<!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Employee Profile</h2>
                        <a href="{{route("employee-profile.index")}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i>  See Employee Profile List</a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th width="300">Employee ID:</th>
                                        <td>{{$EmployeeProfile->employee_id}}</td>
                                    </tr>
                                    <tr>
                                        <th>National ID (NID):</th>
                                        <td>{{$EmployeeProfile->national_id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Present Address:</th>
                                        <td>{{$EmployeeProfile->present_address}}</td>
                                    </tr>
                                    <tr>
                                        <th>Name:</th>
                                        <td>{{$EmployeeProfile->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Blood Group:</th>
                                        <td>{{$EmployeeProfile->blood_group->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Permanent Address:</th>
                                        <td>{{$EmployeeProfile->permanent_address}}</td>
                                    </tr>
                                    <tr>
                                        <th>Nationality:</th>
                                        <td>{{$EmployeeProfile->nationality}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- /page content -->
@endsection