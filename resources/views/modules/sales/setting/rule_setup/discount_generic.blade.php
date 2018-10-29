@extends('layout')
@section('title', 'Rule Setup')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel" ng-app="myApp">
                <div class="x_title">
                    <h2>Rule Setup</h2>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" ng-controller="myCtrl">
                    <div class="col-xs-3">
                        <!-- Nav tabs -->
                        @include('modules.sales.setting.rule_setup.tabs')
                    </div>

                    <div class="col-xs-9">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="discount_generic">
                                <div class="x_title">
                                    <h2>Discount Generic</h2>
                                    <button type="button" class="btn btn-sm btn-default btn-addon pull-right btn-form-toggle"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New</button>
                                    <div class="clearfix"></div>
                                </div>
                                @include('partials/flash_msg')
                                <div id="form-area" @if(!old()) style="display:none" @endif>
                                    {{ BootForm::open(['model' => $discount_generic, 'store' => 'discount-generic.store', 'update' => 'discount-generic.update']) }}
                                        <div class="row">
                                            <div class="">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Product Name</th>
                                                            <th>Discount Type</th>
                                                            <th>Amount</th>
                                                            <th>Active</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="item">
                                                                {{ Form::select('product_id', $product_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;", 'data-placeholder'=>'Select Product']) }}
                                                            </td>
                                                            <td>
                                                                <select class="form-control input-sm" name="discount_type">
                                                                    <option value="fixed">Fixed</option>
                                                                    <option value="percent">Percent</option>
                                                                </select>
                                                            </td>
                                                            <td class="item">{{ BootForm::number('discount_value', false, null, ['class'=>'form-control input-sm','required']) }}</td>
                                                            <td>
                                                                <label>
                                                                    <input type="checkbox" class="js-switch" checked name="active" value="1"/>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="ln_solid"></div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                                                    <button type="button" class="btn btn-default btn-sm btn-form-toggle"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    {{ BootForm::close() }}
                                </div>
                                <div class="table-responsive m-t-30">
                                    <table class="table table-bordered table-hover datatable-buttons">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>		
                                                <th>Discount Type</th>
                                                <th>Amount</th>
                                                <th>Active</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($discount_generic_list as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->product->name }}</td>
                                                <td>{{ $item->discount_type }}</td>
                                                <td>{{ $item->discount_value . ($item->discount_type == 'percent' ? "%": null) }}</td>
                                                <td>{{ $item->active ? "active": "inactive" }}</td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <!--end table-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    var app = angular.module('myApp', [], function($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        });
    app.controller('myCtrl', function($scope, $http) {
      

    });
    $(function(){
        changeButton();
        $('.btn-form-toggle').on('click', function(){
            $('#form-area').slideToggle('fast', function() {
                changeButton();      
            });
        });
        function changeButton(){
            if ($('#form-area').is(':visible')) {
                $('.btn-form-toggle').html('<i class="fa fa-times" aria-hidden="true"></i> Close');               
            } else {
                $('.btn-form-toggle').html('<i class="fa fa-plus-circle" aria-hidden="true"></i> Add New');                
            }  
        }
    });
</script>
@endsection
