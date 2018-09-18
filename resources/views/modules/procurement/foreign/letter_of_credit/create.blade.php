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
                <h2> LC detail <small>Form</small></h2>
                <a href="{{route('letter-of-credit.index')}}" class="mb-xs mt-xs mr-xs  btn btn-success btn-sm pull-right"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; List</a>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                 
                {{-- <form class="form-horizontal form-label-left"> --}}
                   
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('letter_of_credit_no','LC No.', null, ['class'=>'form-control input-sm']) }}

                                    {{ BootForm::text('letter_of_credit_date','LC Date', null, ['class'=>'form-control input-sm','id'=>'single_cal3']) }}
                                    {{ BootForm::text('letter_of_credit_value','LC Value', null, ['class'=>'form-control input-sm']) }}

                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            {{ BootForm::select('vendor_id', 'Vendor', $vendor_list, null, ['class'=>'form-control input-sm']) }}
                            {{ BootForm::text('letter_of_credit_expire_date','LC Expire Date', null, ['class'=>'form-control input-sm','id'=>'single_cal4']) }}
                                    
                            {{ BootForm::select('letter_of_credit_status', 'LC Status', [''=>'-- Select Shipment --','1'=>'Open','2'=>'Close'], null, ['class'=>'form-control input-sm']) }}
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('letter_of_credit_shipment_date','LC Shipment Date', null, ['class'=>'form-control input-sm','id'=>'single_cal2']) }}

                                    {{ BootForm::select('currency', 'Currency', [''=>'-- select currency --','1'=>'Doller'], null, ['class'=>'form-control input-sm']) }}
                            </div>
                        
                    </div>


                    <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
<div class ="table-responsive">
<table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th>Beneficiary Bank info</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
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

                                    </td>
                                </tr>
                            </tbody>
                        </table>
</div>
               
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
<div class ="table-responsive">
<table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th>Issue Bank info</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
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

                                    </td>
                                </tr>
                            </tbody>
                        </table>
</div>
        

</div>
</div>
                    
                <div class="row m-t-15">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                     <div class="panel panel-default">
                        <div class="panel-heading"><h4>LCA Information</h4></div>
                            <div class="panel-body">
                            <!--Inline form-->

                    <form class="form-inline">
                  {{ BootForm::text('lac_no','LCA No.', null, ['class'=>'form-control input-sm']) }}
                  <button type="submit" class="btn btn-default">Add</button>
                </form>
<br>       
            <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>SL No.</th>
                          <th>LCA No</th>
                          <th>Update</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                         
                          <td>123547</td>
                          <td><button type="button" class="btn btn-info">Update</button></td>
                          <td><button type="button" class="btn Delete">Delete</button></td>
                        </tr>
                        
                      </tbody>
                    </table>
                        </div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {{ BootForm::select('partial_shipment', 'Partial Shipment', [''=>'-- Select Shipment --','1'=>'Allow','2'=>'Not Allow'], null, ['class'=>'form-control input-sm']) }}
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {{ BootForm::select('transhipment_information', 'Transhipment Information', [''=>'-- Select Transhipment --','1'=>'Allow','2'=>'Not Allow'], null, ['class'=>'form-control input-sm']) }}
                            </div>
                               
                                
                            </div>
                        </div>
                        
                       
                            </div>
                            <div class="row m-t-15">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                     <div class="panel panel-default">
                        <div class="panel-heading"><h4>PI Information</h4></div>
                            <div class="panel-body">
                            <!--Inline form-->

                    <form class="form-inline">
                  {{ BootForm::text('proforma_invoice_no','PI No.', null, ['class'=>'form-control input-sm']) }}
                  <button type="submit" class="btn btn-default">Add</button>
                </form>
<br>       
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
                          <th scope="row">1</th>
                         
                          <td>123547</td>
                         
                          <td><button type="button" class="btn Delete">Delete</button></td>
                        </tr>
                        
                      </tbody>
                    </table>
                        </div>
                        </div>
                        </div>
                    </div>

                  </div> 
                  <div class="form-group pull-in clearfix">
                                 <div class="col-sm-12">
                                    <label>LC Table</label>
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
                                                    
                                                    <td colspan="2"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="form-group">
                                    <button type="button" class="btn btn-info">Save</button>
                       </div>
                                </div>
                            </div> 

                </div>
                    
           </div>
       </div>
   </div>
</div>


{{-- Content end --}}
</div>
</div>
@endsection