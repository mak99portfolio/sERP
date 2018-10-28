@extends('layout')
@section('title', 'Company Bank Information')
@section('content')
<!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Company Bank Information</h2>
                            <a href="{{route('company-bank.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i>  See Company Bank Information List</a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th width="300">Company:</th>
                                            <td>{{$companyBank->company->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Account No:</th>
                                            <td>{{$companyBank->account_no}}</td>
                                        </tr>
                                        <tr>
                                            <th>Account Name:</th>
                                            <td>{{$companyBank->account_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Bank:</th>
                                            <td>{{$companyBank->bank->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Branch Name:</th>
                                            <td>{{$companyBank->branch_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Swift Code:</th>
                                            <td>{{$companyBank->swift_code}}</td>
                                        </tr>
                                        <tr>
                                            <th>Bank Address:</th>
                                            <td>{{$companyBank->address}}</td>
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