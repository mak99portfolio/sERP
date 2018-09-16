@extends('layout')
@section('title', 'Port')
@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Master Data</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Port</h2>
                        <a href="{{ route('port.create') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add New Port</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Port Name</th>
                                        <th>Contact Person Name</th>
                                        <th>Contact Person Phone Number</th>
                                        <th>Country</th>
                                        <th>City</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($port_list as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->contact_person }}</td>
                                        <td>{{ $item->contact_person_number }}</td>
                                        <td>{{ $item->country->name }}</td>
                                        <td>{{ $item->city->name }}</td>
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
