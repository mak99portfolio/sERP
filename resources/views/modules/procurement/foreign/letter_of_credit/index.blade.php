@extends('layout')
@section('title', 'LC Details')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
    <div class="x_title">
                        <h2>LC List</h2>
                    <a href="{{route('letter-of-credit.create')}}" class="btn btn-sm btn-success btn-addon pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New LC</a>
                        <div class="clearfix"></div>
                    </div>
    </div>
    <div class="clearfix"></div>
    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>LC No</th>
                                        <th>LC Date</th>
                                        <th>LC Value</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($letter_of_credit_list as $key=>$letter_of_credit)
                                    <tr>
                                    <td>{{$key+1}}</td>    
                                    <td>{{$letter_of_credit->letter_of_credit_no}}</td>    
                                    <td>{{$letter_of_credit->letter_of_credit_date}}</td>    
                                    <td>{{$letter_of_credit->letter_of_credit_value}}</td>    
                                        <td class="text-right">
                                            <a href="{{route('letter-of-credit.show')}}" class="btn btn-sm btn-default btn-xs"><i class="fa fa-eye"></i>View</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end table-->
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Purchase Order list : </h4>
                                </div>
                                <div class="modal-body" style="height: 75vh; overflow-y: auto">
                                    <div class="wrapper-md">
                                        <!--<button class="btn btn-sm btn-info pull-right" id='btn' value='Print'>Print</button>-->
                                        <div id='DivIdToPrint' class="panel panel-default">
                                            <div class="panel-body">
                                                <!-- procurement_report_heading -->
                                                <!--<div data-ng-include=" 'tpl/blocks/procurement_report_heading.html'"></div>-->
                                                <!-- end procurement_report_heading -->
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Hello</th>
                                                            <th>Hello2</th>
                                                            <th>Hello3</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Hi1</td>
                                                            <td>Hi2</td>
                                                            <td>Hi3</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  </div>
</div>
@endsection
