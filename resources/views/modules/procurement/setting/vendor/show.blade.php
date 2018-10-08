@extends('layout')
@section('title', 'Vendor List Details')
@section('content')
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
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-reply" aria-hidden="true"></i>&nbsp;Back</button>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-4 hidden-xs"><h2 class="text-center">Vendor Name : {{ $vendor->name }}</h2></div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 hidden-xs">
                            <button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        </div>
                        <div class="visible-xs col-xs-6"><button type="button" onclick="window.history.back();" class="btn btn-sm btn-default pull-left"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</button></div>
                        <div class="visible-xs col-xs-6"><button type="button" class="btn btn-sm btn-info pull-right print-btn" value='Print'><i class="fa fa-print" aria-hidden="true"></i> Print</button></div>
                        <div class="visible-xs col-xs-12"><h2 class="text-center">Vendor Name : {{ $vendor->name }}</h2></div>
                    </div>
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive print-area">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Vendor Id : </strong>{{ $vendor->vendor_id }}</td>
                                        <td><strong>Vendor Name : </strong> {{ $vendor->name }}</td>
                                        <td><strong>Status: </strong> {{ $vendor->status_id }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Establishment Date :</strong> {{ $vendor->establishment_date }}</td>
                                        <td><strong>Country:</strong> {{ $vendor->country->name }}</td>
                                        <td><strong>Vendor Category:</strong> {{ $vendor->category->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Zip Code:</strong> {{ $vendor->zip_code }}</td>
                                        <td><strong>Tel. No. :</strong> {{ $vendor->telephone }}</td>
                                        <td><strong>Fax:</strong> {{ $vendor->fax }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Web Site :</strong> {{ $vendor->website }}</td>
                                        <td><strong>Email:</strong> {{ $vendor->email }}</td>
                                        <td><strong>TIN Number :</strong> {{ $vendor->tin_no }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Trade License No :</strong> {{ $vendor->trade_license_no }}</td>
                                        <td><strong>Trade License Issue Date:</strong> {{ $vendor->trade_license_issue_date }}</td>
                                        <td><strong>Certificate of Incorporation :</strong> {{ $vendor->certificate_of_incorporation }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Incorporation Date :</strong> {{ $vendor->incorporation_date }}</td>
                                        <td><strong>VAT No:</strong> {{ $vendor->vat_no }}</td>
                                        <td><strong></strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Address:</strong> {{ $vendor->address }}</td>
                                    </tr>
                                    @if(is_array($business_type = unserialize($vendor->business_type)))
                                    <tr>
                                        <td colspan="3"><strong>Type of Business:</strong> 
                                            @foreach ($business_type as $item)
                                                {{ $item . ($loop->last ? '': ',')}}
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endif
                                    @if(is_array($business_nature = unserialize($vendor->business_nature)))
                                    <tr>
                                        <td colspan="3"><strong>Nature of Business:</strong> 
                                            @foreach ($business_nature as $item)
                                                {{ $item . ($loop->last ? '': ',')}}
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Credit Information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Credit Period :</strong> {{ $vendor->credit_period }}</td>
                                        <td><strong>Credit Limit :</strong> {{ $vendor->credit_limit }}</td>
                                        <td><strong></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Acceptance of payment terms and other discounts (if applicable)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Net Day:</strong> {{ $vendor->payment_term->net_days }}</td>
                                        <td><strong>Prompt payment discount :</strong> {{ $vendor->payment_term->payment_discount }}</td>
                                        <td><strong>Other Discounts:</strong> {{ $vendor->payment_term->other_discount }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Specify Discount Terms :</strong> {{ $vendor->payment_term->discount_terms }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Bank Information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>A/C No:</strong> {{ $vendor->bank->ac_no }}</td>
                                        <td><strong>A/C Name :</strong> {{ $vendor->bank->ac_name }}</td>
                                        <td><strong>Bank:</strong> {{ $vendor->bank->bank_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Branch:</strong> {{ $vendor->bank->branch_name }}</td>
                                        <td><strong>SWIFT Code :</strong> {{ $vendor->bank->swift_code }}</td>
                                        <td><strong></strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Bank Address :</strong> {{ $vendor->bank->address }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="4">Contact Person Information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vendor->contacts as $item)
                                    <tr>
                                            <td rowspan="3">Person {{ $loop->iteration }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Contact Name :</strong> {{ $item->name }}</td>
                                            <td><strong>Designation:</strong> {{ $item->designation }}</td>
                                            <td><strong>Tel.No :</strong> {{ $item->telephone }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>E-Mail :</strong> {{ $item->email }}</td>
                                            <td><strong>Job Role :</strong> {{ $item->role }}</td>
                                            <td><strong>Cell No :</strong> {{ $item->mobile }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Enclosures Information</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">Enclosure LIst</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Enclosure Name</th>
                                        <th>Attachment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vendor->enclosures as $item)
                                        <tr>
                                            <td><strong></strong>{{ $loop->iteration }}</td>
                                            <td><strong></strong>{{ $item->enclosure->name }}</td>
                                            <td><a target="_blank" href="{{ asset($item->file_directory . $item->file_name) }}"><i class="fa fa-file"></i> {{ $item->file_name }}</a></td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                        <!--end table-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection