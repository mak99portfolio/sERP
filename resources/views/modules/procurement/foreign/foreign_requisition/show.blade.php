@extends('layout')
@section('title', 'Foreign Requisition')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Procurement</h3>
            </div>
        </div>
        <div class="clearfix"></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <img src="{{asset('/')}}assets/build/images/logo1.png" alt="" height="40px">
                            <p class="m-t-5">531, Dhaur (Kamarpara), Turag, Dhaka-1230</p>
                            <p>Tel : (02)-8981941, Fax: +88-02-89819442, Mob: +88-01823-777992</p>
                            <p>E-mail: info@magnumenterprise.net, Web: www.magnumenterprise.net</p>
                        </div>
                        <div class="panel-body">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col" colspan="2">Requisition</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                        <td scope="row"><strong>Requisition No :</strong>{{$foreignRequisition->requisition_no}}</td>
                                            <td><strong>Requisition Title :</strong>{{$foreignRequisition->requisition_title}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Requisition Purpose :</strong> {{$foreignRequisition->purpose->name}}</td>
                                            <td scope="row"><strong></strong> </td>
                                        </tr>
                                        <tr>
                                            <td scope="row"><strong>Requisition Priority :</strong> {{$foreignRequisition->priority->name}}</td>
                                            <td><strong></strong></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="2">Reference No : req-11</th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col" colspan="5">Requisition</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th>SL NO</th>
                                            <th>H.S. CODE</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>UOM</th>
                                        </tr>
                                        @foreach($foreignRequisition->items as $key=>$item)
                                        <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->product->hs_code}}</td>
                                        <td>{{$item->product->name}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->product->unit_of_measurement->name}}</td>
                                        </tr> 
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col">Date Issued : {{$foreignRequisition->issued_date}}</th>
                                            <th scope="col">Date expected :{{$foreignRequisition->date_expected}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Notes :</td>
                                            <td>{{$foreignRequisition->note}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <table width="100%" class="m-t-25">
                                    <thead >
                                    <tr >
                                        <th class="text-center"><span style="border-top: 2px solid #000">Prepared By</span></th>
                                        <th class="text-center"><span style="border-top: 2px solid #000">Checked By</span></th>
                                        <th class="text-center"><span style="border-top: 2px solid #000">Approved By</span></th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                </div>

            </div>

    </div>
</div>
@endsection