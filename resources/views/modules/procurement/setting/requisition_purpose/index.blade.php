@extends('layout')
@section('title', 'Requisition Purpose List')
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
                        <h2>Requisition Purpose</h2>
                        {!! btnAddNew(['url'=>route('requisition-purpose.create')]) !!}
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id="popup_area">
                        <br />
                        {{-- Main content area --}}
                        @include('partials.paginate_header')
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead class="bg-primary">
                                    <tr class='primary'>
                                        <th width="30">#</th>
                                        <th>Name</th>
                                        <th>Short Name</th>
                                        <th>Created At</th>
                                        <th width="100">Edit / Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($paginate->table as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->short_name }}</td>
                                        <td>{{ $carbon->parse($row->created_at)->diffForHumans() }}</td>
                                        <td>
                                            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                                <div class="btn-group" role="group">
                                                    {!! btnEdit(['url'=>route('requisition-purpose.edit', ['requisition_purpose'=>$row->id])]) !!}
                                                </div>
                                                <div class="btn-group" role="group">
                                                    {!! btnDelete(['url'=>route('requisition-purpose.destroy', ['requisition_purpose'=>$row->id])]) !!}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @include('partials.paginate_footer')
                        {{-- End of Main content area --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection