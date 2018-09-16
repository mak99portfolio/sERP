@extends('layout')
@section('title', 'Purchase Requisition')
@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Procurement</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <!--{{-- Content here --}}-->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Requisition</h2>
                        <a href="{{route('foreign-requisition.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> See Requisition Lists</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Requisition Title</label>
                                        <input class="form-control input-sm" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Issued Date</label>
                                        <input class="form-control input-sm" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Expected Date</label>
                                        <input class="form-control input-sm" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Requisition Purpose</label>
                                        <select class="form-control input-sm">
                                            <option value="">Choose..</option>
                                            <option value="press">Press</option>
                                            <option value="net">Internet</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Requisition Priority</label>
                                        <select class="form-control input-sm">
                                            <option value="">Choose..</option>
                                            <option value="press">Press</option>
                                            <option value="net">Internet</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default bg-light m-t-15">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-12"><label>Search <a href="#"><strong>Product</strong></a></label></div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="btn-group pull-right">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown">
                                                        Select Product Group <span class="caret"></span></button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#">Tablet</a></li>
                                                        <li><a href="#">Tablet2</a></li>
                                                        <li><a href="#">Tablet3</a></li>
                                                    </ul>
                                                </div>
                                                <button type="button" class="btn btn-default btn-sm"<i class="fa fa-eye"></i><b>See Product Lists</b></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="input-group m-b">
                                            <span class="input-group-addon">
                                                <i class="fa fa-barcode fa-2x"></i>
                                            </span>
                                            <input type="text" class="form-control input-lg" placeholder="Please add products to requisition list">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--start Purchase Order Items table-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th colspan="7">Purchase Order Items</th>
                                        </tr>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Physical stock</th>
                                            <th>Goods in Transit</th>
                                            <th>Pending</th>
                                            <th>Total Quantity</th>
                                            <th>Requisition Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01</td>
                                            <td>5645</td>
                                            <td>5645</td>
                                            <td>5645</td>
                                            <td>5645</td>
                                            <td>5645</td>
                                            <td>5645</td>
                                    </tbody>
                                    <tfoot class="font-bold">
                                        <tr>
                                            <td>Total</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!--end table-->
                            <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea class="form-control input-sm" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                                    <a class="btn btn-default btn-sm" href="{{route('foreign-requisition.index')}}">Cancel</a>
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Content end --}}

    </div>



    <div class="clearfix"></div>

</div>
<!-- /page content -->

@endsection