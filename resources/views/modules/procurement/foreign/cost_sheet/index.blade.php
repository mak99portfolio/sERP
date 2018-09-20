@extends('layout')
@section('title', 'Cost Sheet List')
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
                        <h2>Proforma Invoice List</h2>
                        <a href="{{route('cost-sheet.create')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Cost Sheet</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>L/C No</th>
                                        <th>L/C Opening Date</th>
                                        <th>Currency</th>
                                        <th>L/C Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01</td>
                                        <td>01</td>
                                        <td>01</td>
                                        <td>01</td>
                                        <td>01</td>
                                        <td class="text-right">
                                            <a href="#" class="btn btn-sm btn-default btn-xs" ><i class="fa fa-eye"></i>View</a>
                                        </td>
                                    </tr>
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