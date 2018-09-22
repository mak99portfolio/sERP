@extends('layout')
@section('title', 'Bill of Lading')
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
                        <h2>Bill of Lading</h2>
                        <a href="{{route('bill-of-lading.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> See Bill of Lading List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left input_mask">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Bill Of Lading Issue Date </label>
                                        <input type="date" class="form-control input-sm" name="bill_date">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Commercial Invoice No</label>
                                        <input type="text" class="form-control input-sm" name="commercial_invoice_no">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Commercial Invoice Date</label>
                                        <input type="date" class="form-control input-sm" name="commercial_invoice_date">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">LC No</label>
                                        <select class="form-control input-sm select2">
                                            <option>option1</option>
                                            <option>option2</option>
                                            <option>option3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Container No</label>
                                        <input type="text" class="form-control input-sm" name="container_no">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Modes Of Transport</label>
                                        <select class="form-control input-sm select2">
                                            <option>option1</option>
                                            <option>option2</option>
                                            <option>option3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Shipping Agency Name</label>
                                        <select class="form-control input-sm select2">
                                            <option>option1</option>
                                            <option>option2</option>
                                            <option>option3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Shipping Agency Address</label>
                                        <textarea name="shipping_agency_address" id="" cols="30" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Exprooter</label>
                                        <select class="form-control input-sm select2">
                                            <option>option1</option>
                                            <option>option2</option>
                                            <option>option3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">LC Issue Bank</div>
                                        <div class="panel-body">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>A/C No</label>
                                                    <input type="text" class="form-control input-sm" name="container_no">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>A/C Name</label>
                                                    <input type="text" class="form-control input-sm" name="container_no">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Branch Name</label>
                                                    <input type="text" class="form-control input-sm" name="container_no">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Bank Name</label>
                                                    <input type="text" class="form-control input-sm" name="container_no">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Issue Place</label>
                                        <textarea name="issue_place" id="" cols="30" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Voage No</label>
                                        <input type="text" class="form-control input-sm" name="voage_no">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Number Of MTD</label>
                                        <input type="text" class="form-control input-sm" name="number_of_mtd">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Consignee</label>
                                        <input type="text" class="form-control input-sm" name="consignee">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Net Weight</label>
                                        <input type="text" class="form-control input-sm" name="net_weight">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">BL No</label>
                                        <input type="text" class="form-control input-sm" name="bl_no">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Number Of Box</label>
                                        <input type="text" class="form-control input-sm" name="number_of_box">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Local Agency Name</label>
                                        <input type="text" class="form-control input-sm" name="local_agency_of_name">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Local Agency Address</label>
                                        <input type="text" class="form-control input-sm" name="local_agency_of_add">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Acceptance</label>
                                        <input type="text" class="form-control input-sm" name="acceptance">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Port Of Loading</label>
                                        <select class="form-control input-sm select2">
                                            <option>option1</option>
                                            <option>option2</option>
                                            <option>option3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Port Of Dischrge</label>
                                        <select class="form-control input-sm select2">
                                            <option>option1</option>
                                            <option>option2</option>
                                            <option>option3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Place Of Delivery</label>
                                        <select class="form-control input-sm select2">
                                            <option>option1</option>
                                            <option>option2</option>
                                            <option>option3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Move Type</label>
                                        <select class="form-control input-sm select2">
                                            <option>option1</option>
                                            <option>option2</option>
                                            <option>option3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Trnsport Modes</label>
                                        <select class="form-control input-sm select2">
                                            <option>option1</option>
                                            <option>option2</option>
                                            <option>option3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Packaging Qty</label>
                                        <input type="text" class="form-control input-sm" name="packaging_qty">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Gross Weight</label>
                                        <input type="text" class="form-control input-sm" name="gross-weight">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th scope="col" colspan="3">Product List</th>
                                                </tr>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Product Name</th>
                                                    <th scope="col">Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="col">01</td>
                                                    <td scope="col">MEF Product</td>
                                                    <td scope="col">5</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td scope="col" colspan="2" class="text-right">Total Quantity</td>
                                                    <td scope="col">5</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!--end table-->
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <a href="#" class="btn btn-success btn-sm">Submit</a>
                                        <a href="{{route('bill-of-lading.index')}}" class="btn btn-default btn-sm">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        {{--end Content here --}}
    </div>
</div>
@endsection