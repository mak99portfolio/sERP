@extends('layout')
@section('title', 'Company General Information')
@section('content')
<!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Company General Information</h2>
                        <a href="{{route('company-profile.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i>  Company General Information List</a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th width="300">Company Name:</th>
                                            <td>{{$companyProfile->name}}</td>       
                                        </tr>
                                        <tr>
                                            <th>Email:</th>
                                            <td>{{$companyProfile->email}}</td>       
                                        </tr>
                                        <tr>
                                            <th>Phone Number:</th>
                                            <td>{{$companyProfile->phone}}</td>       
                                        </tr>
                                        <tr>
                                            <th>Telephone Number:</th>
                                            <td>{{$companyProfile->telephone}}</td>       
                                        </tr>
                                        <tr>
                                            <th>Fax:</th>
                                            <td>{{$companyProfile->fax}}</td>       
                                        </tr>
                                        <tr>
                                            <th>Website:</th>
                                            <td>{{$companyProfile->website}}</td>       
                                        </tr>
                                        <tr>
                                            <th>Address:</th>
                                            <td>{{$companyProfile->address}}</td>       
                                        </tr>
                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection