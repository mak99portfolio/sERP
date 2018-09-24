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
                                    {{ BootForm::text('consignee','Consignee', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('bill_no','Bill No', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('bill_date','Bill Date', null, ['class'=>'form-control input-sm datepicker']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>LC No.</label>
                                        <select class="form-control input-sm" name="letter_of_credit_id" ng-model="letter_of_credit_id" ng-change="getLc()" required>
                                            <option value="">--Select LC No--</option>
                                            @foreach($lc_list as $item)
                                            <option value="{{$item->id}}">{{$item->letter_of_credit_no}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('letter_of_credit_date','LC Opening Date', null, ['class'=>'form-control input-sm', 'ng-model'=>'letter_of_credit_date', 'readonly']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::number('letter_of_credit_value','LC Value (USD)', null, ['class'=>'form-control input-sm', 'ng-model'=>'letter_of_credit_value', 'readonly']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Commercial invoice No</label>
                                        <select class="form-control input-sm" name="commercial_invoice_id" ng-model="commercial_invoice_id" ng-change="getCi()" required>
                                            <option value="">--Select Commercial Invoice No--</option>
                                            @foreach($commercial_invoice_list as $item)
                                            <option value="{{$item->id}}">{{$item->commercial_invoice_no}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text(null,'Commercial Invoice Date', null, ['class'=>'form-control input-sm', 'ng-model'=>'commercial_invoice_date', 'readonly']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text(null,'B/L No', null, ['class'=>'form-control input-sm', 'ng-model'=>'bl_no', 'readonly']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text(null,'B/L Date', null, ['class'=>'form-control input-sm', 'ng-model'=>'bl_date', 'readonly']) }}
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
                                    {{ BootForm::number('usd_amount','USD Amount', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::number('exchange_rate','Exchange Rate', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::number('bdt_amount','BDT Amount', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('cnf_agent_id', 'CNF Agent', $vendor_list, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text(null, 'Exporter', null, ['class'=>'form-control input-sm' , 'ng-model'=>'vendor_name', 'readonly']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('duty_payment_date','Duty Payment Date', null, ['class'=>'form-control input-sm datepicker']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text(null,'Container No', null, ['class'=>'form-control input-sm', 'ng-model'=>'container_no', 'readonly']) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Particulars of Consignments Table</div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Particulars of Consignments</label>
                                                        <select class="form-control input-sm" name="consignment_particular_id" ng-model="consignment_particular" required>
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
                                                            <td><% particular.name %> <input type="hidden" value="<% particular.id %>"></td>
                                                            <td><% particular.amount %><input type="hidden" value="<% particular.amount %>"></td>
                                                            <td class="text-center"><a href="" class="btn btn-danger btn-xs" ng-click="remove($index)"><i class="fa fa-trash"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-right" colspan="2">Voucher Tk</th>
                                                            <td>
                                                                <input type="number" class="form-control input-sm">
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
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Amount In Words</label>
                                        <input type="text" class="form-control input-sm" name="amount_in_word">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Notes</label>
                                        <textarea name="notes" class="form-control input-sm" id="" cols="30" rows="2"></textarea>
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

        $scope.getLc = function () {
            $scope.getLcDetails($scope.letter_of_credit_id);
        }

        $scope.getCi = function () {
            $scope.getCiDetails($scope.letter_of_credit_id);
        }

        $scope.getLcDetails = function(id){
            let url = "{{URL::to('get-lc')}}/" + id;
            $http.get(url).then(function(response) {
                $scope.letter_of_credit_date = response.data.letter_of_credit_date;
                $scope.letter_of_credit_value = parseInt(response.data.letter_of_credit_value);
                $scope.issue_ac_no = response.data.issue_ac_no;
                $scope.issue_ac_name = response.data.issue_ac_name;
                $scope.issue_bank_name = response.data.issue_bank_name;
                $scope.issue_branch_name = response.data.issue_branch_name;
                $scope.vendor_name = response.data.vendor_name;
            });
        }

        $scope.getCiDetails = function(id){
            let url = "{{URL::to('get-ci')}}/" + id;
            $http.get(url).then(function(response) {
                $scope.commercial_invoice_date = response.data.ci_date;
                $scope.bl_no = response.data.bl_no;
                $scope.bl_date = response.data.bl_date;
                $scope.container_no = response.data.container_no;
            });
        }
        $scope.particularlist = [];
        $scope.addParticular = function(){
            var particular = {};
            var item = JSON.parse($scope.consignment_particular);
            particular.name = item.name;
            particular.id = item.id;
            particular.amount = $scope.amount;
            $scope.particularlist.push(particular);
            console.log(item);
            console.log(numberToWord(563445.34, 'taka', 'paisa'));
        }
        $scope.remove = function(index){
            $scope.particularlist.splice(index,1);
        }
        
        function numberToWord(n, unit_whole, unit_fraction) {
            var nums = n.toString().split('.')
            var whole = inWhole(nums[0])
            if (nums.length == 2) {
                var fraction = inFraction(nums[1])
                return whole + unit_whole +' and ' + fraction +  unit_fraction;
            } else {
                return whole;
            }
        }
        function inWhole (num) {
            var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
            var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];
            if ((num = num.toString()).length > 9) return 'overflow';
            n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
            if (!n) return; var str = '';
            str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
            str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
            str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
            str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
            str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) : '';
            return str;
        }
        function inFraction (num) {
            var a = ['zero ','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine s'];
            var str = '';
            for(i=0; i<num.length; i++){
                str += +a[num[i]];
            }
            return str;
        }
        
    });
</script>
@endsection
