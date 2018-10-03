@extends('layout')
@section('title', 'Product Costing')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" ng-app="myApp">
                    <div class="x_title">
                        <h2>Product Costing</h2>
                        <a class="btn btn-primary btn-sm pull-right" href="{{route('product-costing.index')}}"><i class="fa fa-list-ul"></i> List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" ng-controller="myCtrl">
                        <br />
                        <form action="{{ route('product-costing.store') }}" method="POST">
                            <input type="hidden" name="bill_of_lading_id" value="{{ $bill_of_lading->id }}">
                            @csrf
                            <table class="table border_1 m-b-20">
                                <tbody>
                                    <tr>
                                        <td><strong>Consignee</strong></td>
                                        <td><strong>:</strong></td>
                                        <td colspan="2">{{ $bill_of_lading->consignee }}</td>
                                        <td><strong>Consignment No</strong></td>
                                        <td><strong>:</strong></td>
                                        <td>47</td>
                                        <td><strong>Report Date</strong></td>
                                        <td><strong>:</td>
                                        <td>18/09/2018</td>
                                    </tr>
                                    <tr>
                                        <td><strong>LC/No & Date</strong></td>
                                        <td><strong>:</strong></td>
                                        <td>{{ $bill_of_lading->letter_of_credit->letter_of_credit_no }}</td>
                                        <td>{{ $bill_of_lading->letter_of_credit->letter_of_credit_date }}</td>
                                        <td><strong>LC value</strong></td>
                                        <td><strong>:</strong></td>
                                        <td colspan="4">USD {{ $bill_of_lading->letter_of_credit->amount() }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Invoice No</strong></td>
                                        <td><strong>:</strong></td>
                                        <td>20183423</td>
                                        <td>18/09/2018</td>
                                        <td><strong>Invoice Value</strong></td>
                                        <td><strong>:</strong></td>
                                        <td>USD 42317</td>
                                        <td><strong>C & F Agent</strong></td>
                                        <td><strong>:</strong></td>
                                        <td>125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>B/L No & Date</strong></td>
                                        <td><strong>:</strong></td>
                                        <td>203423</td>
                                        <td>18/09/2018</td>
                                        <td><strong>B/E No & Date</strong></td>
                                        <td><strong>:</strong></td>
                                        <td colspan="3">42317</td>
                                        <td>18/09/2018</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Container No</strong></td>
                                        <td><strong>:</strong></td>
                                        <td colspan="2">203423</td>
                                        <td><strong>Arival Date</strong></td>
                                        <td><strong>:</strong></td>
                                        <td>18/09/2018</td>
                                        <td><strong>Delivery Date</strong></td>
                                        <td><strong>:</strong></td>
                                        <td>18/09/2018</td>
                                    </tr>
                                    <tr>
                                        <td><strong>CRF Value</strong></td>
                                        <td><strong>:</strong></td>
                                        <td colspan="2">USD 2343</td>
                                        <td><strong>Rate</strong></td>
                                        <td><strong>:</strong></td>
                                        <td>+ 0 %</td>
                                        <td><strong>ASS Value Taka</strong></td>
                                        <td><strong>:</strong></td>
                                        <td>125</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th><strong>Date</strong></th>
                                                <th><strong>Description</strong></th>
                                                <th class="text-right"><strong>Amount (Tk)</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>12/07/2018</td>
                                                <td>
                                                    <strong>(Insurance(Partial)</strong><br>
                                                    <span class="small">NGIC/MKB/07/2018</span>
                                                </td>
                                                <td class="text-right">
                                                    <input type="text" class="form-control text-right" ng-init="insurance = {{ $bill_of_lading->insurance_amount() }}" readonly ng-model="insurance">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>12/07/2018</td>
                                                <td>
                                                    <strong>LC Charge(Partical)</strong><br>
                                                    <span class="small">(Tk 144,126 / USD 324*USD 234)</span>
                                                </td>
                                                <td class="text-right">
                                                        <input type="text" class="form-control text-right" ng-init="lc_charge = {{ $bill_of_lading->lc_charge() }}" readonly ng-model="lc_charge">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td rowspan="3">12/07/2018</td>
                                                <td>
                                                    <strong>D / Retirement(Including L /C Margin)</strong><br>
                                                    <span class="small">(USD 324 @23.04)</span>
                                                </td>
                                                <td>
                                                    <input type="number" min="0" class="form-control text-right" ng-model="retirement" name="retirement">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Remittance</td>
                                                <td><input type="number" min="0" class="form-control text-right" ng-model="remittance" name="remittance"></td>
                                            </tr>
                                            <tr>
                                                <td>D/H Charge</td>
                                                <td><input type="number" min="0" class="form-control text-right" ng-model="dh_charge" name="dh_charge"></td></tr>
                                            <tr>
                                                <td>12/07/2018</td>
                                                <td colspan="2"><strong><u>C & F Expense</u></strong></td>
                                                <input type="hidden" ng-init="total_cnf = {{ $bill_of_lading->cnf->amount() }}" ng-model="total_cnf">
                                            </tr>
                                            @foreach($bill_of_lading->cnf->consignment_particular_cnf as $item)
                                            <tr>
                                                @if($loop->first)
                                                <td rowspan="{{ $loop->count }}"></td>
                                                @endif
                                                <td><strong>{{ $item->consignment_particular->name }}</strong></td>
                                                <td class="text-right">{{ $item->amount }}</td>
                                            </tr>
                                            @endforeach

                                            <tr>
                                                <td>12/07/2018</td>
                                                <td>
                                                    <strong>Transport Charge(PARTIAL)</strong><br>
                                                    <span class="small">14412/6</span>
                                                </td>
                                                <td><input type="number" min="0" class="form-control text-right" ng-model="transport_charge" name="transport_charge"></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2" class="font-20"><strong>Total Landing Cost(Taka):</strong></td>
                                                <td class="text-right"><% total_landing_cost = insurance+lc_charge+retirement+remittance+dh_charge+total_cnf+transport_charge | number:2 %></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="5">Cost of Sales (Ex Ware House)</th>
                                            </tr>
                                            <tr>
                                                <th>Costing Item</th>
                                                <th class="text-right">Qty</th>
                                                <th>Unit</th>
                                                <th class="text-right">U.Price USD</th>
                                                <th class="text-right">U.Price TK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bill_of_lading->items as $item)
                                                
                                            <tr>
                                                <td>{{ $item->product->name }}</td>
                                                <td class="text-right">{{ $item->quantity }}</td>
                                                <td>{{ $item->product->unit_of_measurement->name }}</td>
                                                <td class="text-right"><% unit_price_in_usd[$index] = {{ $item->unit_price * (1+ $bill_of_lading->per_usd_freight()) }} | number:2 %></td>
                                                <td class="text-right"><% unit_price_in_usd[$index]*cost_per_unit | number:2 %></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td><strong>Total Qty</strong></td>
                                                <td class="text-right">{{ $bill_of_lading->items->sum('quantity') }}</td>
                                                <td colspan="3"></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Invoice Value</td>
                                        <td>USD <% invoice_amount = {{ $bill_of_lading->amount() }} %></td>
                                    </tr>
                                    <tr>
                                        <td>Cost Per Unit (Tk/USD)</td>
                                        <td>BDT <% cost_per_unit = total_landing_cost/invoice_amount | number:2 %></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="text-center"><strong>IN WORD:</strong> <% numberToWord(total_landing_cost, 'Tk', 'Paisa') %> </p>
                            <hr>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-sm">Save</button>
                                <a href="{{route('product-costing.index')}}" class="btn btn-default btn-sm">Cancel</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
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
        $scope.quantity = [];
        $scope.sum = function($arr){
            var sum = 0;
            for(i=0; i<$arr.length; i++){
                sum += $arr[i];
            }
            return sum;
        }
        $scope.numberToWord = function(n, unit_whole, unit_fraction) {
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
            str += (n[5] != 0) ? ((str != '') ? ' ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) : '';
            return str;
        }
        function inFraction (num) {
            var a = ['zero ','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine s'];
            var str = '';
            for(i=0; i<num.length; i++){
                str += a[num[i]];
            }
            return str;
        }
    });

</script>

@endsection
