@extends('layout')
@section('title', 'Working Unit')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Working Units List</h3>
    </div>
</div>
<div class="clearfix"></div>
{{-- Content here --}}

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Working Unit <small>List</small></h2>
                <a href="" class="btn btn-primary btn-sm pull-right">Working Unit List</a>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <br/>
            {{-- Main content area --}}
            @include('partials.paginate_header')
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr class='success'>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Parent Unit</th>
                            <th>Unit Type</th>
                            <th>In Charge</th>
                            <th>Country</th>
                            <th>Division</th>
                            <th>District</th>
                            <th>Created At</th>
                            <th>Edit / Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($paginate->table as $row)
                        @if($row->hasRole('super_admin'))
                            @continue
                        @endif
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->company->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->employeesProfile->district->bn_name or '' }}</td>
                            <td>{{ $row->employeesProfile->designation or '' }}</td>
                            <td>
                            @if($row->employeesProfile->joining)
                                {{ $carbon->parse($row->employeesProfile->joining)->toFormattedDateString() }}
                            @endif
                            </td>
                            <td>{{ $row->employeesProfile->mobile or '' }}</td>
                            <td>
                            @if($row->employeesProfile->on_duty==1)
                                <span class='label label-success'>Yes</span>
                            @elseif($row->employeesProfile->on_duty==0)
                                <span class='label label-danger'>No</span>
                            @endif
                            </td>

                            <td>{{ $row->employeesProfile->monthly_salary or '' }}</td>
                            <td>{{ $row->employeesProfile->mailing_address or '' }}</td>

                            @if(Auth::user()->hasAnyRole(['admin','super_admin']))
                            <td>
                                {!! btnEdit(['url'=>url("employees/{$row->id}/edit")]) !!}
                            </td>
                            @endif
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