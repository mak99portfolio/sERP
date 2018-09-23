@extends('layout')
@section('title', 'Packing List')
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
                        <h2>Packing List</h2>
                        <a href="{{route('packing-list.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> See Packing List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left input_mask">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Commercial Invoice No.</label>
                                        <select class="form-control input-sm" name="commercial_invoice_id" ng-model="commercial_invoice_id" ng-change="getci()">
                                            <option value="">--Select Commercial Invoice No--</option>
                                            @foreach($ci_list as $item)
                                            <option value="{{$item-> id}}">{{$item-> commercial_invoice_no}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('commercial_invoice_date','Commercial Invoice Date', null, ['class'=>'form-control input-sm', 'ng-model'=>'commercial_invoice_date','readonly'=>'readonly']) }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('lc_no','LC No', null, ['class'=>'form-control input-sm', 'ng-model'=>'lc_no','readonly'=>'readonly']) }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('letter_of_credit_date','LC Date', null, ['class'=>'form-control input-sm', 'ng-model'=>'letter_of_credit_date','readonly'=>'readonly']) }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('pi_no','PI No', null, ['class'=>'form-control input-sm', 'ng-model'=>'pi_no','readonly'=>'readonly']) }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('pi_date','PI Date', null, ['class'=>'form-control input-sm', 'ng-model'=>'pi_date','readonly'=>'readonly']) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default m-t-15">
                                        <div class="panel-heading">Benefeciary Bank Info</div>
                                      <div class="panel-body">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('beneficiary_ac_no','Account No', null, ['class'=>'form-control input-sm', 'ng-model'=>'beneficiary_ac_no','readonly'=>'readonly']) }}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('beneficiary_ac_name','Account Name', null, ['class'=>'form-control input-sm', 'ng-model'=>'beneficiary_ac_name','readonly'=>'readonly']) }}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('beneficiary_bank_name','Bank Name', null, ['class'=>'form-control input-sm', 'ng-model'=>'beneficiary_bank_name','readonly'=>'readonly']) }}
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('beneficiary_branch_name','Bank Branch Name',null,['class'=>'form-control input-sm', 'ng-model'=>'beneficiary_branch_name','readonly'=>'readonly']) }}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('bill_no','Bl No', null, ['class'=>'form-control input-sm','readonly'=>'readonly']) }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('bill_date','Bl Date', null, ['class'=>'form-control input-sm','readonly'=>'readonly']) }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('vessel_no','Vessel No / Flight No', null, ['class'=>'form-control input-sm','readonly'=>'readonly']) }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('container_no','Container No', null, ['class'=>'form-control input-sm','readonly'=>'readonly']) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <fieldset class="m-t-20">
                                        <legend>Table of Terms and Conditions:</legend>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">    
                                                {{ BootForm::select('port_of_loading_port_id', 'Port of Loading', $port_list, null, ['class'=>'form-control input-sm']) }}   
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">    
                                                {{ BootForm::select('port_of_discharge_port_id', 'Port of Discharge', $port_list, null, ['class'=>'form-control input-sm']) }}   
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">    
                                                {{ BootForm::select('destination_country_id', 'Country of Final Destination', $country_list, null, ['class'=>'form-control input-sm']) }}   
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">    
                                                {{ BootForm::select('destination_city_id', 'Final Destination', $city_list, null, ['class'=>'form-control input-sm']) }}   
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">    
                                                {{ BootForm::select('country_goods_country_id', 'Country of Origin of Goods', $country_list, null, ['class'=>'form-control input-sm']) }}   
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">    
                                                {{ BootForm::select('country_goods_country_id', 'Country of Origin of Goods', $country_list, null, ['class'=>'form-control input-sm']) }}   
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">    
                                                {{ BootForm::select('country_goods_country_id', 'Country of Origin of Goods', $country_list, null, ['class'=>'form-control input-sm']) }}   
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">    
                                                {{ BootForm::text('customer_code','Customer Code', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Notes</label>
                                        <textarea name="notes" class="form-control" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th colspan="5">Packing List table</th>
                                                </tr>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Product Name</th>
                                                    <th>Qnantity</th>
                                                    <th>Unit Weight</th>
                                                    <th>Total Weight</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>01</th>
                                                    <td>sas</td>
                                                    <td>50</td>
                                                    <td>80</td>
                                                    <td>
                                                        <input type="text" name="amount" class="form-control input-sm">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-right">Net Total =</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-right">Gross Total =</td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <a href="#" class="btn btn-success btn-sm">Submit</a>
                                        <a href="{{route('packing-list.index')}}" class="btn btn-default btn-sm">Cancel</a>
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