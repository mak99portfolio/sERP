@extends('layout')
@section('title', 'Customer Profile')
@section('content')
 <!-- page content -->
 <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Customer Profile</h2>
                        <a href="{{ route('customer-profile.index') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> See Customer Profile</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="form-horizontal form-label-left input_mask">
                            <div class="row">
                                {{-- <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Customer Id *</label>
                                        <input type="text" name="customer_id" class="form-control input-sm" readonly>
                                    </div>
                                </div> --}}
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('customer_name','Customer Name *', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('customer_type', 'Customer Type *',$customer_type_list , null, ['class'=>'form-control input-sm select2', 'data-placeholder'=>'Select Customer Type', 'required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('status', 'Status *', [''=>'','Active' => 'Active','Inactive' => 'Inactive'], null, ['class'=>'form-control input-sm select2', 'data-placeholder'=>'Select Status', 'required']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('establishment_date','Establishment *', null, ['class'=>'form-control input-sm datepicker']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Customer Zone *</label>
                                        <select name="customer_zone" class="form-control input-sm select2">
                                            <option value="">Dhaka</option>
                                            <option value="">Rangpur</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('contact_number','Contact No *', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('fax','Fax', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('website','Website', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('email','Email', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('tin_number','TIN Number', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('trade_license_number','Trade License No *', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('trade_license_issue_date','Trade License Issue Date', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('certificate_of_incorporation','Certificate Of Incorporation', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('incorporation_date','Incorporation Date', null, ['class'=>'form-control input-sm datepicker']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('vat_number','Vat No', null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::textarea('address','Address *', null, ['class'=>'form-control input-sm','cols'=>"30" ,'rows'=>"1"]) }}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Type Of Business *</div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="type_of_business">LTD company
                                                    </label>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="type_of_business">Partnership
                                                    </label>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="type_of_business">Proprietorship
                                                    </label>
                                                </div>
                                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="type_of_business">Other
                                                    </label>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-sm">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Credit Information *</div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::text('credit_period','Credit Period', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::text('credit_limit','Credit Limit', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Providable Rate *</label>
                                        <select name="providable_rate" id="" class="form-control input-sm select2">
                                            <option value="trade-price">Trade-Price</option>
                                            <option value="mrp">MRP</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Bank Information *</div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::text('account_number','A/C no', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::text('account_name','A/C Name', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::text('bank','Bank', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::text('branch','Branch', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::text('swift_code','Swift Code', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::text('bank_address','Bank Address', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group text-center">
                                        <a href="" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Add Bank Information</a>
                                        <a href="" class="btn btn-default btn-sm"><i class="fa fa-minus"></i> Remove Bank Information</a>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Contact Person Information</div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::text('contact_name','Contact Name *', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::text('designation','Designation', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::text('contact_number','Contact No *', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::text('email','Email', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::text('job_role','Job Role', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::text('tell_number','Tell No', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    {{ BootForm::text('cell_number','Cell No *', null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group text-center">
                                        <a href="" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Add Person</a>
                                        <a href="" class="btn btn-default btn-sm"><i class="fa fa-minus"></i> Remove Person</a>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <fieldset>
                                        <legend>Enclosure Information </legend>
                                    </fieldset>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th colspan="3">Enclosure List *</th>
                                        </tr>
                                        <tr>
                                            <th>SL No</th>
                                            <th>Enclosure Name</th>
                                            <th>Attachment</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">Enclosure 1</label>
                                            </td>
                                            <td>
                                                <input type="file" name="img">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>
                                                <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                                <label class="form-check-label" for="exampleCheck2">Enclosure 2</label>
                                            </td>
                                            <td>
                                                <input type="file" name="img">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Notes</label>
                                        <textarea name="notes" cols="30" rows="2" class="form-control input-sm"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <a href="" class="btn btn-success btn-sm">Save</a>
                                        <a href="" class="btn btn-default btn-sm">Cancel</a>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
