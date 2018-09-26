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
                <h2>Inventory Stock Adjustment <small>List</small></h2>
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
                            <th>Adjustment No</th>
                            <th>Working Unit</th>
                            <th>Type</th>
                            <th>Purpose</th>
                            <th>Item Status</th>
                            <th>Item Pattern</th>
                            <th>Approver</th>
                            <th>Remarks</th>
                            <th>Adjustment Date</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($paginate->table as $row)
                        <tr>
                            <td>{{ $row->inventory_stock_adjustment_no }}</td>
                            <td>{{ $row->working_unit->name }}</td>
                            <td>{{ $row->adjustment_type }}</td>
                            <td>{{ $row->purpose->name }}</td>
                            <td>{{ $row->item_status->name }}</td>
                            <td>{{ $row->item_pattern->name }}</td>
                            <td>{{ $row->creator->name }}</td>
                            <td>{{ $row->remarks ?? 'Not Specified' }}</td>
                            <td>{{ $carbon->parse($row->created_at)->diffForHumans() }}</td>
                            <td>{!! btnEdit(['url'=>route('stock-adjustment.edit', ['stock_adjustment'=>$row->id])]) !!}</td>
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