@extends('layout')
@section('title', 'Safety Stock List')
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
                        <h2>Safety Stock List</h2>
                        <a href="{{route('safety-stock.create')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add Safety Stock</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="25">#</th>
                                        <th>Working Unit </th>
                                        <th>Product</th>
                                        <th>Safety Quantity</th>
                                        <th>Total Safety Quantity</th>
                                        <th>Last Checked</th>
                                        <th>Last Checked Stock</th>
                                        <th>Created At</th>
                                        <th width="30">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($paginate as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->working_unit->name ?? 'Not Specified' }}</td>
                                        <td>{{ $row->product->name }}</td>
                                        <td>{{ $row->safety_quantity }}</td>
                                        <td>{{ $row->total_safety_quantity }}</td>
                                        <td>
                                            @if($row->last_checked)
                                                {{ $row->last_checked->diffForHumans() }}
                                            @else
                                                Not Specified
                                            @endif
                                        </td>
                                        <td>{{ $row->last_checked_stock ?? 'Not Specified' }}</td>
                                        <td>
                                            {{ $row->created_at->diffForHumans() }}
                                        </td>
                                        <td class="text-center">
                                            {!! btnEdit(['url'=>route('safety-stock.edit', ['safety_stock'=>$row->id])]) !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end table-->
                    </div>
                </div>
            </div>
        </div>

        {{--end content here--}}
    </div>
</div>
@endsection
