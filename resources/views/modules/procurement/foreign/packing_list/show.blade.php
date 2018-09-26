@extends('layout')
@section('title', 'Packing List Details')
@section('content')
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
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Packing List Details</h2>
                        <div class="btn-group pull-right">
                            <button class="btn btn-sm btn-info print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                            <a href="{{route('packing-list.index')}}" class="btn btn-sm btn-success btn-addon"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Packing List</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive DivIdToPrint">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Commercial Invoice No:</strong> {{$packingList->commercial_invoice->commercial_invoice_no}}</td>
                                        <td><strong>Date:</strong>  {{$packingList->commercial_invoice->date}}</td>
                                    </tr>
                                    <tr>
   
                                        <td><strong>LC No:</strong> {{$packingList->commercial_invoice->LetterOfCredit->letter_of_credit_no}}</td>
                                        <td><strong>LC Date:</strong>  {{$packingList->commercial_invoice->LetterOfCredit->letter_of_credit_date}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Beneficiary Bank info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>A/C No :</strong> {{$packingList->commercial_invoice->LetterOfCredit->beneficiary_ac_no}}</td>
                                        <td><strong>A/C Name :</strong> {{$packingList->commercial_invoice->LetterOfCredit->beneficiary_ac_name}}</td>
                                        <td><strong>Branch Name :</strong> {{$packingList->commercial_invoice->LetterOfCredit->beneficiary_branch_name}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Bank Name:</strong> {{$packingList->commercial_invoice->LetterOfCredit->beneficiary_bank_name}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Bl No:</strong> {{$packingList->commercial_invoice->bl_no}}</td>
                                        <td><strong>Bl Date:</strong> {{$packingList->commercial_invoice->bl_date}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Vessel No / Flight No:</strong> {{$packingList->commercial_invoice->vessel_no}}</td>
                                        <td><strong>Container No:</strong> {{$packingList->commercial_invoice->container_no}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Table of Terms and Conditions:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Port of Loading:</strong> {{$packingList->commercial_invoice->loading_port->name}}</td>
                                        <td><strong>Port of Discharge:</strong> {{$packingList->commercial_invoice->discharge_port->name}}</td>
                                        <td><strong>Country of Final Destination:</strong> {{$packingList->commercial_invoice->destination_country->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Final Destination:</strong> {{$packingList->commercial_invoice->city->name}}</td>
                                        <td><strong>Country of Origin of Goods:</strong> {{$packingList->commercial_invoice->country_goods->name}}</td>
                                        <td><strong>Exporter:</strong>{{$packingList->commercial_invoice->LetterOfCredit->vendor->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Currency:</strong> {{$packingList->currency}}</td>
                                        <td><strong></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Notes:</strong>  {{$packingList->notes}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="5">Packing List table:</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Per Unit Weight	</th>
                                        <th>Total Weight</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @php
                                        $sub_total_weight = 0;
                                    
                                    @endphp
                                @foreach($packingList->items as $key=>$item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->product->name}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->per_unit_weight}}</td>
                                        <td>{{($item->quantity * $item->per_unit_weight)}}</td>
                                     
                                    </tr>
                                    @php
                                            $sub_total_weight += ($item->quantity * $item->per_unit_weight);
                                        
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="4" class="text-right">Net Total =</td>
                                        <td>{{$sub_total_weight}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right">Gross Total =</td>
                                        <td>{{$packingList->gross_total}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--end table-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection