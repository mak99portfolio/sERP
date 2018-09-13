@extends('layout')
@section('title', 'Product List')
@section('content')


<div class="right_col" role="main">

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Purchase Requisition</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <!--{{-- Content here --}}-->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Requisition <small>Form</small></h2>
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
                                <div class="panel panel-default bg-light">
                                    <div class="panel-heading" style="padding: 5px 17px;">
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
                            <div class="form-group pull-in clearfix">
                                <div class="col-sm-12">
                                    <label>Purchase Order Items</label>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th>SL NO</th>
                                                    <th>H.S. CODE</th>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>UOM</th>
                                                    <th class="text-right">
                                                        <i class="fa fa-trash"></i>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-right">123</td>
                                                    <td class="text-center">123</td>
                                                    <td>
                                                        <img src="img/product.jpg" alt="product name" class="img-responsive">
                                                    </td>
                                                    <td>
                                                        <input class="form-control input-sm" type="number">
                                                    </td>
                                                    <td>
                                                        123
                                                    </td>
                                                    <td class="text-right">
                                                        <button type="button" class="btn btn-xs btn-default">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot class="font-bold">
                                                <tr>
                                                    <td colspan="3">Total</td>
                                                    <td class="text-right">324</td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!--end table-->
                                </div>
                            </div>


                            <div class="col-md-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">

                                    <button type="submit" class="btn btn-default">Save1</button>
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

@endsection