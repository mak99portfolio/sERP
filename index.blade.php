@extends('layout')
@section('title', 'Commercial Invoice Tracking')
@section('content')
    <!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Port</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <a href="" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add New Commercial Invoice</a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="bg-primary">
                                    <tr>
                                        <th scope="col">Commercial Invoice Tracking No Search</th>
                                        <th scope="col">Commercial Invoice Tracking Issue Date</th>
                                        <th scope="col">Bl Issue Date</th>
                                        <th scope="col">Document Arrived At Bank</th>
                                        <th scope="col">Document Send At Port</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>abc</td>
                                        <td>20-04-2018</td>
                                        <td>20-04-2018</td>
                                        <td>abc.pdf</td>
                                        <td>8</td>
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