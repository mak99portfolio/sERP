@extends('layout')
@section('title', 'Working Unit')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Inventory</h3>
    </div>
</div>
<div class="clearfix"></div>
{{-- Content here --}}

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Adjustment Purpose<small>List</small></h2>
                {!! btnAddNew(['url'=>route('adjustment-purpose.create')]) !!}
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
                            <th width="25">ID</th>
                            <th>Name</th>
                            <th>Short Name</th>
                            <th>Creator</th>
                            <th>Editor</th>
                            <th>Created At</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($paginate->table as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name}}</td>
                            <td>{{ $row->short_name }}</td>
                            <td>{{ $row->creator->name ?? 'Not Specified' }}</td>
                            <td>{{ $row->editor->name ?? 'Not Specified' }}</td>
                            <td>{{ $carbon->parse($row->created_at)->diffForHumans() }}</td>
                            <td>{!! btnEdit(['url'=>route('adjustment-purpose.edit', ['adjustment_purpose'=>$row->id])]) !!}</td>
                            <td>{!! btnDelete(['url'=>route('adjustment-purpose.destroy', ['adjustment_purpose'=>$row->id])]) !!}</td>
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