@extends('layout')
@section('title', 'Rule Setup')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Rule Setup</h2>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-xs-3">
                        <!-- Nav tabs -->
                        @include('modules.sales.setting.rule_setup.tabs')
                    </div>

                    <div class="col-xs-9">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="credit_rule">
                                <div class="x_title">
                                    <h2>Credit Rule</h2>
                                    <button type="button" class="btn btn-sm btn-default btn-addon pull-right btn-form-toggle"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New</button>
                                    <div class="clearfix"></div>
                                </div>
                                {{-- @include('partials/flash_msg') --}}
                                <div id="form-area" style="display:none">
                                    {{ BootForm::open(['model' => $credit_rule, 'store' => 'credit-rule.store', 'update' => 'credit-rule.update']) }}
                                        <input type="hidden" name="rule_type" value="credit-rule">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::select('customer_id', 'Customer', $customer_list, null, ['class'=>'form-control input-sm select2','style'=>"width: 100%;", 'data-placeholder'=>'Select Customer']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::number('credit_amount','Credit Amount', null, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('deadline','Deadline', null, ['class'=>'form-control input-sm datepicker']) }}
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <br />
                                                <div class="ln_solid"></div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                                                    <button type="button" class="btn btn-default btn-sm btn-form-toggle"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    {{ BootForm::close() }}
                                </div>
                                <div class="table-responsive m-t-30">
                                    <table class="table table-bordered table-hover">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th width="40">#</th>
                                                <th>Customer</th>
                                                <th>Amount</th>
                                                <th>Deadline</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($credit_rule_list as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->customer->name }}</td>
                                                <td>{{ $item->credit_amount }}</td>
                                                <td>{{ $item->deadline }}</td>
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
    </div>
</div>
@endsection

@section('script')
    <script>
        $(function(){
        $('.btn-form-toggle').on('click', function(){
            $('#form-area').slideToggle('fast', function() {
                if ($(this).is(':visible')) {
                    $('.btn-form-toggle').html('<i class="fa fa-times" aria-hidden="true"></i> Close');               
                } else {
                    $('.btn-form-toggle').html('<i class="fa fa-plus-circle" aria-hidden="true"></i> Add New');                
                }        
            });
        });
    });
    </script>
@endsection
