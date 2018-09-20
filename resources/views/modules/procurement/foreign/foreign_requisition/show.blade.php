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
                                            <td scope="row"><stong>Requisition No :</stong>PR-2018-09-4727</td>
                                            <td><strong>Requisition Title :</strong> req-1</td>
                                        </tr>
                                        <tr>
                                            <td scope="row"><strong>Requisition Type :</strong> Sellable Item</td>
                                            <td><strong>Requisition Purpose :</strong> For Sell</td>
                                        </tr>
                                        <tr>
                                            <td scope="row"><strong>Requisition Priority :</strong> High</td>
                                            <td><strong>Department :</strong> ADMIN</td>
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
                                        <tr>
                                            <td>1</td>
                                            <td>40119901</td>
                                            <td>10.00R20 SLM PLUS R16</td>
                                            <td>50</td>
                                            <td>PCS</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>4011990010</td>
                                            <td>10.00-20 M77 N16</td>
                                            <td>100</td>
                                            <td>PCS</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Total</td>
                                            <td>150</td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col">Date Issued : 2018-09-06</th>
                                            <th scope="col">Date expected : 2018-09-06</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Warehouse :</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Notes :</td>
                                            <td></td>
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