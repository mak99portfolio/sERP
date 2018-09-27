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
                            <td>{{ $row->inventory_receive_no }}</td>
                            <td>{{ title_case($row->receive_type) }}</td>
                            <td>{{ $row->working_unit->name }}</td>
                            <td>{{ $carbon->parse($row->receive_date)->toFormattedDateString() }}</td>
                            <td>
                            @if($row->receive_type=='foreign_purchase')
                                {!! btnCustom(['title'=>'Show', 'url'=>route('receive-foreign-purchase.show', ['receive_foreign_purchase'=>$row->id]), 'btnClass'=>'btn btn-default btn-sm']) !!}
                            @elseif($row->receive_type=='local_purchase')
                                {!! btnCustom(['title'=>'Show', 'url'=>route('receive-local-purchase.show', ['receive_local_purchase'=>$row->id]), 'btnClass'=>'btn btn-default btn-sm']) !!}
                            @elseif($row->receive_type=='internal_receive')
                                {!! btnCustom(['title'=>'Show', 'url'=>route('receive-internal.show', ['receive_internal'=>$row->id]), 'btnClass'=>'btn btn-default btn-sm']) !!}
                            @elseif($row->receive_type=='receive_return')
                                {!! btnCustom(['title'=>'Show', 'url'=>route('receive-return.show', ['receive_return'=>$row->id]), 'btnClass'=>'btn btn-default btn-sm']) !!}
                            @endif
                            </td>
                            <td>
                            @if($row->receive_type=='foreign_purchase')
                                {!! btnCustom(['title'=>'Edit', 'url'=>route('receive-foreign-purchase.edit', ['receive_foreign_purchase'=>$row->id]), 'btnClass'=>'btn btn-default btn-sm']) !!}
                            @elseif($row->receive_type=='local_purchase')
                                {!! btnCustom(['title'=>'Edit', 'url'=>route('receive-local-purchase.edit', ['receive_local_purchase'=>$row->id]), 'btnClass'=>'btn btn-default btn-sm']) !!}
                            @elseif($row->receive_type=='internal_receive')
                                {!! btnCustom(['title'=>'Edit', 'url'=>route('receive-internal.edit', ['receive_internal'=>$row->id]), 'btnClass'=>'btn btn-default btn-sm']) !!}
                            @elseif($row->receive_type=='receive_return')
                                {!! btnCustom(['title'=>'Edit', 'url'=>route('receive-return.edit', ['receive_return'=>$row->id]), 'btnClass'=>'btn btn-default btn-sm']) !!}
                            @endif
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