@extends('layout')
@section('title', 'Commercial Invoice Tracking')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Commercial Invoice Tracking</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="panel">
                            <div class="well row">
                                <div class="col-lg-4 ol-md-6 col-sm-6 col-xs-12 col-lg-offset-4 col-md-offset-3 col-sm-offset-3">
                                        <form action="{{route('get-ci-with-tracking')}}" method="GET">
                                            <label for="">Commercial Invoice Tracking No Search</label>
                                            <div class="input-group">
                                                <select data-placeholder="Select CI No"  required class="form-control input-sm select2" name="ci_no">
                                                    <option></option>
                                                    @foreach($ci_list as $item)
                                                    <option @isset($ci){{ ($item->commercial_invoice_no == $ci->commercial_invoice_no) ? "selected":null }}@endisset value="{{$item->commercial_invoice_no}}">{{$item->commercial_invoice_no}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default btn-sm" type="submit"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            @isset($ci)
                                <table class="table table-bordered ">
                                    <thead class="bg-primary">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col" class="text-center">Date</th>
                                        <th scope="col" class="text-center" width="40">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">Commercial Invoice Issue Date</th>
                                        <td>
                                            <form action="{{route('save-tracking-date')}}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" name="commercial_invoice_id" value="{{ $ci->id }}" class="form-control input-sm" >
                                                    <input type="text" name="commercial_invoice_issue_date" value="{{ \Carbon\Carbon::parse($ci->date)->format('d-m-Y') }}" class="form-control input-sm" readonly>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            @isset($ci->date)
                                            <div class="form-group text-center">
                                                <label class="label label-success">Done</label>
                                            </div>
                                            @else
                                            <div class="form-group text-center">
                                                <label class="label label-warning">Pending</label>
                                            </div>
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Bl Issue Date</th>
                                        <td>
                                            <form action="{{route('save-tracking-date')}}" method="POST">
                                                @csrf
                                                <div>
                                                    <input type="text" class="form-control input-sm"  readonly value="{{ $ci->bill_of_ladings->first() ? \Carbon\Carbon::parse($ci->bill_of_ladings->first()->bill_of_lading_date)->format('d-m-Y') : null }}">
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            @isset($ci->bill_of_ladings->first()->bill_of_lading_date)
                                            <div class="form-group text-center">
                                                <label class="label label-success">Done</label>
                                            </div>
                                            @else
                                            <div class="form-group text-center">
                                                <label class="label label-warning">Pending</label>
                                            </div>
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Document Arrived At Bank</th>
                                        <td>
                                            <form action="{{route('save-tracking-date')}}" method="POST">
                                                @csrf
                                                @isset($ci_tracking->document_arrived_at_bank_date)
                                                <div>
                                                    <input type="text" class="form-control input-sm"  readonly value="{{ $ci_tracking->document_arrived_at_bank_date }}">
                                                </div>
                                                @else
                                                <div class="input-group">
                                                    <input type="hidden" name="commercial_invoice_id" value="{{$ci->id}}" class="form-control input-sm" >
                                                    <input type="text" name="document_arrived_at_bank_date" class="form-control input-sm datepicker" autocomplete="off">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Confirm to save date')">Save</button>
                                                        </span>
                                                </div>
                                                @endisset
                                            </form>
                                        </td>
                                        <td>
                                            @isset($ci_tracking->document_arrived_at_bank_date)
                                            <div class="form-group text-center">
                                                <label class="label label-success">Done</label>
                                            </div>
                                            @else
                                            <div class="form-group text-center">
                                                <label class="label label-warning">Pending</label>
                                            </div>
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Document Send At Port</th>
                                        <td>
                                            <form action="{{route('save-tracking-date')}}" method="POST">
                                                @csrf
                                                @isset($ci_tracking->document_send_at_port_date)
                                                <div>
                                                    <input type="text" class="form-control input-sm"  readonly value="{{ $ci_tracking->document_send_at_port_date }}">
                                                </div>
                                                @else
                                                <div class="input-group">
                                                    <input type="hidden" name="commercial_invoice_id" value="{{$ci->id}}" class="form-control input-sm" >
                                                    <input type="text" name="document_send_at_port_date" class="form-control input-sm datepicker" autocomplete="off">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Confirm to save date')">Save</button>
                                                        </span>
                                                </div>
                                                @endisset
                                            </form>
                                        </td>
                                        <td>
                                            @isset($ci_tracking->document_send_at_port_date)
                                            <div class="form-group text-center">
                                                <label class="label label-success">Done</label>
                                            </div>
                                            @else
                                            <div class="form-group text-center">
                                                <label class="label label-warning">Pending</label>
                                            </div>
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Document Value Payment</th>
                                        <td>
                                            <form action="{{route('save-tracking-date')}}" method="POST">
                                                @csrf
                                                @isset($ci_tracking->document_value_payment_date)
                                                <div>
                                                    <input type="text" class="form-control input-sm"  readonly value="{{ $ci_tracking->document_value_payment_date }}">
                                                </div>
                                                @else
                                                <div class="input-group">
                                                    <input type="hidden" name="commercial_invoice_id" value="{{$ci->id}}" class="form-control input-sm" >
                                                    <input type="text" name="document_value_payment_date" class="form-control input-sm datepicker" autocomplete="off">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Confirm to save date')">Save</button>
                                                        </span>
                                                </div>
                                                @endisset
                                            </form>
                                        </td>
                                        <td>
                                            @isset($ci_tracking->document_value_payment_date)
                                            <div class="form-group text-center">
                                                <label class="label label-success">Done</label>
                                            </div>
                                            @else
                                            <div class="form-group text-center">
                                                <label class="label label-warning">Pending</label>
                                            </div>
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Container Arrived At Port</th>
                                        <td>
                                            <form action="{{route('save-tracking-date')}}" method="POST">
                                                @csrf
                                                @isset($ci_tracking->container_arrived_at_port_date)
                                                <div>
                                                    <input type="text" class="form-control input-sm"  readonly value="{{ $ci_tracking->container_arrived_at_port_date }}">
                                                </div>
                                                @else
                                                <div class="input-group">
                                                    <input type="hidden" name="commercial_invoice_id" value="{{$ci->id}}" class="form-control input-sm" >
                                                    <input type="text" name="container_arrived_at_port_date" class="form-control input-sm datepicker" autocomplete="off">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Confirm to save date')">Save</button>
                                                        </span>
                                                </div>
                                                @endisset
                                            </form>
                                        </td>
                                        <td>
                                            @isset($ci_tracking->container_arrived_at_port_date)
                                            <div class="form-group text-center">
                                                <label class="label label-success">Done</label>
                                            </div>
                                            @else
                                            <div class="form-group text-center">
                                                <label class="label label-warning">Pending</label>
                                            </div>
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Container Birth At Port</th>
                                        <td>
                                            <form action="{{route('save-tracking-date')}}" method="POST">
                                                @csrf
                                                @isset($ci_tracking->container_birth_at_port_date)
                                                <div>
                                                    <input type="text" class="form-control input-sm"  readonly value="{{ $ci_tracking->container_birth_at_port_date }}">
                                                </div>
                                                @else
                                                <div class="input-group">
                                                    <input type="hidden" name="commercial_invoice_id" value="{{$ci->id}}" class="form-control input-sm" >
                                                    <input type="text" name="container_birth_at_port_date" class="form-control input-sm datepicker" autocomplete="off">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Confirm to save date')">Save</button>
                                                        </span>
                                                </div>
                                                @endisset
                                            </form>
                                        </td>
                                        <td>
                                            @isset($ci_tracking->container_birth_at_port_date)
                                            <div class="form-group text-center">
                                                <label class="label label-success">Done</label>
                                            </div>
                                            @else
                                            <div class="form-group text-center">
                                                <label class="label label-warning">Pending</label>
                                            </div>
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Container Delivery At Port</th>
                                        <td>
                                            <form action="{{route('save-tracking-date')}}" method="POST">
                                                @csrf
                                                @isset($ci_tracking->container_delivery_at_port_date)
                                                <div>
                                                    <input type="text" class="form-control input-sm"  readonly value="{{ $ci_tracking->container_delivery_at_port_date }}">
                                                </div>
                                                @else
                                                <div class="input-group">
                                                    <input type="hidden" name="commercial_invoice_id" value="{{$ci->id}}" class="form-control input-sm" >
                                                    <input type="text" name="container_delivery_at_port_date" class="form-control input-sm datepicker" autocomplete="off">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Confirm to save date')">Save</button>
                                                        </span>
                                                </div>
                                                @endisset
                                            </form>
                                        </td>
                                        <td>
                                            @isset($ci_tracking->container_delivery_at_port_date)
                                            <div class="form-group text-center">
                                                <label class="label label-success">Done</label>
                                            </div>
                                            @else
                                            <div class="form-group text-center">
                                                <label class="label label-warning">Pending</label>
                                            </div>
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Received At Warehouse</th>
                                        <td>
                                            <form action="{{route('save-tracking-date')}}" method="POST">
                                                @csrf
                                                @isset($ci_tracking->receive_at_warehouse_date)
                                                <div>
                                                    <input type="text" class="form-control input-sm"  readonly value="{{ $ci_tracking->receive_at_warehouse_date }}">
                                                </div>
                                                @else
                                                <div class="input-group">
                                                    <input type="hidden" name="commercial_invoice_id" value="{{$ci->id}}" class="form-control input-sm" >
                                                    <input type="text" name="receive_at_warehouse_date" class="form-control input-sm datepicker" autocomplete="off">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Confirm to save date')">Save</button>
                                                        </span>
                                                </div>
                                                @endisset
                                            </form>
                                        </td>
                                        <td>
                                            @isset($ci_tracking->receive_at_warehouse_date)
                                            <div class="form-group text-center">
                                                <label class="label label-success">Done</label>
                                            </div>
                                            @else
                                            <div class="form-group text-center">
                                                <label class="label label-warning">Pending</label>
                                            </div>
                                            @endisset
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                @endif
                            </div>
                            <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <button class="btn btn-success btn-sm">Save</button>
                                    <a href="{{route('commercial-invoice-tracking.index')}}" class="btn btn-default btn-sm">Cancel</a>
                                </div>
                            </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /page content -->
@endsection
