@extends('layout')
@section('title', 'Packing List')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Procurement</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        {{-- Content here --}}
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Packing List</h2>
                        <a href="{{route('packing-list.create')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add New Packing List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered">
                                <thead class="bg-primary">
                                    <tr>
                                        <th scope="col">Ci No</th>
                                        <th scope="col">CI Issue Date</th>
                                        <th scope="col">Bl Issue Date</th>
                                        <th scope="col">Document Arrived At Bank</th>
                                        <th scope="col">Doct Send At Port</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>abc</td>
                                        <td>20-04-2018</td>
                                        <td>20-04-2018</td>
                                        <td>abc.pdf</td>
                                        <td>8</td>
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

        {{--end content here--}}
    </div>
</div>
@endsection