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
                        <form class="form-horizontal form-label-left" action="{{route('foreign-requisition.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('requisition_title','Requisition Title', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('issued_date','Issued Date', null, ['class'=>'form-control input-sm datepicker']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('date_expected','Expected Date', null, ['class'=>'form-control input-sm datepicker' ]) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('purpose_id', 'Requisition Purpose', $requisition_purpose_list ,['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('requisition_priority_id', 'Requisition Priority', $requisition_priority_list , ['class'=>'form-control input-sm']) }}
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
                                            <input type="text" class="form-control input-lg" placeholder="Please add products to requisition list" id="search_product">
                                            <span class="input-group-addon">
                                                <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-list-ul"></i> Product List</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--start Purchase Order Items table-->
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
                                            <td><% $index+1 %> <input type="hidden" class="form-control" name="items[<% $index %>][product_id]" value="<% item.product.id %>"></td>
                                            <td><% item.name %></td>
                                            <td><% item.physical_stock %></td>
                                            <td><% item.goods_in_transit %></td>
                                            <td><% item.pending %></td>
                                            <td><% item.total_quantity %></td>
                                            <td><input type="number" class="form-control" min="1" name="items[<% $index %>][quantity]"></td>
                                            <td class="text-center"><button class="btn btn-default btn-sm" title="Remove" ng-click="removeItem($index)"><i class="fa fa-trash text-danger"></i></button></td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="font-bold">
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
                                    </tfoot>
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
                                        <button type="submit" class="btn btn-success btn-sm">Save</button>
                                        <a class="btn btn-default btn-sm" href="{{route('foreign-requisition.index')}}">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
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
                        <h4 class="modal-title">Product List</h4>
                    </div>
                    <div class="modal-body" style="height: 75vh; overflow-y: auto">
                        <table class="table" id="datatable-checkbox" table-bordered m-t-lg table-hover">
                            <thead class="bg-default">
                                <tr>
                                    <th>#</th>
                                    <th></th>
                                    <th>Product Name</th>
                                    <th>HS Code</th>
                                    <th>Brand</th>
                                    <th>Product Serial</th>
                                    <th>Product Model</th>
                                    <th>Part No</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td class="text-center">
                                        <input type="checkbox" name="hobbies[]" id="hobby3" value="eat" class="flat" />
                                    </td>
                                    <td>werr</td>
                                    <td>321</td>
                                    <td>rkr</td>
                                    <td>42221</td>
                                    <td>werr</td>
                                    <td>8342</td>
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
            $scope.addToItemList(ui.item);
            $scope.$apply();
            console.log($scope.itemlist);
            }
    });
    $scope.addToItemList = function(item){
    let url = "{{URL::to('procurement/get-product')}}/" + item.id;
    $http.get(url)
            .then(function(response) {
            // console.log('response_data--------', response.data);
            $scope.itemlist.push(response.data);
            });
    // if(!$scope.search(item.id, $scope.itemlist, id)){
    // }
    }
    $scope.removeItem = function(index){
    $scope.itemlist.splice(index);
    }
    $scope.search = function (nameKey, myArray, indexName) {
    for (var i = 0; i < myArray.length; i++) {
    if (myArray[i][indexName] == nameKey) {
    return i;
    }
    }
    return null;
    }
    });
</script>
@endsection
