@extends('layout')
@section('title', 'Product')
@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Master Data</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Product Profile</h2>
                        <a href="{{route('product.index')}}" class="btn btn-sm btn-default btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> See Product Lists</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input class="form-control input-sm" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control input-sm">
                                        <option value="" disabled selected>Select Category</option>
                                        <option>option1</option>
                                        <option>option2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Pattern</label>
                                    <select class="form-control input-sm">
                                        <option value="" disabled selected>Select Pattern</option>
                                        <option>Finished</option>
                                        <option>Sample</option>
                                        <option>Gift</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product Classification Group</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group pull-in clearfix">
                                                    <div class="col-sm-2">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox"><i></i> Sample
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox"><i></i> Service
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox"><i></i> Barcode
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox"><i></i> Saleable
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox"><i></i> Maintenance
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Brand</label>
                                    <select class="form-control input-sm">
                                        <option value="" disabled selected>Select Brand</option>
                                        <option>option1</option>
                                        <option>option2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Product Serial</label>
                                    <input class="form-control input-sm" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Product Model</label>
                                    <input class="form-control input-sm" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Pant No</label>
                                    <input class="form-control input-sm" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Country of Origin</label>
                                    <select class="form-control input-sm">
                                        <option value="" disabled selected>Select Origin</option>
                                        <option>option1</option>
                                        <option>option2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Country of Manufacture</label>
                                    <select class="form-control input-sm">
                                        <option value="" disabled selected>Select Manufacture</option>
                                        <option>option1</option>
                                        <option>option2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Unit of Measurement</label>
                                    <select class="form-control input-sm">
                                        <option value="" disabled selected>Select Measurement</option>
                                        <option>option1</option>
                                        <option>option2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group pull-in clearfix">
                                                    <div class="col-sm-2">
                                                        <div class="radio">
                                                            <label class="i-checks">
                                                                <input type="radio" name="a" value="option1">
                                                                <i></i>
                                                                Active
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="radio">
                                                            <label class="i-checks">
                                                                <input type="radio" name="a" value="option1">
                                                                <i></i>
                                                                Inactive
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="radio">
                                                            <label class="i-checks">
                                                                <input type="radio" name="a" value="option1">
                                                                <i></i>
                                                                Provision
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Rate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>TP</label>
                                                        <input class="form-control input-sm" type="number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>MRP</label>
                                                        <input class="form-control input-sm" type="number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Flat</label>
                                                        <input class="form-control input-sm" type="number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Special Rate</label>
                                                        <input class="form-control input-sm" type="number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Distributor Rate</label>
                                                        <input class="form-control input-sm" type="number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Other</label>
                                                        <input class="form-control input-sm" type="number">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product Packing Info</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Pack Size</label>
                                                        <input class="form-control input-sm" type="number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Sheper Cartor Size</label>
                                                        <input class="form-control input-sm" type="number">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control input-sm" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                                    <a class="btn btn-default btn-sm" href="{{route('product.index')}}">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection