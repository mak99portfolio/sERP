@extends('layout')
@section('title', 'Quotation COMPARE')
@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Compare Quotation</h2>
                    <a href="{{ route('quotation-compare.create') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Compare Quotation </a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table  class="table table-bordered table-hover datatable-buttons">
                            <thead class="bg-primary">
                                <tr>
                                    <th width="25">#</th>
                                    <th>Requisition No</th>
                                    <th>Requisition Title</th>
                                    <th>Requisition Date</th>
                                    <th>Approval Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>REQ-2018-01-01</td>
                                    <td>title</td>
                                    <td>01-01-2018</td>
                                    <td>02-01-2018</td>
                                    <td class="text-center" width="30">
                                        <a href="#" class="btn btn-block btn-sm btn-default btn-xs"><i class="fa fa-eye"></i>View</a>
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
