@extends('layout')
@section('title', 'Purchase order')
@section('content')

<!-- page content -->
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
                        <h2>Local Purchase Order</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                    
                             <form class="form-horizontal form-label-left" action="{{route('local-purchase-order.store')}}" method="POST">
                        @csrf
                            <fieldset>
                                <legend>Vendor Information:</legend>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::select('vendor_id', 'Select Vendor', $vendor_list, null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">    
                                        {{ BootForm::select('vendor_selection_criteria', 'Select Vendor Selection Criteria', ['Agreement' => 'Agreement', 'Quotation' => 'Quotation', 'Record' => 'Record', 'Others' => 'Others'], null, ['class'=>'form-control input-sm']) }}   
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::text('reference_no','Reference No', null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        {{ BootForm::textarea('additional_information','Additional Information',null,['class'=>'form-control input-sm','rows'=>'2']) }}
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        {{ BootForm::textarea('address','Address',null,['class'=>'form-control input-sm','rows'=>'2']) }}
                                    </div>
                                </div>
                            </fieldset>

                            <!---------- genaral po info-------->
                            <fieldset class="m-t-15">
                                <legend>Genaral PO Information:</legend>
                                <div class="row"> 
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::text('purchase_oder_no','Purchase Oder No', null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">   
                                        {{ BootForm::text('purchase_oder_date','Purchase Oder Date', null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::select('inco_terms', 'Select Inco-Terms', ['FOB' => 'FOB', 'FCA' => 'FCA', 'EXW' => 'EXW', 'FAS' => 'FAS', 'CFR' => 'CFR', 'CIF' => 'CIF', 'DDU' => 'DDU', 'DDP' => 'DDP', 'CPT' => 'CPT'], null, ['class'=>'form-control input-sm']) }}        
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::text('inco_term_info','Inco-Term Info', null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::select('procurement_type', 'Select Procurement Type', ['Local' => 'Local'], null, ['class'=>'form-control input-sm']) }}        
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::select('purchase_order_type', 'Select Purchase Order Type', ['Raw Metarials Purchase' => 'Raw Metarials Purchase'], null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::text('status','Status', null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::select('shipping_method', 'Select Shipping Method', ['Air' => 'Air', 'Sea' => 'Sea','Ground' => 'Ground'], null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::select('payment_method', 'Select Payment Method', ['Cash' => 'Cash', 'Cheque' => 'Cheque', 'LC' => 'LC'], null, ['class'=>'form-control input-sm']) }}
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        {{ BootForm::textarea('remarks','Remarks',null,['class'=>'form-control input-sm','rows'=>'2']) }}
                                    </div>
                                </div>
                            </fieldset>
                            <!---------- genaral po info end-------->
                            <!---------- Ship to info-------->
                            <fieldset class="m-t-15">
                                <legend>Ship To Information:</legend>
                                <div class="row"> 
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="flat" checked name="ship_to_address"> MAGNUM Enterprise Ltd.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-6 col-sm-6 col-xs-12">
                                        <div class="col-md-3 col-sm-4">
                                            <div class="radio pull-right">
                                                <label>
                                                    <input type="radio" class="flat" name="ship_to_address"> Other Ship to Address
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-sm-8">
                                            <input class="form-control input-sm" type="text" >
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <!---------- Ship to info end-------->
                            <!---------- PR info-------->
                            <fieldset class="m-t-15">
                                <legend>PR Information:</legend>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                       
                                        
                                        
                                        <label>Purchase Requisition No</label>
                                        <div class="input-group">
                                            <input type="text" id="purchase_requisition_no" class="form-control" placeholder="Search">
                                             <input type="hidden" name="" value="<?php echo csrf_token() ?>" id="t">
                                            <div class="input-group-btn">
                                                <span class="btn btn-default" onclick="abc()">Add</span>
                                            </div>
                                        </div>
                                        <div id="msg">
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th>SL NO</th>
                                                        <th>Purchase Requisition No</th>
                                                        <th>Date</th>
                                                        <th>Purchase Requisition Name</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>01</td>
                                                        <td>123</td>
                                                        <td>12/03/2018</td>
                                                        <td>123</td>
                                                        <td  class="text-center">
                                                            <a href="#" class="btn btn-default btn-xs">Edit</a>
                                                            <button type="button" class="btn btn-xs btn-default"><i class="fa fa-times"></i></button>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end table-->
                                    </div>
                                </div>
                            </fieldset>
                            <!----------PR info end-------->
                            <!----------PR Product Details-------->

                            <!----------PR Product Details end-------->
                            <!----------PO Product Details-------->
                            <fieldset class="m-t-15">
                                <legend>PO Product Details:</legend>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th>SL NO</th>
                                                <th>Item Code</th>
                                                <th>Item Description</th>
                                                <th>Qty</th>
                                                <th>MOU</th>
                                                <th>Price</th>
                                                <th>Sub Total</th>
                                                <th>D.Rt</th>
                                                <th>Total Disc</th>
                                                <th>VAT Rt(%)</th>
                                                <th>VAT Amt</th>
                                                <th>Total (Net)</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>123</td>
                                                <td>2018</td>
                                                <td>123</td>
                                                <td>123</td>
                                                <td><input class="form-control input-sm" value="345" type="text"></td>
                                                <td>123</td>
                                                <td><input class="form-control input-sm" value="345" type="text"></td>
                                                <td><input class="form-control input-sm" value="345" type="text"></td>
                                                <td><input class="form-control input-sm" value="345" type="text"></td>
                                                <td>123</td>
                                                <td>123</td>
                                                <td  class="text-center">
                                                    <button type="button" class="btn btn-xs btn-default"><i class="fa fa-times"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="6">Total</td>
                                                <td>9123</td>
                                                <td></td>
                                                <td><input class="form-control input-sm" value="345" type="text"></td>
                                                <td>343</td>
                                                <td><input class="form-control input-sm" value="345" type="text"></td>
                                                <td>245.30</td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!--end table-->
                            </fieldset>
                            <!----------PO Product Details end-------->
                            <!----------Payment Terms-------->
                            <fieldset class="m-t-15">
                                <legend>Payment Terms:</legend>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <label>Payment Type</label>
                                        <div class="form-group">
                                            <select class="form-control input-sm">
                                                <option value="" disabled selected> Select type</option>
                                                <option>Fixed</option>
                                                <option>Percentage</option>
                                              
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                             <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Description</th>
                                                        <th colspan="2">% or Fixed Amount</th>
                                                    </tr>
                                                    <tr>
                                                        <th><input class="form-control input-sm" type="text" value="20/02/2018"></th>
                                                        <th><input class="form-control input-sm" type="text"></th>
                                                        <th><input class="form-control input-sm" type="text"></th>
                                                        <th  class="text-center"><button type="button" class="btn btn-xs btn-default">Add</button></th>
                                                    </tr>
                                       
                                                   
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Description</th>
                                                        <th colspan="2">% or Fixed Amount</th>
                                                    </tr>  
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>12/03/2018</td>
                                                        <td>Description</td>
                                                        <td>12%</td>
                                                        <td  class="text-center">
                                                            <a href="#" class="btn btn-default btn-xs">Edit</a>
                                                            <button type="button" class="btn btn-xs btn-default"><i class="fa fa-times"></i></button>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end table-->
                                    </div>
                                </div>
                            </fieldset>
                            <!--------Payment Terms end-------->
                            <!----------Terms and Condition-------->
                            <fieldset class="m-t-15">
                                <legend>Terms and Condition:</legend>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Terms and Condition Type</label>
                                            <select class="form-control input-sm" id="terms_and_condition">
                                                <option value="" disabled selected> Select..</option>
                                                <option value="Delivery Terms">Delivery Terms</option>
                                                <option value="Payment Condition">Payment Condition</option>
                                                <option value="Warranty Terms">Warranty Terms</option>
                                                <option value="Security Terms">Security Terms</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        {{ BootForm::textarea('description','Description',null,['id'=>'description','class'=>'form-control input-sm','rows'=>'1']) }}
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="button" onclick="terms_and_condition_select()" class="btn btn-md btn-info">Add</button>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive m-t-20">
                                            <table id="mytable1" class="table table-bordered table-hover">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Terms and Condition</th>
                                                        <th>Description</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="mytable1">
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end table-->
                                    </div>
                                </div>
                            </fieldset>
                            <!---------Terms and Condition end-------->
                            <button class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection
@section('script')
<script>

    function terms_and_condition_select() {
        var terms_and_condition = $('#terms_and_condition').val();
        var description = $('#description').val();
     //  alert(description);
         $("#mytable1").append("<tr><td>"+01+"</td><td>"+terms_and_condition+"</td><td>"+description+"</td><td class='text-center'>"+' <a href="#" class="btn btn-default btn-xs">Edit</a><button type="button"  class="btn btn-xs btn-default"><i class="fa fa-times"></i></button>'+"</td></tr>");
        
    }
    function abc() {
        var purchase_requisition_no = $('#purchase_requisition_no').val();
       // alert(purchase_requisition_no);
          $('div#msg').html(purchase_requisition_no);
           $.ajax({
            type: 'POST',
            url: '{{url("/getmsg")}}',
            data: {_token: $('#t').val(), purchase_requisition_no: purchase_requisition_no}
        }).done(function (data) {
            console.log(data.purchase_requisition_no);
              $('div#msg').val(data.purchase_requisition_no);
           
        });

    }



</script>
@endsection