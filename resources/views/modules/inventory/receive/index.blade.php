@extends('layout')
@section('title', 'Receive Item List')
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
                <h2>Inventory Receive List</h2>
                <a href="{{route('receive-internal.create')}}" class="mb-xs mt-xs mr-xs  btn btn-success btn-sm pull-right"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Add Receive Item</a>
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
                            <th>Receive No</th>
                            <th>Type</th>
                            <th>Working Unit</th>
                            <th>Receive Date</th>
                            <th>Details</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($paginate->table as $row)
                        <tr>
                            <td>{{ $row->inventory_receive_id }}</td>
                            <td>{{ title_case($row->type) }}</td>
                            <td>{{ $row->sender->name }}</td>
                            <td>{{ $row->requested_to->name }}</td>
                            <td>{{ $row->item_status->name }}</td>
                            <td>{{ $row->initial_approver->name }}</td>
                            <td>
                            @if($row->final_approver()->exists())
                                {{ $row->initial_approver->name }}
                            @else
                                {!! btnCustom(['title'=>'Final Submit', 'url'=>route('requisition.edit', ['requisition'=>$row->id]), 'btnClass'=>'btn btn-default btn-sm btn-block']) !!}
                            @endif
                            </td>
                            <td>{{ $row->remarks ?? 'Not Specified' }}</td>
                            <td>{{ $carbon->parse($row->date)->diffForHumans() }}</td>
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