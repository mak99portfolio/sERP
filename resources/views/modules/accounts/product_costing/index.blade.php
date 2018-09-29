@extends('layout')
@section('title', 'Product Costing')
@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
                    <div class="x_title">
                        <h2>Product Costing</h2>
                        {{-- <a href="{{ route('product-costing.create') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add new</a> --}}
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>BL No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($bill_of_lading_list as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>       
                                        <td>{{ $item->bill_of_lading_no }}</td>       
                                        <td><a href="{{ route('product-costing.show', $item) }}" class="btn btn-default btn-sm">View Cost</a></td>       
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
      <div class="clearfix"></div>
    </div>
  </div>
@endsection