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
                        <form class="form-horizontal form-label-left" action="{{route('product.store')}}" method="POST">

                        
                        {{csrf_field()}}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('name','Product Name', null, ['class'=>'form-control input-sm']) }} 
             
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('hs_code','HS Code', null, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('product_category_id', 'Category', $product_category_list, null, ['class'=>'form-control input-sm select2']) }}
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('product_pattern_id', 'Select Pattern', $product_pattern_list, null, ['class'=>'form-control input-sm select2']) }}
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
                                                     {{ BootForm::checkboxes('product_group_id', null, $product_group_list)}}  
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('product_brand_id', 'Select Brand', $product_brand_list, null, ['class'=>'form-control input-sm select2']) }}
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('serial','Product Serial', null, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('model','Product Model', null, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('part_number','Part No', null, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('country_of_origin_country_id', 'Country of Origin', $country_list, null, ['class'=>'form-control input-sm select2']) }}
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('country_of_manufacture_country_id', 'Country of Manufacture', $country_list, null, ['class'=>'form-control input-sm select2']) }}
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('unit_of_measurement_id', 'Unit of Measurement', $unit_of_measurement_list, null, ['class'=>'form-control input-sm select2']) }}
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
                                                    {{ BootForm::number('tp_rate','TP', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::number('mrp_rate','MRP', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::number('flat_rate','Flat', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::number('special_rate','Special Rate', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::number('distribution_rate','Distributor Rate', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::number('other','Other', null, ['class'=>'form-control input-sm']) }}
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
                                                    {{ BootForm::number('pack_size','Pack Size', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::number('shipper_carton_size','Shipper Carton Size', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                {{ BootForm::textarea('description','Description', null, ['class'=>'form-control input-sm','rows'=>3, 'cols'=>50]) }}

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