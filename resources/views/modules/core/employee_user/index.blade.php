@extends('layout')
@section('title', 'Employee User')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Company Settings</h3>
    </div>
</div>
<div class="clearfix"></div>
{{-- Content here --}}

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Employee Related User</h2>
                {!! btnAddNew(['url'=>route('employee-user.create')]) !!}
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
                            <th width="25">ID</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Assigned Roles</th>
                            <th width="40">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($paginate->table as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->username }}</td>
                            <td>{{ $row->email }}</td>
                            <td>
                                @if($row->getRoleNames()->isNotEmpty())
                                <span class="label label-info">
                                {!! $row->getRoleNames()->implode("</span> <span class='label label-info'>") !!}
                                </span>
                                @endif
                            </td>
                            <td><center>{!! btnDelete(['url'=>route('employee-user.destroy', ['user'=>$row->id])]) !!}</center></td>
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