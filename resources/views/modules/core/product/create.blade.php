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
                        <a href="#" class="btn btn-sm btn-default btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> See Product Lists</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                       <form class="form-horizontal form-label-left">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input class="form-control input-sm" type="text" readonly>
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
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection