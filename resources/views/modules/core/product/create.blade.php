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
                        <form class="form-horizontal form-label-left" action="{{route('product.store')}}" method="POST">
                        {{csrf_field()}}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input class="form-control input-sm" type="text" name='name'>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Product HS Code</label>
                                    <input class="form-control input-sm" type="text" name='hs_code'>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control input-sm" name='product_category_id'>
                                        <option value="" disabled selected>Select Category</option>
                                         @foreach ($product_category_list as $product_category)
                                        <option value="{{$product_category->id}}">{{$product_category->name}}</option>
                                         @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Pattern</label>
                                    <select class="form-control input-sm" name="product_pattern_id">
                                        <option value="" disabled selected>Select Pattern</option>
                                        @foreach ($product_pattern_list as $product_pattern)
                                        <option value="{{$product_pattern->id}}">{{$product_pattern->name}}</option>
                                         @endforeach
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
                                                     @foreach($product_group_list as $product_group)
                                                    <div class="col-sm-2">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox" name="product_group_id" value="{{$product_group->id}}"><i></i> {{$product_group->name}}
                                                            </label>
                                                        </div>
                                                    </div>
                                                      @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Brand</label>
                                    <select class="form-control input-sm" name="product_brand_id">
                                        <option value="" disabled selected>Select Brand</option>
                                         @foreach($product_brand_list as $product_brand)
                                        <option value="{{$product_brand->id}}">{{$product_brand->name}}</option>
                                         @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Product Serial</label>
                                    <input class="form-control input-sm" type="text" name='serial'>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Product Model</label>
                                    <input class="form-control input-sm" type="text" name="model">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Part No</label>
                                    <input class="form-control input-sm" type="text" name="part_number">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Country of Origin</label>
                                    <select class="form-control input-sm" name="country_of_origin_country_id">
                                        <option value="" disabled selected>Select Origin</option>
                                       @foreach($country_list as $country)
                                        <option value="{{$country->id}}"> {{$country->name}} </option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Country of Manufacture</label>
                                    <select class="form-control input-sm" name="country_of_manufacture_country_id">
                                        <option value="" disabled selected>Select Manufacture</option>
                                        @foreach($country_list as $country)
                                        <option value="{{$country->id}}"> {{$country->name}} </option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Unit of Measurement</label>
                                    <select class="form-control input-sm" name="unit_of_measurement_id">
                                        <option value="" disabled selected>Select Measurement</option>
                                        @foreach($unit_of_measurement_list as $unit_of_measurement)
                                        <option value="{{$unit_of_measurement->id}}"> {{$unit_of_measurement->name}} </option>
                                       @endforeach
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
                                                    
                                                    @foreach($product_status_list as $product_status)
                                                    <div class="col-sm-2">
                                                        <div class="radio">
                                                            <label class="i-checks">
                                                                <input type="radio" name="product_status_id" value="{{$product_status->id}}">
                                                                <i></i>
                                                                {{$product_status->name}}
                                                            </label>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    <!-- <div class="col-sm-2">
                                                        <div class="radio">
                                                            <label class="i-checks">
                                                                <input type="radio" name="product_status_id" value="2">
                                                                <i></i>
                                                                Inactive
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="radio">
                                                            <label class="i-checks">
                                                                <input type="radio" name="product_status_id" value="3">
                                                                <i></i>
                                                                Provision
                                                            </label>
                                                        </div>
                                                    </div> -->
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
                                                        <input class="form-control input-sm" type="number" name="tp_rate">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>MRP</label>
                                                        <input class="form-control input-sm" type="number" name="mrp_rate">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Flat</label>
                                                        <input class="form-control input-sm" type="number" name="flat_rate">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Special Rate</label>
                                                        <input class="form-control input-sm" type="number" name=special_rate>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Distributor Rate</label>
                                                        <input class="form-control input-sm" type="number" name="distribution_rate">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Other</label>
                                                        <input class="form-control input-sm" type="number" name="other">
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
                                                        <input class="form-control input-sm" type="number" name="pack_size">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Sheper Cartor Size</label>
                                                        <input class="form-control input-sm" type="number" name="shipper_carton_size">
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
                                    <textarea class="form-control input-sm" rows="2" name="description"></textarea>
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