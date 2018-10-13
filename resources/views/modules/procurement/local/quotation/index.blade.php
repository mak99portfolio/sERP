@extends('layout')
@section('title', 'Quotation List')
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
                        <h2>Quotation List</h2>
                        <a href="{{route('quotation.create')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add New Quotation</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered table-hover">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Vendor</th>
                                        <th>Requisition</th>
                                        <th>Delivery Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01</td>
                                        <td>ewr</td>
                                        <td>fsdf1</td>
                                        <td>20/03/2018</td>
                                        <td class="text-center">
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