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
                        <h2>Product List</h2>
                        <a href="{{route('product.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> See Product Lists</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @include('partials.flash_msg')
                        <form class="form-horizontal form-label-left" autocomplete="off" action="{{route('product.update',$product->id)}}" method="POST">
 <input name="_method" type="hidden" value="PUT">
                            {{csrf_field()}}
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('name','Product Name', $product->name, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('hs_code','HS Code', $product->hs_code, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('product_category_id', 'Category', $product_category_list, $product->product_category_id, ['class'=>'form-control input-sm select2']) }}
                                {{-- <div class="form-group">
                                    <label>Select list:</label>
                                    <select class="form-control input-sm">
                                           {{generate_select_tree($product_category_list)}}
                                    </select>
                                  </div> --}}
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('product_type_id', 'Product Type', $product_type_list, $product->product_type_id, ['class'=>'form-control input-sm select2']) }}
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('product_model_id', 'Product Model', $product_model_list, $product->product_model_id, ['class'=>'form-control input-sm select2']) }}
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('product_size_id', 'Product Size', $product_size_list, $product->product_size_id, ['class'=>'form-control input-sm select2']) }}
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('product_set_id', 'Product Set', $product_set_list, $product->product_set_id, ['class'=>'form-control input-sm select2']) }}
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Product Classification Group</div>
                                    <div class="panel-body">
                                        {{-- <div class="col-md-1 col-sm-2">
                                            <div class="checkbox">
                                                <label class="i-checks">
                                                    <input type="checkbox" name="" value="Sample"><i></i> Sample
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-sm-2">
                                            <div class="checkbox">
                                                <label class="i-checks">
                                                    <input type="checkbox" name="" value="Service"><i></i> Service
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-sm-2">
                                            <div class="checkbox">
                                                <label class="i-checks">
                                                    <input type="checkbox" name="" value="Barcode"><i></i> Barcode
                                                </label>
                                            </div>
                                        </div>
                                       <div class="col-md-1 col-sm-2">
                                            <div class="checkbox">
                                                <label class="i-checks">
                                                    <input type="checkbox" name="" value="Saleable"><i></i> Saleable
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-sm-2">
                                            <div class="checkbox">
                                                <label class="i-checks">
                                                    <input type="checkbox" name="" value="Maintenance"><i></i> Maintenance
                                                </label>
                                            </div>
                                        </div> --}}
                                <div class="form-group pull-in clearfix">
                                            {{ BootForm::checkboxes('product_group_id', null, $product_group_list, $product->product_group_id, ['class'=>''])}} 
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('product_brand_id', 'Select Brand', $product_brand_list, $product->product_brand_id, ['class'=>'form-control input-sm select2']) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('serial','Product Serial',  $product->serial, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('part_number','Part No', $product->part_number, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('country_of_origin_country_id', 'Country of Origin', $country_list, $product->country_of_origin_country_id, ['class'=>'form-control input-sm select2']) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('country_of_manufacture_country_id', 'Country of Manufacture', $country_list, $product->country_of_manufacture_country_id, ['class'=>'form-control input-sm select2']) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('unit_of_measurement_id', 'Unit of Measurement', $unit_of_measurement_list, $product->unit_of_measurement_id, ['class'=>'form-control input-sm select2']) }}
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Status</div>
                                    <div class="panel-body">
                                        <div class="form-group pull-in clearfix">
                                            @foreach($product_status_list as $product_status)
                                            <div class="col-md-1 col-sm-1">
                                                <div class="radio">
                                                    <label class="i-checks">
                                                        <input type="radio" name="product_status_id" {{ ( $product_status->id == $product->product_status_id) ? 'checked' : '' }} value="{{$product_status->id}}">
                                                        <i></i>
                                                        {{$product_status->name}}
                                                    </label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Rate</div>
                                    <div class="panel-body">
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            {{ BootForm::number('tp_rate','TP', $product->tp_rate, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            {{ BootForm::number('mrp_rate','MRP', $product->mrp_rate, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            {{ BootForm::number('flat_rate','Flat', $product->flat_rate, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            {{ BootForm::number('special_rate','Special Rate', $product->special_rate, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            {{ BootForm::number('distribution_rate','Distributor Rate', $product->distribution_rate, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            {{ BootForm::number('other','Other', $product->other, ['class'=>'form-control input-sm']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Product Packing Info</div>
                                    <div class="panel-body">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            {{ BootForm::number('pack_size','Pack Size', $product->pack_size, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            {{ BootForm::number('shipper_carton_size','Shipper Carton Size', $product->shipper_carton_size, ['class'=>'form-control input-sm']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                {{ BootForm::textarea('description','Description', $product->description, ['class'=>'form-control input-sm','rows'=>3, 'cols'=>50]) }}
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-sm">Update</button>
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