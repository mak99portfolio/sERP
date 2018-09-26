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
                            <div class="row">
                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('bill_of_lading_issue_no', 'BL No', $commercial_invoice_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required','ng-model'=>'bl_no','ng-change'=>'searchBL()']) }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('bill_of_lading_issue_date','BL Date', null, ['class'=>'form-control input-sm datepicker','ng-model'=>'bill_of_lading_issue_date']) }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('letter_of_credit_no','LC No', null, ['class'=>'form-control input-sm','readonly','ng-model'=>'letter_of_credit_no']) }}
                                    <input type="text" name="letter_of_credit_id" ng-model='letter_of_credit_id'>
                                </div>
                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('letter_of_credit_date','LC Date', null, ['class'=>'form-control input-sm','readonly','ng-model'=>'letter_of_credit_date']) }}
                                 </div>
                                {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('commercial_invoice_no','Commercial Invoice No', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('commercial_invoice_date','Commercial Invoice Date', null, ['class'=>'form-control input-sm datepicker']) }}
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
                                                        <td scope="col"><% ci.commercial_invoice_no %></td>
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
                                                        <th scope="col" colspan="3">Product List</th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Quantity</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="item in itemlist">
                                                        <td scope="col"><% $index+1 %></td>
                                                        <td scope="col"><% item.name %></td>
                                                        <td scope="col"><% item.quantity %></td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td scope="col" colspan="2" class="text-right">Total Quantity</td>
                                                        <td scope="col">5</td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!--end table-->
                                    </div>


                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('container_no','Container No', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('container_size','Container Size', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('number_of_box','Number Of Box', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('shipping_agency_id', 'Shipping Agency Name', $exproter_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('local_agency_id', 'Local Agency Name', $exproter_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('exproter_id', 'Exproter', $exproter_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::text('consignee','Consignee', null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">LC Issue Bank</div>
                                        <div class="panel-body">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('issue_ac_no','A/C No', null, ['class'=>'form-control input-sm','readonly','ng-model'=>'issue_ac_no']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('issue_ac_name','A/C Name', null, ['class'=>'form-control input-sm','readonly','ng-model'=>'issue_ac_name']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('issue_branch_name','Branch Name', null, ['class'=>'form-control input-sm','readonly','ng-model'=>'issue_branch_name']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('issue_bank_name','Bank Name', null, ['class'=>'form-control input-sm','readonly','ng-model'=>'issue_bank_name']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::text('acceptance','Acceptance', null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::select('port_of_loading_id', 'Port Of Loading', $port_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::select('port_of_dischare_id', 'Port Of Dischrge', $port_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            {{ BootForm::text('place_of_delivery','Place Of Delivery', null, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('voyage_no','Voyage No', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('place_of_transhipment','Place of Transhipment', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::select('modes_of_transport', 'Modes Of Transport', [''=>'-- select --','1'=>'Option'], null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            {{ BootForm::select('move_type', 'Move Type', [''=>'-- select --','1'=>'Option'], null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required']) }}
                                        </div>

                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::textarea('issue_place','Issue Place', null, ['class'=>'form-control input-sm','rows'=>"1"]) }}
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('number_of_mtd','Number Of MTD', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::text('requisition_date','Packaging Qty', null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            {{ BootForm::text('requisition_date','Gross Weight', null, ['class'=>'form-control input-sm']) }}
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

        $scope.itemlist = [];
        $scope.searchBL = function () {
            $scope.itemlist = [];
            $scope.addToItemList($scope.bl_no);
        }
        $scope.addToItemList = function(bl_no){
            let url = "{{URL::to('get-all-by-bl-no')}}/" + bl_no;
            $http.get(url)
                    .then(function(response) {
                        console.log(response.data);
                        $scope.itemlist = response.data.items;
                        $scope.cilist = response.data.ci;
                        $scope.bill_of_lading_issue_date = response.data.ci[response.data.ci.length-1].bl_date;
                        $scope.letter_of_credit_no = response.data.lc.letter_of_credit_no;
                        $scope.letter_of_credit_date = response.data.lc.letter_of_credit_date;
                        $scope.letter_of_credit_id = response.data.lc.id;
                        $scope.issue_ac_no = response.data.lc.issue_ac_no;
                        $scope.issue_ac_name = response.data.lc.issue_ac_name;
                        $scope.issue_branch_name = response.data.lc.issue_branch_name;
                        $scope.issue_bank_name = response.data.lc.issue_bank_name;

                    });
        }
    });
</script>
@endsection
