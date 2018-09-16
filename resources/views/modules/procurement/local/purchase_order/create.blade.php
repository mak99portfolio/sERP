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
                        <form class="form-horizontal form-label-left">
                        <fieldset>
    <legend>Vendor Information:</legend>
                            <div class="row"> 
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="row"> 
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Vendor </label>
                                                <select class="form-control input-sm">
                                                    <option value="" disabled selected> Select Vendor</option>
                                                    <option>Active</option>
                                                    <option>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                            <div class="form-group">

                                                {{ BootForm::textarea('additional_information','Additional Information',null,['class'=>'form-control input-sm','rows'=>'2']) }}
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="row"> 
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Vendor Selection Criteria</label>
                                                <select class="form-control input-sm">
                                                    <option value="" disabled selected> Select Vendor Selection Criteria</option>
                                                    <option>Agrement</option>
                                                    <option>Record</option>
                                                    <option>Quatation</option>
                                                    <option>Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                {{ BootForm::textarea('address','Address',null,['class'=>'form-control input-sm','rows'=>'2']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="row"> 
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                            <div class="form-group">
                                                <label>Reference No.</label>
                                                <input class="form-control input-sm" type="text" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </fieldset>
    
                            <!---------- genaral po info-------->
                            <fieldset>
    <legend>Genaral PO Information
:</legend>
                              <div class="row"> 
                            
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="row"> 
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Purchase Oder No</label>
                                                <input class="form-control input-sm" type="text" >
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Inco-Terms</label>
                                                <select class="form-control input-sm">
                                                    <option value="" disabled selected> Select Inco-Terms</option>
                                                    <option>Agrement</option>
                                                    <option>Record</option>
                                                    <option>Quatation</option>
                                                    <option>Others</option>
                                                </select>
                                            </div>
                                        </div>
                                       
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                            <div class="form-group">

                                                {{ BootForm::textarea('remark','Remarks',null,['class'=>'form-control input-sm','rows'=>'2']) }}
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="row"> 
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Purchase Oder Date</label>
                                                <input class="form-control input-sm" type="text" >
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Inco-Term Info</label>
                                                <input class="form-control input-sm" type="text" >
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Procurement Type</label>
                                                <select class="form-control input-sm">
                                                    <option value="" disabled selected> Select Procurement Type</option>
                                                    <option>Agrement</option>
                                                    <option>Record</option>
                                                    <option>Quatation</option>
                                                    <option>Others</option>
                                                </select>
                                            </div>
                                        </div>
                                      
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Purchase Order Type</label>
                                                <select class="form-control input-sm">
                                                    <option value="" disabled selected> Select Purchase Order Type</option>
                                                    <option>Agrement</option>
                                                    <option>Record</option>
                                                    <option>Quatation</option>
                                                    <option>Others</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="row"> 
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                            <div class="form-group">
                                                <label>Status</label>
                                                <input class="form-control input-sm" type="text" >
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Shipping Method</label>
                                                <select class="form-control input-sm">
                                                    <option value="" disabled selected> Select Shipping Method</option>
                                                    <option>Agrement</option>
                                                    <option>Record</option>
                                                    <option>Quatation</option>
                                                    <option>Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Payment Method</label>
                                                <select class="form-control input-sm">
                                                    <option value="" disabled selected> Select Payment Method</option>
                                                    <option>Agrement</option>
                                                    <option>Record</option>
                                                    <option>Quatation</option>
                                                    <option>Others</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </fieldset>
                            <!---------- genaral po info end-------->
                             <!---------- Ship to info-------->
                            <fieldset>
                            
    <legend>Ship To Information
:</legend>
<div class="row"> 
                            
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="row"> 
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Purchase Oder No</label>
                                            <input class="form-control input-sm" type="text" >
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
<fieldset>

                             <!---------- Ship to info end-------->
                               <!---------- Ship to info-------->
                            <fieldset>
                            
                            <legend>Ship To Information
                        :</legend>
                            <div class="row"> 
                                
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="row"> 
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Purchase Oder No</label>
                                                <input class="form-control input-sm" type="text" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <fieldset>
                        
                                                     <!---------- Ship to info end-------->
                            

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection