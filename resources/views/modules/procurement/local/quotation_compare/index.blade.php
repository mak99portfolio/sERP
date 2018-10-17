@extends('layout')
@section('title', 'Quotation COMPARE')
@section('content')

<!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Quotation Compare</h2>
                            <a href="{{ route('quotation-compare.create') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add Quotation Compare</a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="bg-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Select Vendor</th>
                                        <th>Select Requisition</th>
                                        <th>Delivery Date</th>
                                        <th>Payment Type</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>1</th>
                                        <th>125</th>
                                        <th>125</th>
                                        <th>125</th>
                                        <th>125</th>
                                        <th class="text-center"><a href="" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></a></th>
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
