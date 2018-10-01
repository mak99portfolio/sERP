@extends('layout')
@section('title', 'Bill of Lading List')
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
                        <h2>Bill of Lading List</h2>
                        <a href="{{route('bill-of-lading.create')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add New Bill of Lading</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered">
                                <thead class="bg-primary">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Bill OF lading Issue Date </th>
                                        <th scope="col">BL No</th>
                                        <th scope="col">Moder Of Transport</th>
                                        <th scope="col">Container No</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bill_of_lading_list as $bill_of_lading)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('d-m-Y',strtotime($bill_of_lading->bill_of_lading_date)) }}</td>
                                        <td>{{ $bill_of_lading->bill_of_lading_no }}</td>
                                        <td>{{ $bill_of_lading->modes_of_transport->name }}</td>
                                        <td>{{ $bill_of_lading->container_no }}</td>
                                        <td class="text-center">
                                        <a href="{{route('bill-of-lading.show', $bill_of_lading) }}" class="btn btn-block btn-sm btn-default btn-xs"><i class="fa fa-eye"></i>View</a>
                                        </td>
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

        {{--end content here--}}
    </div>
</div>
@endsection
