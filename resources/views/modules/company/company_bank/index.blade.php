@extends('layout')
@section('title', 'Company Bank Information')
@section('content')
<div class="right_col" role="main">
    <div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Company  Setting</h3>
        </div>
    </div>
    <div class="clearfix"></div>
      <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
                    <div class="x_title">
                        <h2>Bank Information</h2>
                        <a href="{{ route('company-bank.create') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover datatable-buttons">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="25">#</th>
                                        <th>Account No</th>
                                        <th>Account Name</th>
                                        <th>Bank Name</th>
                                        <th>Branch Name</th>
                                        <th>Swift Code</th> 
                                        <th class="text-center" width="40">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bank_list as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->account_no }}</td>
                                        <td>{{ $item->account_name }}</td>
                                        <td>{{ $item->bank->name }}</td>
                                        <td>{{ $item->branch_name }}</td>
                                        <td>{{ $item->swift_code }}</td>  
                                        <td class="text-center">
                                            <a href="{{ route('company-bank.edit',$item) }}" type="button" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i>Edit</a>
                                            <a href="{{ route('company-bank.show',$item) }}" type="button" class="btn btn-default btn-xs"><i class="fa fa-eye"></i>View</a>
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
      <div class="clearfix"></div>
    </div>
  </div>
@endsection