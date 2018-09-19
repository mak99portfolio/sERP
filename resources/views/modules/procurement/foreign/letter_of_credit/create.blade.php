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
        <div class="x_panel">
            <div class="x_title">
                <h2>LC Detail</h2>
                <a href="{{route('letter-of-credit.index')}}" class="mb-xs mt-xs mr-xs  btn btn-success btn-sm pull-right"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;LC Detail List</a>
              
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                 
                <form class="form-horizontal form-label-left" action="{{route('letter-of-credit.store')}}" method="POST">
                        @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('letter_of_credit_no','LC No.', null, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('letter_of_credit_date','LC Date', null, ['class'=>'form-control input-sm','id'=>'single_cal3']) }}
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('letter_of_credit_value','LC Value', null, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::select('vendor_id', 'Vendor', $vendor_list, null, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('letter_of_credit_expire_date','LC Expire Date', null, ['class'=>'form-control input-sm','id'=>'single_cal4']) }}
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::select('letter_of_credit_status', 'LC Status', [''=>'-- Select Shipment --','1'=>'Open','2'=>'Close'], null, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::text('letter_of_credit_shipment_date','LC Shipment Date', null, ['class'=>'form-control input-sm','id'=>'single_cal2']) }}
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::select('currency', 'Currency', [''=>'-- select currency --','1'=>'Doller'], null, ['class'=>'form-control input-sm']) }}
                        </div>
                    </div>
                    <div class="row m-t-20"> 
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Beneficiary Bank info</div>
                                    <div class="panel-body">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                    
                                                    {{ BootForm::text('beneficiary_ac_no','A/C No', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    {{ BootForm::text('beneficiary_ac_name','A/C Name', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    {{ BootForm::text('beneficiary_branch_name','Branch Name', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    {{ BootForm::text('beneficiary_bank_name','Bank Name', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Issue Bank info</div>
                                <div class="panel-body">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                {{ BootForm::text('issue_ac_no','A/C No ', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                {{ BootForm::text('issue_ac_name','A/C Name', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                {{ BootForm::text('issue_branch_name','Branch Name', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                {{ BootForm::text('issue_bank_name','Bank Name', null, ['class'=>'form-control input-sm']) }}
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
                                                <input type="text" class="form-control input-sm">
                                                <span class="input-group-btn">
                                                  <button class="btn btn-default btn-sm" type="button">Add</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL No.</th>
                                                <th>LCA No</th>
                                                <th>Update</th>
                                                <th class="text-right">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="row">1</td>
                                                <td>123547</td>
                                                <td><a href="" class="btn btn-info btn-xs">Update</a></td>
                                                <td class="text-right"><a href="" class="btn btn-danger  btn-xs">Delete</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('partial_shipment', 'Partial Shipment', [''=>'-- Select Shipment --','1'=>'Allow','2'=>'Not Allow'], null, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                {{ BootForm::select('transhipment_information', 'Transhipment Information', [''=>'-- Select Transhipment --','1'=>'Allow','2'=>'Not Allow'], null, ['class'=>'form-control input-sm']) }}
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading"><h4>LCA Information</h4></div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <label>LCA No</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control input-sm">
                                            <span class="input-group-btn">
                                              <button class="btn btn-default btn-sm" type="button">Add</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                 <div class="table-responsive">
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
                                                <td scope="row">1</td>
                                                <td>123547</td>
                                                <td class="text-right"><a href="#" class="btn btn-danger  btn-xs">Delete</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <fieldset class="m-t-20">
                        <legend>LC Table:</legend>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>SL NO</th>
                                        <th>H.S. CODE</th>
                                        <th>Product Name</th>
                                        <th>UOM</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Sub Total</th>
                                        <th>Discount</th>
                                        <th>D.Rate</th>
                                        <th>Vat(%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-right">123</td>
                                        <td class="text-center">123</td>
                                        <td>
                                            <img src="img/product.jpg" alt="product name" class="img-responsive">
                                        </td>
                                        <td>
                                            PCs
                                        </td>
                                        <td>
                                        <input class="form-control input-sm" type="number">
                                        </td>
                                        <td>
                                            123
                                        </td>
                                        <td>
                                            123999
                                        </td>
                                        <td >
                                            112
                                        </td>
                                        <td >
                                            13
                                        </td>
                                        <td >
                                            13
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot class="font-bold">
                                    <tr>
                                        <td colspan="6">Total</td>
                                        <td>324</td>
                                        <td></div>
                                        <td colspan="2"></td>
                                    </tr>
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