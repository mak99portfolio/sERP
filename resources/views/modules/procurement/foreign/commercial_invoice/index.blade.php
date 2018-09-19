@extends('layout')
@section('title', 'Commercial Invoice List')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Procurement</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    {{-- Content here --}}
    <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Commercial Invoice List</h2>
                        <a href="{{route('commercial-invoice.create')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add New Commercial Invoice</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="bg-primary">
                                    <tr>
                                        <th scope="col">Commercial Invoice No</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">LC No</th>
                                        <th scope="col">LC Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>10-12-2018</td>
                                        <td>1</td>
                                        <td>10-12-2018</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-block btn-sm btn-default btn-xs"><i class="fa fa-eye"></i>View</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--end table-->
                    </div>
                </div>
            </div>
        </div>
    
    {{--end Content here --}}
    
  </div>
</div>
@endsection