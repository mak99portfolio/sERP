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
                <h2>Inventory Status Adjustment <small>List</small></h2>
                {!! btnAddNew(['url'=>route('stock-adjustment.create')]) !!}
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
                        	<th>ID</th>
                        	<th>Product ID</th>
                            <th>Product name</th>
                            <th>Working Unit</th>
                            <th>Status</th>
                            <th>Pattern</th>
                            <th>Receive quantity</th>
                            <th>Issue quantity</th>
                            <th>Remarks</th>
                            <th>Created At</th>
                            <th>Update Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($paginate->table as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->product_id }}</td>
                            <td>{{ $row->product->name }}</td>
                            <td>{{ $row->working_unit->name }}</td>
                            <td>{{ $row->status->name }}</td>
                            <td>{{ $row->pattern->name }}</td>
                            <td>{{ $row->receive_quantity}}</td>
                            <td>{{ $row->issue_quantity }}</td>
                            <td>{{ $row->remarks ?? 'Not Specified' }}</td>
                            <td>{{ $carbon->parse($row->created_at)->diffForHumans() }}</td>
                            <td>{!! btnEdit(['url'=>route('status-adjustment.edit', ['status_adjustment'=>$row->id])]) !!}</td>
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