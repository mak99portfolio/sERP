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
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Requisition Title</label>
                                    <input class="form-control input-sm" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Issued Date</label>
                                    <input class="form-control input-sm" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Expected Date</label>
                                    <input class="form-control input-sm" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Requisition Purpose</label>
                                    <select class="form-control input-sm">
                                        <option value="">Choose..</option>
                                        <option value="press">Press</option>
                                        <option value="net">Internet</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Requisition Priority</label>
                                    <select class="form-control input-sm">
                                        <option value="">Choose..</option>
                                        <option value="press">Press</option>
                                        <option value="net">Internet</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="panel panel-default bg-light m-t-15">
                                    <div class="panel-heading">
                                        <label>Search <a href="#"><strong>Product</strong></a></label>
                                        <button class="btn btn-sm btn-default btn-addon pull-right" data-toggle="modal"
                                                data-target="#myModal"><i class="fa fa-eye"></i><b>See Product Lists</b></button>
                                    </div>
                                    <div class="panel-body">
                                        <div class="input-group m-b">
                                            <span class="input-group-addon">
                                                <i class="fa fa-barcode fa-2x"></i>
                                            </span>
                                            <input type="text" class="form-control input-lg" placeholder="Please add products to requisition list">
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">All Product Lists</h4>
                                            </div>
                                            <div class="modal-body" style="height: 75vh; overflow-y: auto">
                                                <div class="wrapper-md">
                                                    <div id='DivIdToPrint'>
                                                        <!-- class="panel panel-default" -->
                                                        <!-- <div class="panel-body"> -->
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-hover">
                                                                <thead class="bg-primary">
                                                                    <tr>
                                                                        <th class="text-center">SL No</th>
                                                                        <th class="text-center">Product Image</th>
                                                                        <th class="text-center">Product Name</th>
                                                                        <th class="text-center">Product HS Code</th>
                                                                        <th class="text-center">Product UOM</th>
                                                                        <th class="text-center">Product Sub Category</th>
                                                                        <th class="text-center">Product Category</th>
                                                                        <th class="text-center">Company</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center">01</td>
                                                                        <td class="text-center">
                                                                            <div class="product_images">
                                                                                <img src="img/product.jpg" alt="product name" class="img-responsive">
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-center">2323</td>
                                                                        <td class="text-center">2323</td>
                                                                        <td class="text-center">2323</td>
                                                                        <td class="text-center">2323</td>
                                                                        <td class="text-center">2323</td>
                                                                        <td class="text-center">2323</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--/end table-->
                                                        <!-- </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal -->
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th colspan="7">Purchase Order Items</th>
                                            </tr>
                                            <tr>
                                                <th>#</th>
                                                <th>action</th>
                                                <th>action</th>
                                                <th>action</th>
                                                <th>action</th>
                                                <th>action</th>
                                                <th>action</th>
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
                            </div>


                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                                    <a class="btn btn-default btn-sm" href="{{route('foreign-requisition.index')}}">Cancel</a>
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