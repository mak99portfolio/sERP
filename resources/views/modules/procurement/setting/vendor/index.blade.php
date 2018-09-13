@extends('layout')
@section('title', 'Vendor List')
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
                        <h2>Vendor List</h2>
                    <a href="{{route('vendor.create')}}" class="btn btn-sm btn-default btn-addon pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Vendor</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>SL NO</th>
                                        <th>Vendor Id</th>
                                        <th>Status</th>
                                        <th>Vendor Name</th>
                                        <th>Country</th>
                                        <th>Vendor Category</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01</td>
                                        <td>123</td>
                                        <td>123</td>
                                        <td>123</td>
                                        <td>123</td>
                                        <td>123</td>
                                        <td>123</td>
                                        <td class="text-right">
                                            <a href="#" class="btn btn-sm btn-default btn-xs" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i>View</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--end table-->
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Vendor Name : </h4>
                                </div>
                                <div class="modal-body" style="height: 75vh; overflow-y: auto">
                                    <div class="wrapper-md">
                                        <!--<button class="btn btn-sm btn-info pull-right" id='btn' value='Print'>Print</button>-->
                                        <div id='DivIdToPrint' class="panel panel-default">
                                            <div class="panel-body">
                                                <!-- procurement_report_heading -->
                                                <!--<div data-ng-include=" 'tpl/blocks/procurement_report_heading.html'"></div>-->
                                                <!-- end procurement_report_heading -->
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Hello</th>
                                                            <th>Hello2</th>
                                                            <th>Hello3</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Hi1</td>
                                                            <td>Hi2</td>
                                                            <td>Hi3</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection