@extends('layout')
@section('title', 'Bill of Lading')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Procurement</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        {{-- Content here --}}
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" ng-app="myApp">
                    <div class="x_title">
                        <h2>Bill of Lading</h2>
                        <a href="{{route('bill-of-lading.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> See Bill of Lading List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" ng-controller="myCtrl">
                        <br />
                        <form class="form-horizontal form-label-left input_mask" autocomplete="off"  action="{{route('bill-of-lading.store')}}" method="POST">
                                @csrf
                                {{-- <input type="hidden" name="letter_of_credit_id" value='<% letter_of_credit_id %>'> --}}
                            <div class="row">
                               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('bill_of_lading_no','Bill of Lading No', null, ['class'=>'form-control input-sm','required']) }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('bill_of_lading_date','Bill of Lading Date', null, ['class'=>'form-control input-sm datepicker','ng-model'=>'bill_of_lading_issue_date','required']) }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::select('letter_of_credit_id', 'Letter of Credit No', $letter_of_credit_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'ng-model'=>'lc_id','ng-change'=>'getLcToCi()','required', 'data-popup'=> route('letter-of-credit.index')]) }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('letter_of_credit_date','Letter of Credit Date', null, ['class'=>'form-control input-sm','ng-model'=>'letter_of_credit_date','required' ,'readonly']) }}
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item">


                                        <div class="form-group">
                                                <label>Commercial Invoice</label>
                                                <select class="form-control input-sm select2" data-placeholder="-- Select CI --" multiple name="commercial_invoice_ids[]" ng-model="commercial_invoice_ids" ng-change="getCI()">

                                                    <option ng-repeat="ci in ci_list" value="<% ci.id %>"><% ci.commercial_invoice_no %></option>
                                                </select>
                                        </div>

                                    {{-- {{ BootForm::select('commercial_invoice_ids', 'Commercial Invoice', $commercial_invoice_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'ng-model'=>'bl_no','ng-change'=>'searchBL()','required', 'data-popup'=> route('commercial-invoice.index')]) }} --}}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('letter_of_credit_no','LC No', null, ['class'=>'form-control input-sm','readonly','ng-model'=>'letter_of_credit_no','required']) }}
                                </div>


                                {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('commercial_invoice_no','Commercial Invoice No', null, ['class'=>'form-control input-sm','required']) }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('commercial_invoice_date','Commercial Invoice Date', null, ['class'=>'form-control input-sm datepicker','required']) }}
                                </div> --}}
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th scope="col" colspan="3">Commercial Invoice List</th>
                                                    </tr>
                                                    <tr >
                                                        <th scope="col">#</th>
                                                        <th scope="col">Commercial Invoice No</th>
                                                        <th scope="col">Commercial Invoice Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="ci in cilist">
                                                        <td scope="col"><% $index+1 %></td>
                                                        <td scope="col"><% ci.commercial_invoice_no %>
                                                            <input type="hidden" class="form-control" name="ci_ids[]" value="<% ci.id %>">
                                                        </td>
                                                        <td scope="col"><% ci.date %></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th scope="col" colspan="5">Product List</th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">UOM</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Unit Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="item in itemlist">
                                                        <td scope="col"><% $index+1 %></td>
                                                        <td scope="col"><% item.name %><input type="hidden" class="form-control" name="items[<% $index %>][product_id]" value="<% item.product_id %>"></td>
                                                        <td scope="col"><% item.uom %></td>
                                                        <td scope="col"><% item.quantity %><input type="hidden" class="form-control" name="items[<% $index %>][quantity]" value="<% item.quantity %>"></td>
                                                        <td scope="col"><% item.unit_price %><input type="hidden" class="form-control" name="items[<% $index %>][unit_price]" value="<% item.unit_price %>"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end table-->
                                    </div>


                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('container_no','Container No', null, ['class'=>'form-control input-sm','required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('container_size','Container Size', null, ['class'=>'form-control input-sm','required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('number_of_box','Number Of Box', null, ['class'=>'form-control input-sm','required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::select('shipping_agency_vendor_id', 'Shipping Agency Name', $exporter_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required', 'data-popup'=> route('vendor.index')]) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::select('local_agency_vendor_id', 'Local Agency Name', $exporter_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required', 'data-popup'=> route('vendor.index')]) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::select('exporter_vendor_id', 'Exporter', $exporter_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required', 'data-popup'=> route('vendor.index')]) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::select('consignee_company_profile_id', 'Consignee',$company_profile_list,null, ['class'=>'form-control input-sm select2', 'required','data-popup'=> route('company-profile.index')]) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">LC Issue Bank</div>
                                        <div class="panel-body">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::text('issue_ac_no','A/C No', null, ['class'=>'form-control input-sm','readonly','ng-model'=>'issue_ac_no']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::text('issue_ac_name','A/C Name', null, ['class'=>'form-control input-sm','readonly','ng-model'=>'issue_ac_name']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::text('issue_branch_name','Branch Name', null, ['class'=>'form-control input-sm','readonly','ng-model'=>'issue_branch_name']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::text('issue_bank_name','Bank Name', null, ['class'=>'form-control input-sm','readonly','ng-model'=>'issue_bank_name']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                        {{ BootForm::text('acceptance','Acceptance', null, ['class'=>'form-control input-sm','required']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                        {{ BootForm::select('port_of_loading_port_id', 'Port Of Loading', $port_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required','ng-model'=>'port_of_loading_port_id','data-popup'=> route('port.index')]) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                        {{ BootForm::select('port_of_discharge_port_id', 'Port Of Discharge', $port_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required','ng-model'=>'port_of_discharge_port_id', 'data-popup'=> route('port.index')]) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                            {{ BootForm::text('place_of_delivery','Place Of Delivery', null, ['class'=>'form-control input-sm','required']) }}
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                                {{ BootForm::text('voyage_no','Voyage No', null, ['class'=>'form-control input-sm','required']) }}
                                            </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('place_of_transhipment','Place of Transhipment', null, ['class'=>'form-control input-sm','required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                        {{ BootForm::select('modes_of_transport_id', 'Modes Of Transport', $modes_of_transport_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required', 'data-popup'=> route('modes-of-transport.index')]) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                            {{ BootForm::select('move_type_id', 'Move Type', $move_type_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required', 'data-popup'=> route('move-type.index')]) }}
                                        </div>

                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::textarea('issue_place','Issue Place', null, ['class'=>'form-control input-sm','rows'=>"1",'required']) }}
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('number_of_mtd','Number Of MTD', null, ['class'=>'form-control input-sm','required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                        {{ BootForm::text('packaging_qty','Packaging Qty', null, ['class'=>'form-control input-sm','required']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                            {{ BootForm::text('gross_weight','Gross Weight', null, ['class'=>'form-control input-sm','required']) }}
                                        </div>


                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                        <a href="{{route('bill-of-lading.index')}}" class="btn btn-default btn-sm">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        {{--end Content here --}}
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

        // $scope.itemlist = [];
        // $scope.searchBL = function () {
        //     $scope.itemlist = [];
        //     $scope.addToItemList($scope.bl_no);
        // }
        // $scope.addToItemList = function(bl_no){
        //     let url = "{{URL::to('get-all-by-bl-no')}}/" + bl_no;
        //     $http.get(url)
        //             .then(function(response) {
        //                 console.log(response.data);
        //                 $scope.itemlist = response.data.items;
        //                 $scope.cilist = response.data.ci;
        //                 $scope.bill_of_lading_issue_date = response.data.ci[response.data.ci.length-1].bill_of_lading_date;
        //                 $scope.letter_of_credit_no = response.data.lc.letter_of_credit_no;
        //                 $scope.letter_of_credit_date = response.data.lc.letter_of_credit_date;
        //                 $scope.letter_of_credit_id = response.data.lc.id;

        //                 $scope.issue_ac_no = response.data.lc.issue_ac_no;
        //                 $scope.issue_ac_name = response.data.lc.issue_ac_name;
        //                 $scope.issue_branch_name = response.data.lc.issue_branch_name;
        //                 $scope.issue_bank_name = response.data.lc.issue_bank_name;

        //             });
        // }


        $scope.ci_list = [];
        $scope.getLcToCi = function(){
            let url = "{{URL::to('get-lc-to-ci-list')}}/" + $scope.lc_id;
            $http.get(url).then(function(response) {
                $scope.ci_list = response.data.commercial_invoice_list;
                $scope.letter_of_credit_no = response.data.lc_no.letter_of_credit_no;
                $scope.letter_of_credit_date = response.data.lc_no.letter_of_credit_date;

                $scope.issue_ac_no = response.data.lc_no.issue_bank.account_no;
                $scope.issue_ac_name = response.data.lc_no.issue_bank.account_name;
                $scope.issue_branch_name = response.data.lc_no.issue_bank.branch_name;
                $scope.issue_bank_name = response.data.lc_no.issue_bank.bank.name;

                $scope.port_of_loading_port_id = response.data.last_pi.port_of_loading_port_id.toString();
                $scope.port_of_discharge_port_id = response.data.last_pi.port_of_discharge_port_id.toString();
            });
        }

        $scope.getCI = function () {
            var ids = $scope.commercial_invoice_ids.join();
            let url = "{{URL::to('get-ci-by-ci-ids')}}/" + ids;
            $http.get(url).then(function(response) {
                $scope.cilist = response.data.ci_list;
                $scope.itemlist = response.data.items;
            });
        }
    });
</script>
@endsection
