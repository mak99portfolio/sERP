@extends('layout')
@section('title', 'Duty TAX, VAT and CNF Bill')
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
                        <h2>Duty TAX, VAT and CNF Bill</h2>
                        <a href="{{route('cnf.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> See Duty TAX, VAT and CNF Bill List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" ng-controller="myCtrl">
                        <br />
                        @include('partials.flash_msg')
                        <form class="form-horizontal form-label-left input_mask" action="{{ route('cnf.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('bill_of_lading_issue_id', 'BL No', $bill_of_lading_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;",'required','ng-model'=>'bl_no','ng-change'=>'searchBL()']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('bill_of_lading_issue_date','BL Date', null, ['class'=>'form-control input-sm','ng-model'=>'bill_of_lading_issue_date', 'readonly']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('letter_of_credit_no','LC No', null, ['class'=>'form-control input-sm','readonly','ng-model'=>'letter_of_credit_no']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('letter_of_credit_date','LC Opening Date', null, ['class'=>'form-control input-sm','readonly','ng-model'=>'letter_of_credit_date']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::number('letter_of_credit_value','LC Value (USD)', null, ['class'=>'form-control input-sm', 'ng-model'=>'letter_of_credit_value', 'readonly']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text(null, 'Exporter', null, ['class'=>'form-control input-sm' , 'ng-model'=>'vendor_name', 'readonly']) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th scope="col" colspan="4">Commercial Invoice List</th>
                                                </tr>
                                                <tr >
                                                    <th scope="col">#</th>
                                                    <th scope="col">Commercial Invoice No</th>
                                                    <th scope="col">Commercial Invoice Date</th>
                                                    <th scope="col">COntainer No</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="ci in cilist">
                                                    <td scope="col"><% $index+1 %></td>
                                                    <td scope="col"><% ci.commercial_invoice_no %></td>
                                                    <td scope="col"><% ci.date %></td>
                                                    <td scope="col"><% ci.container_no %></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('bill_no','Bill No', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('bill_date','Bill Date', null, ['class'=>'form-control input-sm datepicker']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('consignee','Consignee', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('bill_of_entry_no','B/E No', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('bill_of_entry_date','B/E Date', null, ['class'=>'form-control input-sm datepicker']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('arrival_date','Arrival Date', null, ['class'=>'form-control input-sm datepicker']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('delivery_date','Delivery Date', null, ['class'=>'form-control input-sm datepicker']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('job_no','Job No', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::number('total_day','Total Days', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::number('cnf_value','C&F Value', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::number('usd_amount','USD Amount', null, ['class'=>'form-control input-sm', 'ng-model'=>'usd_amount']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::number('exchange_rate','Exchange Rate', null, ['class'=>'form-control input-sm', 'ng-model'=>'exchange_rate']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>BDT Amount</label>
                                        <input type="number" class="form-control input-sm" name="bdt_amount" ng-model="bdt_amount" value="<% getBdtAmount() %>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('vendor_id', 'CNF Agent', $vendor_list, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('duty_payment_date','Duty Payment Date', null, ['class'=>'form-control input-sm datepicker']) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Particulars of Consignments Table</div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Particulars of Consignments</label>
                                                        <select class="form-control input-sm" ng-model="consignment_particular" required>
                                                            <option value="">--Select Particulars of Consignments--</option>
                                                            @foreach($consignment_partucular_list as $item)
                                                            <option value="{{$item}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="">Amount</label>
                                                        <input type="text" class="form-control input-sm" name="amount" ng-model="amount">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                    <div class="form-group">
                                                        <label for=""></label>
                                                        <button type="button" class="form-control btn btn-primary  btn-sm" ng-click="addParticular()">Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th scope="col" class="text-center">#</th>
                                                            <th scope="col" class="text-center">Particulars of Consignments</th>
                                                            <th scope="col" class="text-center">Taka</th>
                                                            <th scope="col" class="text-center"><i class="fa fa-trash"></i></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr ng-repeat="particular in particularlist">
                                                            <th scope="row"><% $index+1 %></th>
                                                            <td><% particular.name %> <input type="hidden" name="items[<% $index %>][consignment_particular_id]" value="<% particular.id %>"></td>
                                                            <td><% particular.amount %><input type="hidden" name="items[<% $index %>][amount]" value="<% particular.amount %>"></td>
                                                            <td class="text-center"><a href="" class="btn btn-danger btn-xs" ng-click="remove($index)"><i class="fa fa-trash"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-right" colspan="2">Voucher Tk</th>
                                                            <td>
                                                                <% getVoucherAmount() %>
                                                            </td>
                                                        </tr>
                                                        {{-- <tr>
                                                            <th class="text-right" colspan="2">Previous Due Tk</th>
                                                            <td>
                                                                <input type="number" class="form-control input-sm">
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-right" colspan="2">Total Voucher Tk</th>
                                                            <td>
                                                                <input type="number" class="form-control input-sm">
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-right" colspan="2">Cash Received/Pay Order Tk</th>
                                                            <td>
                                                                <input type="number" class="form-control input-sm">
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-right" colspan="2">Due Tk</th>
                                                            <td>
                                                                <input type="number" class="form-control input-sm">
                                                            </td>
                                                            <td></td>
                                                        </tr> --}}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Amount In Words</label>
                                        <input type="text" class="form-control input-sm" name="amount_in_word">
                                    </div>
                                </div> --}}
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Notes</label>
                                        <textarea name="note" class="form-control input-sm" id="" cols="30" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Save</button>
                                        <a href="{{route('cnf.index')}}" class="btn btn-default btn-sm">Cancel</a>
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



        $scope.searchBL = function () {
            $scope.getLcAndCiDetails($scope.bl_no);
        }

        $scope.getLcAndCiDetails = function(id){
            let url = "{{URL::to('get-all-by-bl-no')}}/" + id;
            $http.get(url).then(function(response) {
                console.log(response.data);
                $scope.cilist = response.data.ci;
                $scope.bill_of_lading_issue_date = response.data.ci[response.data.ci.length-1].bl_date;
                $scope.container_no = response.data.ci[response.data.ci.length-1].container_no;
                $scope.letter_of_credit_no = response.data.lc.letter_of_credit_no;
                $scope.letter_of_credit_date = response.data.lc.letter_of_credit_date;
                $scope.letter_of_credit_value = parseInt(response.data.lc.letter_of_credit_value);
                $scope.vendor_name = response.data.lc.vendor_id;
            });
        }


        $scope.getBdtAmount = function () {
                var total = 0;
                total = $scope.usd_amount * $scope.exchange_rate;
                $scope.bdt_amount = total;
                return $scope.bdt_amount;
            }


        $scope.particularlist = [];
        $scope.addParticular = function(){
            var particular = {};

            if(!$scope.consignment_particular){
                $scope.warning('Please select a particular first');
                return;
            }

            var item = JSON.parse($scope.consignment_particular);


            index = $scope.particularlist.findIndex(value => value.id == item.id);
            if(index >= 0){
                $scope.warning('This Particular already exist');
                return;
            }

            particular.name = item.name;
            particular.id = item.id;
            particular.amount = $scope.amount;
            $scope.particularlist.push(particular);
            // console.log($scope.particularlist[0].amount);

            $scope.getVoucherAmount = function(){
                var sum = 0;
                for (var i = 0; i < $scope.particularlist.length; i++) {
                    sum += parseFloat($scope.particularlist[i].amount);
                }
                return sum;
            }
        }

        $scope.remove = function(index){
            $scope.particularlist.splice(index,1);
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
