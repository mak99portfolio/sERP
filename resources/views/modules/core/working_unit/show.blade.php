@extends('layout')
@section('title', 'Working Unit')
@section('content')
<!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Working Unit</h2>
                        <a href="{{route("working-unit.index")}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i>  Working Unit List</a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                          
                                        <tr>
                                            <th width="300">Unit No:</th>
                                            <td>{{$workingUnit->working_unit_no}}</td>
                                        </tr>
                                        <tr>
                                            <th>Company:</th>
                                            <td>{{$workingUnit->company->name}}</td>
                                        </tr>
                                    <tr>
                                        <th>District:</th>
                                        <td>{{$workingUnit->district->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Unit Name:</th>
                                        <td>{{$workingUnit->name}}</td></tr>
                                    <tr> 
                                        <th>In-charge:</th>
                                        <td>{{$workingUnit->employee_in_charge->name}}</td>
                                    </tr>
                                        <tr>
                                            <th>Address:</th>
                                            <td>{{$workingUnit->address}}</td>
                                        </tr>
                                    </tr>
                                    <tr>
                                            <th>Short Name:</th>
                                        <td>{{$workingUnit->short_name}}</td>
                                     
                                    </tr>
                                    <tr>
                                        <th>Country:</th>
                                        <td>{{$workingUnit->country->name}}</td>
                                       
                                    </tr>
                                    <tr>
                                        <th>Parent Working Unit:</th>
                                        <td>{{$workingUnit->parent->name ?? 'Not Specified' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Division:</th>
                                        <td>{{$workingUnit->division->name}}</td>
                                       
                                    </tr>
                                    <tr>
                                        <th>Unit Type:</th>
                                        <td>{{$workingUnit->type->name}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- /page content -->
@endsection