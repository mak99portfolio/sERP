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
            <div class="x_content">
            <br/>
            {{-- Main content area --}}
            @include('partials.paginate_header')
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr class='primary'>
                            <th>Employee_id</th>
                            <th>Name</th>
                            <th>Blood Group</th>
                            <th>Nationality</th>
                            <th>NID</th>
                            <th>Present Address</th>
                            <th>Permanent Address</th>
                            <th>Created At</th>
                            <th>Edit/Delete</th>
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
                            <td>
                                {!! btnEdit(['url'=>route('employee-profile.edit', ['employee_profile'=>$row->id])]) !!}
                                {!! btnDelete(['url'=>route('employee-profile.destroy', ['employee_profile'=>$row->id])]) !!}
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