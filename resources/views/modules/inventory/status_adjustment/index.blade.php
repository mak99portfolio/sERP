@extends('layout')
@section('title', 'Status Adjustment ')
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
                {!! btnAddNew(['url'=>route('status-adjustment.create')]) !!}
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
                        	<th>Adjustment No</th>
                        	<th>Working Unit</th>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Selected Type</th>
                            <th>Selected Status</th>
                            <th>Status Changed To</th>
                            <th>Adjusted Quantity</th>
                            <th>Remarks</th>
                            <th>Date</th>
                            <th>Show</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($paginate->table as $row)
                        <tr>
                            <td>{{ $row->inventory_status_adjustment_no }}</td>
                            <td>{{ $row->working_unit->name }}</td>
                            <td>{{ $row->product_id }}</td>
                            <td>{{ $row->product->name }}</td>
                            <td>{{ $row->selected_type->name }}</td>
                            <td>{{ $row->selected_status->name }}</td>
                            <td>{{ $row->adjusted_status->name }}</td>
                            <td>{{ $row->quantity }}</td>
                            <td>{{ $row->remarks ?? 'Not Specified' }}</td>
                            <td>{{ $carbon->parse($row->date)->toFormattedDateString() }}</td>
                            <td>{!! btnCustom(['title'=>'Show', 'url'=>route('status-adjustment.show', ['status_adjustment'=>$row->id])]) !!}</td>
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