@extends('layout')
@section('title', 'Lc details')
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
                        <h2>LC Detail</h2>
                        <a href="{{route('letter-of-credit.index')}}" class="mb-xs mt-xs mr-xs  btn btn-success btn-sm pull-right"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;LC Detail List</a>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" ng-controller="myCtrl">
                        <br />

                        <form class="form-horizontal form-label-left" autocomplete="off" action="{{route('letter-of-credit.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('letter_of_credit_no','LC No.', null, ['class'=>'form-control input-sm','required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('letter_of_credit_date','LC Date', null, ['class'=>'form-control input-sm datepicker','required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::number('letter_of_credit_value','LC Value', null, ['class'=>'form-control input-sm','required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::select('vendor_id', 'Vendor', $vendor_list, null, ['class'=>'form-control input-sm select2','required','data-popup'=> route('vendor.index')]) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('letter_of_credit_expire_date','LC Expire Date', null, ['class'=>'form-control input-sm datepicker','required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::select('letter_of_credit_status', 'LC Status', [''=>'-- Select Shipment --','1'=>'Open','2'=>'Close'], null, ['class'=>'form-control input-sm select2','required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::text('letter_of_credit_shipment_date','LC Shipment Date', null, ['class'=>'form-control input-sm datepicker','required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    {{ BootForm::select('currency_id', 'Currency', $currency_list, null, ['class'=>'form-control input-sm select2','required']) }}
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Beneficiary Bank info</div>
                                        <div class="panel-body">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 item">
                                                {{ BootForm::text('beneficiary_ac_no','A/C No', null, ['class'=>'form-control input-sm','required']) }}
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 item">
                                                {{ BootForm::text('beneficiary_ac_name','A/C Name', null, ['class'=>'form-control input-sm','required']) }}
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 item">
                                                {{ BootForm::text('beneficiary_branch_name','Branch Name', null, ['class'=>'form-control input-sm','required']) }}
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 item">
                                                {{ BootForm::text('beneficiary_bank_name','Bank Name', null, ['class'=>'form-control input-sm','required']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Issue Bank info</div>
                                        <div class="panel-body">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 item">
                                                {{ BootForm::text('issue_ac_no','A/C No ', null, ['class'=>'form-control input-sm','required']) }}
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 item">
                                                {{ BootForm::text('issue_ac_name','A/C Name', null, ['class'=>'form-control input-sm','required']) }}
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 item">
                                                {{ BootForm::text('issue_branch_name','Branch Name', null, ['class'=>'form-control input-sm','required']) }}
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 item">
                                                {{ BootForm::text('issue_bank_name','Bank Name', null, ['class'=>'form-control input-sm','required']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading"><h4>LCA Information</h4></div>
                                <div class="panel-body">
                                                                                {{-- <div class="input-group mb-3">
                                                                            {{ BootForm::text('lac_no','LCA No.', null, ['class'=>'form-control input-sm']) }}
                                                                            <div class="input-group-append">
                                                                                <button class="btn btn-default">Add</button>
                                                                            </div>
                                                                        </div> --}}

                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <label>LCA No</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control input-sm" ng-model="lca_no">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default btn-sm" type="button" ng-click="addLca()">Add</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table.order-list" id="lca_no_table">
                                            <thead>
                                                <tr>
                                                    <th>SL No.</th>
                                                    <th>LCA No</th>
                                                    <th class="text-right">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="lca in lcalist">
                                                    <td scope="row"><% $index+1 %></td>
                                                    <td><% lca.lca_no %><input type="hidden" value="<% lca.lca_no %>" name="lca_nos[<% $index %>][lca_no]"></td>
                                                    <td class="text-right"><a href="" class="btn btn-danger  btn-xs" ng-click="removeLca($index)"><i class="fa fa-trash"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('partial_shipment', 'Partial Shipment', [''=>'-- Select Shipment --','1'=>'Allow','2'=>'Not Allow'], null, ['class'=>'form-control input-sm select2','required']) }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('transhipment_information', 'Transhipment Information', [''=>'-- Select Transhipment --','1'=>'Allow','2'=>'Not Allow'], null, ['class'=>'form-control input-sm select2','required']) }}
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading"><h4>PI Information</h4></div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            {{ BootForm::select('proforma_invoice_ids[]', 'Proforma Invoice NO', $proforma_invoice_list, null, ['class'=>'form-control input-sm select2' ,'multiple','ng-model'=>'pi_id', 'ng-change'=>'searchPI()','required']) }}
                                        </div>
                                    </div>
                                    {{-- <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SL No.</th>
                                                    <th>PI No</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row"><% $index+1 %></td>
                                               </tr>
                                            </tbody>
                                        </table>
                                    </div> --}}
                                </div>
                            </div>

                            <fieldset>
                                <legend>Product Table:</legend>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" ng-if="itemlist.length >= 1">
                                        <thead class="bg-primary">
                                                <tr>
                                                    <th>SL NO</th>
                                                    <th>Product Name</th>
                                                    <th>H.S. CODE</th>
                                                    <th>UOM</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Price</th>
                                                    {{-- <th>D.Rate</th> --}}
                                                    {{-- <th>Discount</th> --}}
                                                    {{-- <th>Vat(%)</th> --}}
                                                    <th>Amount (USD)</th>
                                                </tr>

                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="item in itemlist">
                                                <td class="text-center"><% $index+1 %></td>
                                                <td class="checkbox">
                                                    <label class="i-checks">
                                                        <input type="checkbox" ng-init="checked[$index] = true" ng-model="checked[$index]"><% item.name %>
                                                    </label>
                                                </td>
                                                <td><% item.hs_code %></td>
                                                <td><% item.uom %><input type="hidden" class="form-control" name="items[<% $index %>][product_id]" value="<% item.product_id %>"></td>
                                                <td><input ng-disabled="!checked[$index]" ng-model="quantity[$index]" ng-init="quantity[$index] = number(item.quantity)" class="form-control input-sm" type="number" name="items[<% $index %>][quantity]" required></td>
                                                <td><input ng-disabled="!checked[$index]" ng-model="unit_price[$index]" ng-init="unit_price[$index] = number(item.unit_price)" class="form-control input-sm" type="number" name="items[<% $index %>][unit_price]" required></td>
                                                {{-- <td><input ng-disabled="!checked[$index]" ng-model="d_rate[$index]"  class="form-control input-sm" type="number" name="items[<% $index %>][d_rate]" required></td> --}}
                                                {{-- <td><input ng-disabled="!checked[$index]" ng-model="discount[$index]"  class="form-control input-sm" type="number" name="items[<% $index %>][discount]" required></td> --}}
                                                {{-- <td><input ng-disabled="!checked[$index]" ng-model="vat[$index]"  class="form-control input-sm" type="number" name="items[<% $index %>][vat]" required></td> --}}
                                                <td class="text-right"><% total[$index] = quantity[$index]*unit_price[$index]|number:2  %></td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="font-bold">
                                                {{-- <tr>
                                                    <td colspan="5">Sub Total</td>
                                                    <td>520</td>

                                                    <td colspan="2"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">Add freight</td>
                                                    <td>520</td>

                                                    <td colspan="2"></td>
                                                </tr> --}}
                                                <tr>
                                                    <td colspan="6" class="text-right"><strong>Grand Total</strong></td>

                                                    <td colspan="1" class="text-right"><strong><% grandSum(total)|number:2 %></strong></td>
                                                </tr>
                                                {{-- <tr>
                                                    <td colspan="5">Amount in Word</td>
                                                    <td>one thousand five hundred </td>

                                                    <td colspan="2"></td>
                                                </tr> --}}
                                            </tfoot>
                                    </table>
                                </div>
                            </fieldset>

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <br />

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Content end --}}
    </div>
</div>
@endsection

@section('script')
<script>
    var app = angular.module('myApp', [], function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });
    app.controller('myCtrl', function ($scope, $http) {

        $scope.itemlist = [];
        $scope.lcalist = [];
        $scope.total = [];
        $scope.d_rate = [];
        $scope.searchPI = function () {
            $scope.itemlist = [];
            for (i = 0; i < $scope.pi_id.length; i++) {
                $scope.addToItemList($scope.pi_id[i]);
            }
        }
        $scope.addToItemList = function (id) {
            let url = "{{URL::to('get-pi')}}/" + id;
            $http.get(url)
                    .then(function (response) {
                        // console.log('data-----------', response.data);
                        angular.forEach(response.data, function (value, key) {
                            $scope.itemlist.push(value);
                            // console.log('itemlist', $scope.itemlist);
                        });
                    });
        }
        $scope.removeItem = function (index) {
            $scope.itemlist.splice(index,1);
        }
        $scope.number = function (str) {
            return parseFloat(str);
        }
        $scope.addLca = function(){
            var lca_no = $scope.lca_no;
            $scope.lca_no = null;
            if(!lca_no){
                $scope.warning('Please type something first');
                return;
            }
            index = $scope.lcalist.findIndex(item => item.lca_no==lca_no);
            if(index >= 0){
                $scope.warning('This LCA No already exist');
                return;
            }
            var lca = {};
            lca.lca_no = lca_no;
            $scope.lcalist.push(lca);
        }
        $scope.removeLca = function(index){
            $scope.lcalist.splice(index,1);
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


        $scope.grandSum=function($array){
        var sum = 0;
            for(i=0; i<$array.length; i++){
                sum += $array[i];
            }
            return sum;
      }
    });


//     $('#add').on('click', function(e){
//      var lca_no = $('#lca_no').val();
//     $('#lca_no_table').prepend('<tr><td scope="row">1</td> <td>'+ lca_no +'</td><td class="text-right"><a href="" class="btn btn-danger  btn-xs">Delete</a></td> </tr>');
// });

// lca add value

$(document).ready(function () {
    var counter = 1;

    $("#add").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";
        var lca_no = $('#lca_no').val();

        cols += '<td>'+ counter + '</td>';
        cols += '<td><input type="text" class="form-control" id="lca_no_value' + counter + '" name="mail' + counter + '"/></td>';
        cols += '<td><input type="button" class="ibtnDel btn btn-danger btn-sm"  value="Delete"></td>';

        newRow.append(cols);
        $('#lca_no_table').append(newRow);
        $("#lca_no_value" + counter).val(lca_no);
        counter++;
    });



    $('#lca_no_table').on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });


});



// function calculateRow(row) {
//     var price = +row.find('input[name^="price"]').val();

// }

// function calculateGrandTotal() {
//     var grandTotal = 0;
//     $("table.order-list").find('input[name^="price"]').each(function () {
//         grandTotal += +$(this).val();
//     });
//     $("#grandtotal").text(grandTotal.toFixed(2));
// }

</script>
@endsection
