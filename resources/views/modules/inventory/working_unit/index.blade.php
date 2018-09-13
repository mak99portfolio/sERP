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
                {!! btnAddNew(['url'=>route('working-unit.create')]) !!}
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
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td>{{ empty($row->company->name)?'':$row->company->name }}</td>
                            <td>{{ empty($row->parent->name)?'':$row->parent->name }}</td>
                            <td>{{ empty($row->type->name)?'':$row->type->name }}</td>
                            <td>{{ empty($row->in_charge->name)?'':$row->in_charge->name }}</td>
                            <td>{{ empty($row->country->name)?'':$row->country->name }}</td>
                            <td>{{ empty($row->division->name)?'':$row->division->name }}</td>
                            <td>{{ empty($row->district->name)?'':$row->district->name }}</td>
                            <td>{{ $carbon->parse($row->created_at)->diffForHumans() }}</td>
                            <td>
                                {!! btnEdit(['url'=>route('working-unit.edit', ['working_unit'=>$row->id])]) !!}
                                {!! btnDelete(['url'=>route('working-unit.destroy', ['working_unit'=>$row->id])]) !!}
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