@extends('layout')
@section('title', 'Working Unit')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Company Setting</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        {{-- Content here --}}

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Working Unit</h2>
                        {!! btnAddNew(['url'=>route('working-unit.create')]) !!}
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id="popup_area">
                        <br/>
                        {{-- Main content area --}}
                        {{-- @include('partials.paginate_header') --}}
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered datatable-buttons">
                                <thead class="bg-primary">
                                    <tr class='primary'>
                                        <th>Name</th>
                                        <th>Short Name</th>
                                        <th>Company</th>
                                        <th>Parent Unit</th>
                                        <th>Unit Type</th>
                                        <th>In Charge</th>
                                        <th>Country</th>
                                        <th>Division</th>
                                        <th>District</th>
                                        <th>Created At</th>
                                        <th width="100">Edit / Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach($paginate->table as $row) --}}
                                    @foreach($paginate as $row)
                                    <tr>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->short_name }}</td>
                                        <td>{{ $row->company->name ?? 'Not Specified' }}</td>
                                        <td>{{ $row->parent->name ?? 'Not Specified' }}</td>
                                        <td>{{ $row->type->name ?? 'Not Specified' }}</td>
                                        <td>{{ $row->employee_in_charge->name ?? 'Not Specified' }}</td>
                                        <td>{{ $row->country->name ?? 'Not Specified' }}</td>
                                        <td>{{ $row->division->name ?? 'Not Specified' }}</td>
                                        <td>{{ $row->district->name ?? 'Not Specified' }}</td>
                                        <td>{{ $carbon->parse($row->created_at)->diffForHumans() }}</td>
                                        <td>
                                            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                                <div class="btn-group" role="group">
                                                    {!! btnCustom(['icon'=>'fa-eye fa-lg text-warning', 'url'=>route('working-unit.show', ['working_unit'=>$row->id])]) !!}
                                                </div>
                                                <div class="btn-group" role="group">
                                                    {!! btnEdit(['url'=>route('working-unit.edit', ['working_unit'=>$row->id])]) !!}
                                                </div>
                                                <div class="btn-group" role="group">
                                                    {!! btnDelete(['url'=>route('working-unit.destroy', ['working_unit'=>$row->id])]) !!}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- @include('partials.paginate_footer') --}}
                        {{-- End of Main content area --}}
                    </div>
                </div>
            </div>
        </div>


        {{-- Content end --}}
    </div>
</div>
@endsection