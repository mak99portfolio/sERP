@extends('layout')
@section('title', 'Customer Profile Details')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-reply" aria-hidden="true"></i>&nbsp;Back</button>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-4 hidden-xs"><h2 class="text-center">Customer Name: {{$customer->customer_name}}</h2></div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        </div>
                        <div class="visible-xs col-xs-6"><button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</button></div>
                        <div class="visible-xs col-xs-6"><button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button></div>
                        <div class="visible-xs col-xs-12"><h2 class="text-center">Customer Name : {{$customer->customer_name}} </h2></div>
                    </div>
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive print-area">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3" class="text-center">Customer Profile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Customer Name:</strong> {{$customer->customer_name}}</td>
                                        <td><strong>Customer Type:</strong> {{$customer->customer_type->name}}</td>
                                        <td><strong>Status:</strong>{{$customer->status}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Establishment:</strong> {{$customer->establishment_date}}</td>
                                        <td><strong>Customer Zone:</strong> {{$customer->zone->name}}</td>
                                        <td><strong>Contact No:</strong>{{$customer->contact_number}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Fax:</strong> {{$customer->fax}}</td>
                                        <td><strong>Website:</strong> {{$customer->website}}</td>
                                        <td><strong>Email:</strong>31{{$customer->email}}23</td>
                                    </tr>
                                    <tr>
                                        <td><strong>TIN Number:</strong> {{$customer->tin_number}}</td>
                                        <td><strong>Trade License No:</strong> {{$customer->trade_license_number}}</td>
                                        <td><strong>Trade License Issue Date:</strong>{{$customer->trade_license_issue_date}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Certificate Of Incorporation:</strong> {{$customer->certificate_of_incorporation}}</td>
                                        <td><strong>Incorporation Date:</strong> {{$customer->incorporation_date}}</td>
                                        <td><strong>Vat No:</strong>{{$customer->vat_number}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Address :</strong> {{$customer->address}}</td>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Type Of Business</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$customer->type_of_business}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="2">Bank Information</th>
                                    </tr>
                                </thead>
                                @foreach($customer->customer_banks as $customer_bank)
                                <tbody>
                                    <tr>
                                        <td colspan="2"><strong>Bank-{{$loop->iteration}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>A/C no : </strong> {{$customer_bank->account_number}}</td>
                                        <td><strong>A/C Name : </strong> {{$customer_bank->account_name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Bank Name : </strong> {{$customer_bank->bank_name}}</td>
                                        <td><strong>Branch : </strong> {{$customer_bank->branch}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Swift Code : </strong> {{$customer_bank->swift_code}}</td>
                                        <td><strong>Bank Address : </strong> {{$customer_bank->bank_address}}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="2">Contact Person Information</th>
                                    </tr>
                                </thead>
                                @foreach($customer->contact_person as $contact_person)
                                <tbody>
                                    <tr>
                                    <td colspan="2"><strong>Contact Person-{{ $loop->iteration}}</strong></td>
                                    </tr>
                                    <tr>
                                    <td><strong>Contact Name : </strong> {{$contact_person->contact_name}}</td>
                                        <td><strong>Designation : </strong>  {{$contact_person->designation}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Contact No : </strong>  {{$contact_person->contact_number}}</td>
                                        <td><strong>Email : </strong>  {{$contact_person->email}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Job Role : </strong>  {{$contact_person->job_role}}</td>
                                        <td><strong>Tell No : </strong>  {{$contact_person->tell_number}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Cell No : </strong>  {{$contact_person->cell_number}}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Enclosures Information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($customer->customer_enclosure as $customer_enclosure)
                                    <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                        <td>{{$customer_enclosure->enclosure->name}}</td>
                                        <td><a target="_blank" href="{{ asset($customer_enclosure->file_directory . $customer_enclosure->file_name) }}"><i class="fa fa-file"></i> {{ $customer_enclosure->file_name }}</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Notes:</strong> {{$customer->notes}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--start approved by-->
                            <table id="print-footer" style="margin-top: 200px; width: 100%; display: none;">
                                <tr>
                                    <td style="text-align: center; font-weight: bold;">
                                        <span style="border-top: 2px solid black;"> Prepared By</span>
                                    </td>
                                    <td style="text-align: center; font-weight: bold;">
                                        <span style="border-top: 2px solid black;"> Checked By</span>
                                    </td>
                                    <td style="text-align: center; font-weight: bold;">
                                        <span style="border-top: 2px solid black;"> Approved By</span>
                                    </td>
                                </tr>
                            </table>
                            <!--end approved by-->
                        </div>
                        <!--end table-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection
