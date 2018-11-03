@extends('layout')
@section('title', 'Record Type Lists')
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
                <h2>Record Type<small>List</small></h2>
                {!! btnAddNew(['url'=>route('record-type.create')]) !!}
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <br/>
            {{-- Main content area --}}
            @include('partials.paginate_header')
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr class='bg-primary'>
                            <th>ID</th>
                            <th>Type No</th>
                            <th>Name</th>
                            <th>Short Name</th>
                            <th>Creator</th>
                            <th>Editor</th>
                            <th>Created At</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($paginate->table as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->inventory_record_type_no }}</td>
                            <td>{{ $row->name}}</td>
                            <td>{{ $row->short_name }}</td>
                            <td>{{ $row->creator->name }}</td>
                            <td>{{ $row->editor->name ?? 'Not Specified' }}</td>
                            <td>{{ $carbon->parse($row->created_at)->diffForHumans() }}</td>
                            <td class="text-center">{!! btnEdit(['url'=>route('record-type.edit', ['record_type'=>$row->id])]) !!}</td>
                            <td class="text-center">{!! btnDelete(['url'=>route('record-type.destroy', ['record_type'=>$row->id])]) !!}</td>
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