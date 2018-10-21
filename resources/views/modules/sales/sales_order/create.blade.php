@extends('layout')
@section('title', 'Sales Order')
@section('style')
<link rel="stylesheet" href="{{asset('assets/vendors/jquery-ui/jquery-ui.css')}}">
@endsection
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    {{-- <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Sales Order</h2>
                    <a href="{{ route('sales-order.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> Sales Order List</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left input_mask">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('sales_order_no','Sales Order No', null, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('sales_date','Sales Date', null, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('sales_reference','Sales Reference',[],null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;"]) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('currency','Currency', null, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('conversion_rate','Conversion Rate', null, ['class'=>'form-control input-sm']) }}
                            </div>
                            <!------Terms and Condition---->
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <fieldset class="m-t-15">
                                    <legend>Terms and Condition:</legend>
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label>Terms and Condition Type</label>
                                                <select class="form-control input-sm select2" required>
                                                    <option value="" disabled selected> Select Terms and Condition Type </option>
                                                    <option value="Delivery Terms">Delivery Terms</option>
                                                    <option value="Payment Condition">Payment Condition</option>
                                                    <option value="Warranty Terms">Warranty Terms</option>
                                                    <option value="Security Terms">Security Terms</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                            {{ BootForm::textarea(null,'Description',null,['id'=>'description','class'=>'form-control input-sm','rows'=>'1']) }}
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                            <button type="button" class="btn btn-sm btn-default m-t-20"><strong>Add</strong></button>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="table-responsive m-t-20">
                                                <table id="mytable1" class="table table-bordered table-hover">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Terms and Condition</th>
                                                            <th>Description</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>01</td>
                                                            <td>Terms</td>
                                                            <td>Description</td>
                                                            <td class="text-center"><button class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end table-->
                                        </div>
                                    </div>
                                </fieldset>
                                <!---------Terms and Condition end-------->
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="panel panel-default bg-light m-t-15">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4 col-xs-12"><label>Search <a href="#"><strong>Product</strong></a></label></div>
                                            <div class="col-md-8 col-sm-8 col-xs-12"></div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="input-group m-b">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-search"></i> Search
                                                </span>
                                                <input type="text" class="form-control input-lg" placeholder="Please type to find product">
                                                <span class="input-group-addon">
                                                    <a href="#"><i class="fa fa-plus"></i> Add</a>
                                                </span>
                                                <span class="input-group-addon">
                                                    <a href="#"><i class="fa fa-list-ul"></i> Product List</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="bg-default">
                                            <tr>
                                                <th colspan="13">Product Table</th>
                                            </tr>
                                            <tr>
                                                <th>#</th>
                                                <th>Product id</th>
                                                <th>Product Name</th>
                                                <th>UOM</th>
                                                <th>Unit Price</th>
                                                <th>Quantity</th>
                                                <th>Bonus Qty</th>
                                                <th>Total Qty</th>
                                                <th>Net Price</th>
                                                <th>Vat</th>
                                                <th>Discont</th>
                                                <th>Total Amount</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>23</td>
                                                <td>Product</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td class="text-center"><button type="button" class="btn btn-default btn-sm" title="Remove"><i class="fa fa-trash text-danger"></i></button></td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="font-bold">
                                            <tr>
                                                <td colspan="3">Total</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td>01</td>
                                                <td></td>
                                            </tr>

                                        </tfoot> 
                                    </table>
                                </div>
                                <!--end table-->
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="">Remarks</label>
                                    <textarea name="notes" cols="30" rows="2" class="form-control input-sm"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <a href="#" class="btn btn-success btn-sm">Save</a>
                                    <a href="{{ route('sales-order.index')}}" class="btn btn-default btn-sm">Cancel</a>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div> --}}




    {{-- ----------------------------- --}}



    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" ng-app="myApp">
                <div class="x_title">
                    <h2>Sales Order</h2>
                    <a href="{{route('sales-order.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> See Requisition Lists</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" ng-controller="myCtrl">
                    <br />
                    @include('partials/flash_msg')
                    <form class="form-horizontal form-label-left" action="{{route('sales-order.store')}}" method="POST" autocomplete="off">
                        @csrf
                        <div class="row">
                            {{-- <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('sales_order_no','Sales Order No', null, ['class'=>'form-control input-sm']) }}
                            </div> --}}
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::text('sales_date','Sales Date', null, ['class'=>'form-control input-sm datepicker']) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('currency_id','Currency',$currency_list,null, ['class'=>'form-control input-sm select2','data-placeholder'=>'Select Currency','style'=>"width: 100%;"]) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::number('conversion_rate','Conversion Rate', null, ['class'=>'form-control input-sm']) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('customer_id','Customer',$customer_list,null, ['class'=>'form-control input-sm select2','data-placeholder'=>'Select Customer','style'=>"width: 100%;"]) }}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('designation','Designation',$designations_list,null, ['class'=>'form-control input-sm select2','ng-model'=>'designation_id','ng-change'=>'getEmployee()','data-placeholder'=>"Select Designation",'style'=>"width: 100%;"]) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                            <label>Sales Reference</label>
                                            <select class="form-control input-sm select2" name="sales_reference_id" required>
                                                <option value="" disabled>--Select Sales Reference--</option>
                                                <option ng-repeat='employee in employeelist' value="<% employee.id %>"><% employee.name %></option>
                                            </select>
                                    </div>
                                </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <fieldset>
                                        <legend>Terms and Conditions</legend>
                                    </fieldset>
                                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label data-popup = "{{ route('terms-and-condition-type.index') }}">Terms and Conditions Type</label>
                                            <select class="form-control input-sm select2" ng-model="terms_and_condition_type"  required>
                                                <option value="" disabled>--Select Terms and Conditions Type--</option>
                                                @foreach($terms_conditions_type_list as $item)
                                                <option value="{{$item}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                        {{ BootForm::textarea(null,'Description',null,['id'=>'description','class'=>'form-control input-sm','rows'=>'1', 'ng-model' => 'condition_description']) }}
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <button type="button" ng-click="add_condition()" class="btn btn-sm btn-primary m-t-20"><strong>Add</strong></button>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-if="conditions.length >=1">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th width="40">#</th>
                                                        <th>Term & Condition</th>
                                                        <th>Description</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="mytable1">
                                                    <tr ng-repeat="condition in conditions">
                                                        <td><% $index+1 %></td>
                                                        <td><% condition.name %><input name="terms_and_conditions[<% $index %>][terms_and_condition_id]" type="hidden" value="<% condition.id %>"></td>
                                                        <td><% condition.description %> <input name="terms_and_conditions[<% $index %>][description]" type="hidden" value="<% condition.description %>"></td>
                                                        <td width="40" class="text-center"><button class="btn btn-danger btn-xs" ng-click="removeCondition($index)"><i class="fa fa-times"></i></button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
                                        <th colspan="12">Sales Order Items</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>UOM</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th>Bonus Quantity</th>
                                        <th>Total Quantity</th>
                                        <th>Net Price</th>
                                        <th>Discont</th>
                                        <th>Total Amount</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="item in itemlist">
                                        <td><% $index+1 %><input type="hidden" class="form-control" name="items[<% $index %>][product_id]" value="<% item.id %>"></td>
                                        <td><% item.name %></td>
                                        <td><% item.uom %></td>
                                        <td> <input type="number" class="form-control" min="1" name="items[<% $index %>][unit_price]" value="<% item.unit_price %>"> </td>
                                        <td> <input type="number" class="form-control" min="1" name="items[<% $index %>][quantity]" ng-model="quantity[$index]"> </td>
                                        <td> <input type="number" class="form-control" min="1" name="items[<% $index %>][bonus_quantity]" ng-model="bonus_quantity[$index]"> </td>
                                        <td> <input type="number" class="form-control" min="1" name="items[<% $index %>][total_quantity]" ng-model="total_quantity[$index]" value="<% quantity[$index] + bonus_quantity[$index] %>"> </td>
                                        <td> <input type="number" class="form-control" min="1" name="items[<% $index %>][net_price]" value="<% quantity[$index] * item.unit_price %>"> </td>
                                        <td> <input type="number" class="form-control" min="1" name="items[<% $index %>][discount]" > </td>
                                        <td>10</td>
                               
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
                                {{ BootForm::textarea('remarks','Remarks',null,['class'=>'form-control input-sm','rows'=>2]) }}
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-sm" ng-disabled="itemlist.length < 1">Save</button>
                                    <a class="btn btn-default btn-sm" href="{{route('sales-order.index')}}">Cancel</a>
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

</div>
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
        $scope.conditions = [];
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
        // $scope.addProducts = function(){
        //     console.log($scope.product_ids);
        // }
        $scope.checkAvailable = function(product_id){
            index = $scope.itemlist.findIndex(item => item.id==product_id);
            if(index < 0){
                return false;
            }else{
                return true;
            }
        }

        $scope.getEmployee=function(){
            let url = "{{URL::to('get-all-employee-by-designation')}}/" + $scope.designation_id;
                $http.get(url)
                        .then(function(response) {
                            $scope.employeelist = response.data;
                            // console.log($scope.productlist);
                        });

        }


// Terms and Conditions
$scope.add_condition = function(){
            var condition = {};
            if(!$scope.terms_and_condition_type){
                $scope.warning('Please select terms and condition type first');
                return;
            }

            if(!$scope.condition_description){
                $scope.warning('Description of terms and condition is empty');
                return;
            }

            var item = JSON.parse($scope.terms_and_condition_type);

            index = $scope.conditions.findIndex(value => value.id == item.id);

            if(index >= 0){
                $scope.warning('Terms and conditions already exist');
                return;
            }

            condition.id = item.id;
            condition.name = item.name;
            condition.description = $scope.condition_description;
            $scope.conditions.push(condition);
            $scope.condition_description = null;
        }

        $scope.removeCondition = function(index){
            $scope.conditions.splice(index, 1);
        }

        $scope.warning = function(msg){
            var data = {
                'title': 'Warning!',
                'text': msg,
                'type': 'notice',
                'styling': 'bootstrap3',
            };
            new PNotify(data);
        }

// Terms and Conditions

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

