@extends('layout')
@section('title', 'Purchase order')
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
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" ng-app="myApp">
                    <div class="x_title">
                        <h2>Local Purchase Order</h2>
                        <a href="{{route('local-purchase-order.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> List Local Purchase</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" ng-controller="myCtrl">
                        <br />
                        @include('partials/flash_msg')
                        <form class="form-horizontal form-label-left" action="{{ route('local-purchase-order.store') }}" method="POST" autocomplete="off">
                            @csrf
                            <fieldset>
                                <legend>Vendor Information:</legend>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                        {{ BootForm::select('vendor[vendor_id]', 'Vendor', $vendor_list, null, ['class'=>'form-control input-sm select2', 'data-placeholder'=>'Select Vendor', 'required','data-popup'=> route('vendor.index')]) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                        {{ BootForm::select('vendor[vendor_selection_criteria]', 'Vendor Selection Criteria', [''=>'', 'Agreement' => 'Agreement', 'Quotation' => 'Quotation', 'Record' => 'Record', 'Others' => 'Others'], null, ['class'=>'form-control input-sm select2', 'data-placeholder'=>'Select Vendor Selection Criteria', 'required']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                        {{ BootForm::text('vendor[reference_no]','Reference No', null, ['class'=>'form-control input-sm', 'required']) }}
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        {{ BootForm::textarea('vendor[additional_information]','Additional Information',null,['class'=>'form-control input-sm','rows'=>'2', 'required']) }}
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        {{ BootForm::textarea('vendor[address]','Address',null,['class'=>'form-control input-sm','rows'=>'2', 'required']) }}
                                    </div>
                                </div>
                            </fieldset>

                            <!---------- genaral po info-------->
                            <fieldset class="m-t-15">
                                <legend>Genaral PO Information:</legend>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                        {{ BootForm::text('purchase_order_date','Purchase Oder Date', null, ['class'=>'form-control input-sm datepicker', 'required']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                        {{ BootForm::select('inco_terms', 'Inco-Terms', [''=>'', 'FOB' => 'FOB', 'FCA' => 'FCA', 'EXW' => 'EXW', 'FAS' => 'FAS', 'CFR' => 'CFR', 'CIF' => 'CIF', 'DDU' => 'DDU', 'DDP' => 'DDP', 'CPT' => 'CPT'], null, ['class'=>'form-control input-sm select2', 'data-placeholder'=>'Select Inco-Terms', 'required']) }}
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                        {{ BootForm::text('inco_term_info','Inco-Term Info', null, ['class'=>'form-control input-sm', 'required']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                        {{ BootForm::select('procurement_type', 'Procurement Type', [''=>'', 'Local' => 'Local'], null, ['class'=>'form-control input-sm select2', 'data-placeholder'=>'Select Procurement Type', 'required']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                        {{ BootForm::select('purchase_order_type', 'Purchase Order Type', [''=>'', 'Raw Metarials Purchase' => 'Raw Metarials Purchase'], null, ['class'=>'form-control input-sm select2', 'data-placeholder'=>'Select Purchase Order Type', 'required']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                        {{ BootForm::text('status','Status', null, ['class'=>'form-control input-sm', 'required']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                        {{ BootForm::select('shipping_method', 'Shipping Method', [''=>'', 'Air' => 'Air', 'Sea' => 'Sea','Ground' => 'Ground'], null, ['class'=>'form-control input-sm select2', 'data-placeholder'=>'Select Shipping Method', 'required']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                        {{ BootForm::select('payment_method', 'Payment Method', [''=>'', 'Cash' => 'Cash', 'Cheque' => 'Cheque', 'LC' => 'LC'], null, ['class'=>'form-control input-sm select2', 'data-placeholder'=>'Select Payment Method', 'required']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                        {{ BootForm::textarea('remarks','Remarks',null,['class'=>'form-control input-sm','rows'=>'2', 'required']) }}
                                    </div>
                                </div>
                            </fieldset>
                            <!---------- genaral po info end-------->
                            <!---------- Ship to info-------->
                            <fieldset class="m-t-15">
                                <legend>Ship To Information:</legend>
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" ng-model="ship_info"  name="ship_info" value="MAGNUM Enterprise Ltd." ng-init="ship_info = 'MAGNUM Enterprise Ltd.'"> MAGNUM Enterprise Ltd.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-6 col-sm-6 col-xs-12">
                                        <div class="col-md-3 col-sm-4">
                                            <div class="radio pull-right">
                                                <label>
                                                    <input type="radio" ng-model="ship_info" value="other"> Other Ship to Address
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-sm-8">
                                            <input class="form-control input-sm" type="text" ng-disabled="ship_info != 'other'" name="ship_info">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <!---------- Ship to info end-------->

                            <!---------- PR info-------->
                            <fieldset class="m-t-15">
                                <legend>PR Information:</legend>
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <div class="well">
                                            <div class="input-group">
                                                <span class="input-group-addon">Select Req. No</span>
                                                <select data-placeholder="Select Req No" multiple required class="form-control input-sm select2" style="width: 100%" name="foreign_requisition_ids[]" ng-model="req_id" ng-change="searchReqNo()">
                                                    <option value=""></option>
                                                    @foreach($requisition_list as $item)
                                                    <option value="{{ $item->id }}">{{ $item->requisition_no }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover" ng-if="requisitions.length >=1">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th>SL NO</th>
                                                        <th>Purchase Requisition No</th>
                                                        <th>Requisition Date</th>
                                                        <th>Purchase Requisition Name</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="req in requisitions">
                                                        <td><% $index+1 %></td>
                                                        <td><% req.requisition_no %></td>
                                                        <td><% req.issued_date %></td>
                                                        <td><% req.requisition_title %></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end table-->
                                    </div>
                                </div>
                            </fieldset>
                            <!----------PR info end-------->
                            <!----------PR Product Details-------->

                            <!----------PR Product Details end-------->
                            <!----------PO Product Details-------->
                            <fieldset class="m-t-15" ng-if="itemlist.length >=1">
                                <legend>PO Product Details:</legend>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th>#</th>
                                                <th>Item Name</th>
                                                <th>HS Code</th>
                                                <th>Quantity</th>
                                                <th>MOU</th>
                                                <th>Unit Price</th>
                                                <th>Sub Total</th>
                                                <th>Discount Rate</th>
                                                <th>Total Discount</th>
                                                <th>VAT Rate(%)</th>
                                                <th>VAT Amount</th>
                                                <th>Total (Net)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="item in itemlist">
                                                <td>
                                                    <% $index+1 %><input type="hidden" class="form-control" name="items[<% $index %>][product_id]" value="<% item.product_id %>">
                                                </td>
                                                <td class="checkbox">
                                                    <label class="control-label">
                                                        <input type="checkbox" ng-init="checked[$index] = true" ng-model="checked[$index]"><% item.name %>
                                                    </label>
                                                </td>
                                                <td><% item.hs_code %></td>
                                                <td>
                                                    <input ng-disabled="!checked[$index]" ng-model="quantity[$index]" ng-init="quantity[$index]=item.quantity" class="form-control input-sm" required type="number" name="items[<% $index %>][quantity]">
                                                </td>
                                                <td><% item.uom %></td>
                                                <td>
                                                    <input ng-disabled="!checked[$index]" ng-model="unit_price[$index]" ng-init="unit_price[$index]= 0" class="form-control input-sm" type="number" name="items[<% $index %>][unit_price]" required>
                                                </td>
                                                <td>
                                                    <input ng-disabled="!checked[$index]" ng-model="amount[$index]" class="form-control input-sm" type="hidden" name="items[<% $index %>][amount]" value="<% amount[$index] = quantity[$index]*unit_price[$index] %>"><% amount[$index] = quantity[$index]*unit_price[$index] %>
                                                </td>
                                                <td>
                                                    <input ng-disabled="!checked[$index]" ng-model="discount_rate[$index]" ng-init="discount_rate[$index]= 0" class="form-control input-sm" type="number" name="items[<% $index %>][discount_rate]" required>
                                                </td>
                                                <td>
                                                    <input ng-disabled="!checked[$index]" ng-model="total_discount[$index]" class="form-control input-sm" type="hidden" name="items[<% $index %>][total_discount]" value="<% total_discount[$index] = amount[$index]*discount_rate[$index]/100 %>"><% total_discount[$index] = amount[$index]*discount_rate[$index]/100 %>
                                                </td>
                                                <td>
                                                    <input ng-disabled="!checked[$index]" ng-model="vat_rate[$index]" ng-init="vat_rate[$index]= 0" class="form-control input-sm" type="number" name="items[<% $index %>][vat_rate]" required>
                                                </td>
                                                <td><input ng-disabled="!checked[$index]" ng-model="vat_amount[$index]" class="form-control input-sm" type="hidden" name="items[<% $index %>][vat_amount]" value="<% vat_amount[$index] = amount[$index]*vat_rate[$index]/100 %>"><% vat_amount[$index] = amount[$index]*vat_rate[$index]/100 %></td>
                                                <td><input ng-disabled="!checked[$index]" ng-model="total_net_amount[$index]" class="form-control input-sm" type="hidden" name="items[<% $index %>][total_net_amount]" value="<% total_net_amount[$index] = amount[$index]-total_discount[$index]+vat_amount[$index] %>"><% total_net_amount[$index] = amount[$index]-total_discount[$index]+vat_amount[$index] %></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="6">Total</td>
                                                <td><% sum(amount) %></td>
                                                <td></td>
                                                <td><% sum(total_discount) %></td>
                                                <td></td>
                                                <td><% sum(vat_amount) %></td>
                                                <td><% sum(total_net_amount) %></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!--end table-->
                            </fieldset>
                            <!----------PO Product Details end-------->
                            <!----------Payment Terms-------->
                            <fieldset class="m-t-15">
                                <legend>Payment Terms:</legend>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <label>Payment Type</label>
                                        <div class="form-group">
                                            <select class="form-control input-sm select2" ng-model="payment_terms_type" required>
                                                <option value="" disabled selected> Select Payment Type</option>
                                                <option value="Fixed">Fixed</option>
                                                <option value="Percentage">Percentage</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Description</th>
                                                        <th colspan="2">% or Fixed Amount</th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ BootForm::text('payment_date','Date', null, ['class'=>'form-control input-sm datepicker','ng-model'=>'payment_terms_date']) }}
                                                        </th>
                                                        <th>
                                                            {{ BootForm::text('payment_terms_description','Payment Description',null,['class'=>'form-control input-sm','rows'=>'1', 'ng-model' => 'payment_terms_description']) }}
                                                        </th>
                                                        <th>
                                                            {{ BootForm::number('payment_terms_amount','Payment Amount', null, ['class'=>'form-control input-sm', 'ng-model' => 'payment_terms_amount']) }}
                                                        </th>
                                                        <th  class="text-center"><button type="button" ng-click="add_terms()" class="btn btn-xs btn-default">Add</button></th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <table class="table table-bordered table-hover">
                                                <thead ng-if="payment_terms.length >=1">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Payment term</th>
                                                        <th>Date</th>
                                                        <th>Description</th>
                                                        <th>% or Fixed Payment Amount</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="terms in payment_terms">
                                                        <td><% $index+1 %></td>
                                                        <td><% terms.type %> <input name="payment_terms[<% $index %>][payment_type]" type="hidden" value="<% terms.type %>"></td>
                                                        <td><% terms.date %> <input name="payment_terms[<% $index %>][payment_date]" type="hidden" value="<% terms.date %>"></td>
                                                        <td><% terms.description %> <input name="payment_terms[<% $index %>][description]" type="hidden" value="<% terms.description %>"></td>
                                                        <td><% terms.amount %> <input name="payment_terms[<% $index %>][amount]" type="hidden" value="<% terms.amount %>"></td>
                                                        <td  class="text-center">
                                                            <button type="button" class="btn btn-xs btn-danger" ng-click="removeTerms($index)"><i class="fa fa-times"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end table-->
                                    </div>
                                </div>
                            </fieldset>
                            <!--------Payment Terms end-------->
                            <!----------Terms and Condition-------->
                            <fieldset class="m-t-15">
                                <legend>Terms and Condition:</legend>
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                        <label>Terms and Condition Type</label>
                                        <div class="form-group">
                                            <select class="form-control input-sm select2" id="terms_and_condition" ng-model="condition_type" required>
                                                <option value="" disabled selected> Select Terms and Condition Type </option>
                                                <option value="Delivery Terms">Delivery Terms</option>
                                                <option value="Payment Condition">Payment Condition</option>
                                                <option value="Warranty Terms">Warranty Terms</option>
                                                <option value="Security Terms">Security Terms</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                        {{ BootForm::textarea(null,'Description',null,['id'=>'description','class'=>'form-control input-sm','rows'=>'1', 'ng-model' => 'condition_description']) }}
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <button type="button" ng-click="add_condition()" class="btn btn-sm btn-default m-t-20"><strong>Add</strong></button>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-if="conditions.length >=1">
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
                                                <tbody id="mytable1">
                                                    <tr ng-repeat="condition in conditions">
                                                        <td><% $index+1 %></td>
                                                        <td><% condition.type %><input name="terms_conditions[<% $index %>][terms_type]" type="hidden" value="<% condition.type %>"></td>
                                                        <td><% condition.description %> <input name="terms_conditions[<% $index %>][description]" type="hidden" value="<% condition.description %>"></td>
                                                        <td class="text-center"><button class="btn btn-danger btn-xs" ng-click="removeCondition($index)"><i class="fa fa-times"></i></button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end table-->
                                    </div>
                                </div>
                            </fieldset>
                            <!---------Terms and Condition end-------->
                            <button class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection
@section('script')
<script>
    var app = angular.module('myApp', [], function($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        });
    app.controller('myCtrl', function($scope, $http) {

        $scope.itemlist = [];
        $scope.requisitions = [];
        $scope.quantity = [];
        $scope.unit_price = [];
        $scope.amount = [];
        $scope.discount_rate = [];
        $scope.vat_rate = [];
        $scope.total_discount = [];
        $scope.vat_amount = [];
        $scope.total_net_amount = [];

        $scope.searchReqNo = function () {
            $scope.itemlist = [];
            $scope.requisitions = [];
            $scope.addToItemList($scope.req_id.join());
        }

        $scope.addToItemList = function(ids){
            let url = "{{URL::to('get-local-requisition')}}/" + ids;
            $http.get(url)
                    .then(function(response) {
                        $scope.requisitions = response.data.requisitions;
                        $scope.itemlist = response.data.items;
                    });
        }

        $scope.removeItem = function(index){
            $scope.itemlist.splice(index, 1);
        }

        $scope.payment_terms = [];

        $scope.add_terms = function(){
            var term = {};
            if(!$scope.payment_terms_type){
                $scope.warning('Please select a payment type first');
                return;
            }

            if(!$scope.payment_terms_amount){
                $scope.warning('Payment amount is empty');
                return;
            }

            if(!$scope.payment_terms_description){
                $scope.warning('Payment description is empty');
                return;
            }

            if(!$scope.payment_terms_date){
                $scope.warning('Payment date is empty');
                return;
            }

            term.type = $scope.payment_terms_type;
            term.date = $scope.payment_terms_date;
            term.description = $scope.payment_terms_description;
            term.amount = $scope.payment_terms_amount;
            $scope.payment_terms.push(term);
        }

        $scope.removeTerms = function(index){
            $scope.payment_terms.splice(index, 1);
        }


        $scope.conditions = [];

        $scope.add_condition = function(){
            var condition = {};
            if(!$scope.condition_type){
                $scope.warning('Please select terms and condition type first');
                return;
            }

            if(!$scope.condition_description){
                $scope.warning('Description of terms and condition is empty');
                return;
            }

            condition.type = $scope.condition_type;
            condition.description = $scope.condition_description;

            index = $scope.conditions.findIndex(value => value.type == condition.type);

            if(index >= 0){
                $scope.warning('Terms and conditions already exist');
                return;
            }

            $scope.conditions.push(condition);
        }

        $scope.removeCondition = function(index){
            $scope.conditions.splice(index, 1);
        }

        $scope.sum = function($arr){
            var sum = 0;
            for(i=0; i<$arr.length; i++){
                sum += $arr[i];
            }
            return sum;
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

    });
</script>
@endsection
