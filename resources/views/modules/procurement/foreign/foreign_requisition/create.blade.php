@extends('layout')
@section('title', 'Purchase Requisition')
@section('style')
<link rel="stylesheet" href="{{asset('assets/vendors/jquery-ui/jquery-ui.css')}}">
@endsection
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
                <div class="x_panel" ng-app="myApp">
                    <div class="x_title">
                        <h2>Requisition</h2>
                        <a href="{{route('foreign-requisition.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> See Requisition Lists</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" ng-controller="myCtrl">
                        <br />
                        @include('partials/flash_msg')
                        <form class="form-horizontal form-label-left" action="{{route('foreign-requisition.store')}}" method="POST" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('requisition_title','Requisition Title', null, ['class'=>'form-control input-sm','required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('issued_date','Issued Date', \Carbon\Carbon::now()->format('d-m-Y'), ['class'=>'form-control input-sm','required', 'readonly']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('date_expected','Expected Date', null, ['class'=>'form-control input-sm datepicker','required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::select('requisition_purpose_id', 'Requisition Purpose', $requisition_purpose_list , null,['class'=>'form-control input-sm select2','required', 'data-popup'=> route('requisition-purpose.index')]) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::select('requisition_priority_id', 'Requisition Priority', $requisition_priority_list , null,['class'=>'form-control input-sm select2','required']) }}
                                </div>
                            </div>
                            <div class="panel panel-default bg-light m-t-15">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-12"><label>Search <a href="{{route('product.index')}}"><strong>Product</strong></a></label></div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <!-- <div class="btn-group pull-right">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown">
                                                        Select Product Group <span class="caret"></span></button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#">Tablet</a></li>
                                                        <li><a href="#">Tablet2</a></li>
                                                        <li><a href="#">Tablet3</a></li>
                                                    </ul>
                                                </div>
                                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-eye"></i><b>See Product Lists</b></button>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="input-group m-b">
                                            <span class="input-group-addon">
                                                <i class="fa fa-search"></i> Search
                                            </span>
                                            <input type="text" class="form-control input-lg" placeholder="Please type to find product" id="search_product">
                                            <span class="input-group-addon">
                                                <a href="#" ng-click="searchProduct()"><i class="fa fa-plus"></i> Add</a>
                                            </span>
                                            <span class="input-group-addon">
                                                <a href="#" data-toggle="modal" data-target="#myModal" ng-click="getAllProduct()"><i class="fa fa-list-ul"></i> Product List</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" ng-if="itemlist.length >= 1">
                                    <thead class="bg-default">
                                        <tr>
                                            <th colspan="8">Purchase Requistion Items</th>
                                        </tr>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Physical stock</th>
                                            <th>Goods in Transit</th>
                                            <th>Pending</th>
                                            <th>Total Quantity</th>
                                            <th>Requisition Quantity</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="item in itemlist">
                                            <td><% $index+1 %>
                                                <input type="hidden" class="form-control" name="items[<% $index %>][product_id]" value="<% item.id %>"></td>
                                            <td><% item.name %></td>
                                            <td><% item.physical_stock %></td>
                                            <td><% item.goods_in_transit %></td>
                                            <td><% item.pending %></td>
                                            <td><% item.total_quantity %></td>
                                            <td class="item"><input type="number" class="form-control" min="1" name="items[<% $index %>][quantity]" required></td>
                                            <td class="text-center"><button type="button" class="btn btn-default btn-sm" title="Remove" ng-click="removeItem($index)"><i class="fa fa-trash text-danger"></i></button></td>
                                        </tr>
                                    </tbody>
                                    <!-- <tfoot class="font-bold">
                                        <tr>
                                            <td>Total</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tfoot> -->
                                </table>
                            </div>
                            <!--end table-->
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    {{ BootForm::textarea('note','Notes',null,['class'=>'form-control input-sm','rows'=>2]) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <br />
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-sm" ng-disabled="itemlist.length < 1">Save</button>
                                        <a class="btn btn-default btn-sm" href="{{route('foreign-requisition.index')}}">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Product List</h4>
                                    </div>
                                    <div class="modal-body" style="height: 75vh; overflow-y: auto">
                                        <div class="col-sm-4 col-sm-offset-8">
                                            <div class="form-group">
                                                <select class="form-control select2" ng-init="group_id = 0" ng-model="group_id" ng-change="getAllProduct()">
                                                    <option value="0" selected>All Group</option>
                                                    @foreach ($product_group as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <table class="table table-bordered m-t-lg table-hover">
                                            <thead class="bg-default">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Product Name</th>
                                                    <th>HS Code</th>
                                                    <th>Category</th>
                                                    <th>Model</th>
                                                    <th>Size</th>
                                                    <th>Product Type</th>
                                                    <th>Set</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="product in productlist">
                                                    <td><% $index+1 %></td>
                                                    <td ng-click="checked[$index] = !checked[$index]"><% product.name %></td>
                                                    <td><% product.hs_code %></td>
                                                    <td><% product.product_category.name %></td>
                                                    <td><% product.product_model.name %></td>
                                                    <td><% product.product_size.name %></td>
                                                    <td><% product.product_type.name %></td>
                                                    <td><% product.product_set.name %></td>
                                                    <td class="text-center">
                                                        <button ng-if="checkAvailable(product.id)" type="button" class="btn btn-danger btn-sm" ng-click="removeItemById(product.id)"><i class="fa fa-times"></i></button>
                                                        <button ng-if="!checkAvailable(product.id)" type="button" class="btn btn-success btn-sm" ng-click="addToItemList(product.id)"><i class="fa fa-plus"></i></button>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
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
@section('script')
<script src="{{asset('assets/vendors/jquery-ui/jquery-ui.js')}}"></script>
<script>
    var app = angular.module('myApp', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });
    app.controller('myCtrl', function($scope, $http) {
        $scope.itemlist = [];
        $('#search_product').autocomplete({
        source: "{{route('search-product')}}",
                minlength: 1,
                autoFocus: true,
                select: function (e, ui) {
                    $scope.product_id = ui.item.id;
                // $scope.addToItemList(ui.item);
                $scope.$apply();
                console.log($scope.itemlist);
                }
        });
        $scope.searchProduct = function(){
            $('#search_product').val(null);
            $scope.addToItemList($scope.product_id);
        }
        $scope.addToItemList = function(product_id){
            if(!product_id){
                $scope.warning('Please type and select a product first');
                return;
            }

            index = $scope.itemlist.findIndex(item => item.id==product_id);
            if(index < 0){
                let url = "{{URL::to('get-product')}}/" + product_id;
                $http.get(url)
                        .then(function(response) {
                            $scope.itemlist.push(response.data);
                        });
                PNotify.removeAll();
            }else{
                $scope.warning('Item already exist');
            }
            product_id = null;
        }
        $scope.getAllProduct = function(){
            let url = "{{URL::to('get-all-product')}}/" + $scope.group_id;
                $http.get(url)
                        .then(function(response) {
                            $scope.productlist = response.data;
                            // console.log($scope.productlist);
                        });
        }
        $scope.addProducts = function(){
            console.log($scope.product_ids);
        }
        $scope.checkAvailable = function(product_id){
            index = $scope.itemlist.findIndex(item => item.id==product_id);
            if(index < 0){
                return false;
            }else{
                return true;
            }
        }
        $scope.warning = function(msg){
            var data = {
                'title': 'Warning!',
                'text': msg,
                'type': 'notice',
                'styling': 'bootstrap3',
            };
            PNotify.removeAll();
            new PNotify(data);
        }
        $scope.removeItem = function(index){
            $scope.itemlist.splice(index,1);
        }
        $scope.removeItemById = function(product_id){
            index = $scope.itemlist.findIndex(item => item.id==product_id);
            $scope.itemlist.splice(index,1);
        }
    });

    $(function(){
        $('#date_expected').daterangepicker({
            singleDatePicker: true,
            singleClasses: "picker_3",
            minDate: moment().add(1, 'days'),
            locale: {
                format: 'DD-MM-YYYY',
            }
        });
    });
</script>
@endsection
