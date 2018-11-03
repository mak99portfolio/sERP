@extends('layout')
@section('title', 'Working Unit')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Employee Profiles</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        {{-- Content here --}}

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Employee Profile <small>List</small></h2>
                        {!! btnAddNew(['url'=>route('employee-profile.create')]) !!}
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id="popup_area">
                        <br/>
                        {{-- Main content area --}}
                        @include('partials.flash_msg')
                        @include('partials.paginate_header')
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead class="bg-primary">
                                    <tr class='primary'>
                                        <th width="25">Employee No</th>
                                        <th>Name</th>
                                        <th>Blood Group</th>
                                        <th>Nationality</th>
                                        <th>NID</th>
                                        <th>Present Address</th>
                                        <th>Permanent Address</th>
                                        <th>Created At</th>
                                        <th class="text-center" width="130">Edit /Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($paginate->table as $row)
                                    <tr>
                                        <td>{{ $row->employee_id }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ empty($row->blood_group->name)?'':$row->blood_group->name }}</td>
                                        <td>{{ $row->nationality }}</td>
                                        <td>{{ $row->national_id }}</td>
                                        <td>{{ $row->present_address }}</td>
                                        <td>{{ $row->permanent_address }}</td>
                                        <td>{{ $carbon->parse($row->created_at)->diffForHumans() }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="...">
                                                <div class="btn-group" role="group">
                                                    {!! btncustom(['icon'=>'fa fa-eye text-warning', 'url'=>route('employee-profile.show', ['employee_profile'=>$row->id])]) !!}
                                                </div>
                                                <div class="btn-group" role="group">
                                                    {!! btnEdit(['url'=>route('employee-profile.edit', ['employee_profile'=>$row->id])]) !!}
                                                </div>
                                                <div class="btn-group" role="group">
                                                    {!! btnDelete(['url'=>route('employee-profile.destroy', ['employee_profile'=>$row->id])]) !!}
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


        {{-- Content end --}}
    </div>
</div>
@endsection