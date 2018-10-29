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
                            <div class="tab-pane active">
                                <div class="x_title">
                                    <h2>Free/Bonus <small>(Generic)</small></h2>
                                    <button type="button" class="btn btn-sm btn-default btn-addon pull-right btn-form-toggle"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New</button>
                                    <div class="clearfix"></div>
                                </div>
                                <div id="form-area" @if(!old()) style="display:none" @endif>
                                    @include('partials/flash_msg')
                                    {{ BootForm::open(['model' => $free_bonus_generic, 'store' => 'free-bonus-generic.store', 'update' => 'free-bonus-generic.update']) }}
                                        <div class="row">
                                            <div class="">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr ng-show="itemlist.length > 0">
                                                            <th>Product Name</th>
                                                            <th>Type</th>
                                                            <th>Bonus</th>
                                                            <th>Active</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="item">
                                                                {{ Form::select('product_id', $product_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;", 'data-placeholder'=>'Select Product', 'required']) }}
                                                            </td>
                                                            <td>
                                                                <select name="bonus_type" ng-model="bonus_type" class="form-control input-sm" ng-init="bonus_type = 'fixed'">
                                                                    <option value="fixed">Fixed</option>
                                                                    <option value="ratio">Ratio</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center" style="width: 25%">
                                                                <div class="item">
                                                                    <input type="text" class="form-control input-sm" name="bonus_value" ng-if="bonus_type == 'fixed'" required>
                                                                </div>
                                                                <div class="input-group item" ng-if="bonus_type == 'ratio'">
                                                                    <input type="number" class="form-control input-sm" name="bonus_value" ng-model="bonus_value" placeholder="Free" required>
                                                                    <span class="input-group-addon">&ratio;</span>
                                                                    <input type="number" class="form-control input-sm" name="quantity" ng-model="quantity" min="1" placeholder="Quantity" required>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <label>
                                                                    <input type="checkbox" class="js-switch" checked name="active" value="1">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <br />
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
                                                <th>Type</th>
                                                <th>Bonus</th>
                                                <th>Active</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($free_bonus_generic_list as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->product->name }}</td>
                                                <td>{{ $item->bonus_type }}</td>
                                                <td>{{ $item->bonus_value }}{{ $item->bonus_type == 'ratio' ? " :" . $item->quantity : null }}</td>
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