@extends('layout')
@section('title', 'Vendor')
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
                        <h2>Vendor</h2>
                        <a href="{{route('vendor.index')}}" class="btn btn-sm btn-default btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> See Vendor Lists</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" action="{{route('vendor.store')}}" method="POST">
                            @csrf


                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            {{ BootForm::text('vendor_id','Vendor Id', null, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            {{ BootForm::select('status_id', 'Status', [1=>'Active', 0=>'Inactive'], null, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            {{ BootForm::text('name','Vendor Name', null, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            {{ BootForm::text('establishment_date','Establishment Date', null, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            {{ BootForm::select('country_id', 'Country', $country_list, null, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            {{ BootForm::select('vendor_category_id', 'Vendor Category', $vendor_category_list, null, ['class'=>'form-control input-sm']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            {{ BootForm::text('zip_code','Zip Code', null, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            {{ BootForm::tel('telephone','Tel. No.', null, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            {{ BootForm::text('fax','Fax', null, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            {{ BootForm::text('website','Web Site', null, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            {{ BootForm::email('email','Email', null, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                             {{ BootForm::tel('tin_no','TIN Number', null, ['class'=>'form-control input-sm']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                             {{ BootForm::text('trade_license_no','Trade License No', null, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            {{ BootForm::text('trade_license_issue_date','Trade License Issue Date', null, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            {{ BootForm::text('certificate_of_incorporation','Certificate of Incorporation', null, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            {{ BootForm::text('incorporation_date','Incorporation Date', null, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            {{ BootForm::text('vat_no','VAT No', null, ['class'=>'form-control input-sm']) }}
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            {{ BootForm::textarea('address','Address', null, ['class'=>'form-control input-sm', 'rows'=>2]) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control input-sm" rows="2" name="address"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Type of Business</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group pull-in clearfix">
                                                    <div class="col-md-2 col-sm-3">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox" name="business_type[]" value="Ltd. Company"><i></i> Ltd. Company
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-3">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox" name="business_type[]" value="Partnership"><i></i> Partnership
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-3">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox" name="business_type[]" value="Proprietorship"><i></i> Proprietorship
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-3 col-xs-12">
                                                        <div class="col-sm-2">
                                                            <div class="checkbox">
                                                                <label class="i-checks">
                                                                    <input type="checkbox"><i></i> Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control input-sm" type="text" name="business_type[]" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nature of Business</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group pull-in clearfix">
                                                    <div class="col-md-2 col-sm-3">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox" name="business_nature[]" value="Manufacturer"><i></i> Manufacturer
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-3">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox" name="business_nature[]" value="Trader"><i></i> Trader
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-3">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox" name="business_nature[]" value="Service Provide"><i></i> Service Provide
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-3">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox" name="business_nature[]" value="Contractor"><i></i> Contractor
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-3">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                                <input type="checkbox" name="business_nature['']" value="Agent/Distributor"><i></i> Agent/Distributor
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="col-sm-2">
                                                            <div class="checkbox">
                                                                <label class="i-checks">
                                                                    <input type="checkbox"><i></i> Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control input-sm" type="text" name="business_nature[]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12  table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Credit Information</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Credit Period</label>
                                                        <input class="form-control input-sm" type="text" name="credit_period">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Credit Limit</label>
                                                        <input class="form-control input-sm" type="text" name="credit_limit">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12  table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Acceptance of payment terms and other discounts (if applicable)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="col-md-2 col-sm-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><strong>Net</strong></div>
                                                            <input type="text" class="form-control input-sm" name="net_days">
                                                            <div class="input-group-addon">Day</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-4">
                                                    <div class="form-group">
                                                        <div class="col-sm-6 text-right">
                                                            <div class="checkbox">
                                                                <label class="i-checks">
                                                                    <input type="checkbox" name=""><i></i> Prompt payment discount
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 m-t-xs">
                                                            <input class="form-control input-sm" type="text" name="payment_discount">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <div class="col-sm-6 text-right">
                                                            <div class="checkbox">
                                                                <label class="i-checks">
                                                                    <input type="checkbox" name=""><i></i> Other discounts
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 m-t-xs">
                                                            <input class="form-control input-sm" type="text" name="other_discount">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Specify Discount Terms</label>
                                                        <textarea class="form-control input-sm" rows="2" name="discount_terms"></textarea>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12  table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Bank Information</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>A/C No</label>
                                                        <input class="form-control input-sm" type="text" name="ac_no">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>A/C Name</label>
                                                        <input class="form-control input-sm" type="text" name="ac_name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Bank</label>
                                                        <input class="form-control input-sm" type="text" name="bank_name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Branch</label>
                                                        <input class="form-control input-sm" type="text" name="branch_name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>SWIFT Code</label>
                                                        <input class="form-control input-sm" type="text" name="swift_code">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Bank Address</label>
                                                        <textarea class="form-control input-sm" rows="2" name="address"></textarea>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Contact Person Information</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Contact Person-1</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Contact Name</label>
                                                                        <input class="form-control input-sm" type="text" name="person[0]['name']">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Designation</label>
                                                                        <input class="form-control input-sm" type="text" name="person[0]['designation']">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Tel. No</label>
                                                                        <input class="form-control input-sm" type="tel" name="person[0]['telephone']">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>E-Mail</label>
                                                                        <input class="form-control input-sm" type="email" name="person[0]['email']">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Job Role</label>
                                                                        <input class="form-control input-sm" type="tel" name="person[0]['role']">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Coll No</label>
                                                                        <input class="form-control input-sm" type="email" name="person[0]['mobile']">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Contact Person-2</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Contact Name</label>
                                                                        <input class="form-control input-sm" type="text" name="person[1]['name']">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Designation</label>
                                                                        <input class="form-control input-sm" type="text" name="person[1]['designation']">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Tel. No</label>
                                                                        <input class="form-control input-sm" type="tel" name="person[1]['telephone']">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>E-Mail</label>
                                                                        <input class="form-control input-sm" type="email" name="person[1]['email']">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Job Role</label>
                                                                        <input class="form-control input-sm" type="tel" name="person[1]['role']">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Coll No</label>
                                                                        <input class="form-control input-sm" type="email" name="person[1]['mobile']">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Enclosures Information</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Enclosure Line</label>
                                                                        <select class="select form-control m-b input-sm" name="">
                                                                            <option value="" disabled selected>Select Product Line</option>
                                                                            <option>option1</option>
                                                                            <option>option2</option>
                                                                            <option>option3</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 text-center">
                                                                    <div class="form-group">
                                                                        <button type="button" class="btn btn-default btn-sm">Add to List</button>
                                                                    </div>
                                                                </div>
                                                                <!-- /end save -->
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th colspan="3">Enclosure LIst</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>SL No</th>
                                                                            <th>Enclosure Name</th>
                                                                            <th>Attachment</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>01</td>
                                                                            <td>Trade License</td>
                                                                            <td>
                                                                                <input type="file" accept="image/png, image/jpeg" name=""/>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                <br />

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a class="btn btn-default" href="{{route('vendor.index')}}">Cancel</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection