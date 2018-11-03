@extends('layout')
@section('title', 'Challan')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Sales Invoice</h2>
                    <a href="{{ route('sales-challan.index') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> Invoice Received List</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="form-horizontal form-label-left input_mask" id='main'>

                        <div class="row" v-show="errors_msg">
                            <div class="col-md-12">
                                    <div class="alert bg-danger text-danger">
                                        <button type="button" class="close" v-on:click="errors_msg=false"><i class="fa fa-times"></i></button>
                                        <span class="font-breeSerif">
                                            <i class="fa fa-exclamation-triangle fa-lg" aria-hidden="true"></i>
                                            <strong>Form submission failed!</strong>
                                        </span>
                                        <ul v-for="row in errors">
                                            <li v-for="inner_row in row" v-html="inner_row"></li>
                                        </ul>
                                    </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group " v-bind:class="{ 'has-error': errors.customer_id }">
                                    <label for="customer_id" class="control-label">Select Customer</label>
                                    <select class="form-control input-sm bSelect" id="customer_id" v-model="field.customer_id" v-on:change="update_customer">
                                          <option v-for="(row, index) in resource.customers.data" v-bind:value="row.id" v-html="row.name"></option>
                                    </select>
                                    <span
                                        class="help-block"
                                        v-for="row in errors.customer_id"
                                        v-html="row"
                                    ></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group " v-bind:class="{ 'has-error': errors.sales_invoice_id }">
                                    <label for="sales_invoice_id" class="control-label">Sales Invoice</label>
                                    <select class="form-control input-sm bSelect" id="sales_invoice_id" v-model="field.sales_invoice_id" v-on:change="update_sales_invoice">
                                          <option v-for="(row, index) in resource.sales_invoices.data" v-bind:value="row.id" v-html="row.sales_invoice_no"></option>
                                    </select>
                                    <span
                                        class="help-block"
                                        v-for="row in errors.sales_invoice_id"
                                        v-html="row"
                                    ></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group " v-bind:class="{ 'has-error': errors.sales_invoice_amount }">
                                    <label for="sales_invoice_amount" class="control-label">Sales Invoice Amount</label>
                                    <input type='number' min='0' class="form-control input-sm" id="sales_invoice_amount" v-model="field.sales_invoice_amount" readonly/>
                                    <span
                                        class="help-block"
                                        v-for="row in errors.sales_invoice_amount"
                                        v-html="row"
                                    ></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group" v-bind:class="{ 'has-error': errors.sales_invoice_received_date }">
                                    <label for="sales_invoice_received_date" class="control-label">Receive Date</label>
                                    <vuejs-datepicker v-model="field.sales_invoice_received_date" input-class="form-control input-sm"></vuejs-datepicker>
                                    <span
                                        class="help-block"
                                        v-for="row in errors.sales_invoice_received_date"
                                        v-html="row"
                                    ></span>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group" v-bind:class="{ 'has-error': errors.remarks }">
                                    <label for="remarks" class="control-label">Remarks</label>
                                    <textarea id="remarks" class="form-control input-sm" rows="2" v-model='field.remarks'></textarea>
                                    <span
                                        class="help-block"
                                        v-for="row in errors.remarks"
                                        v-html="row"
                                    ></span>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-sm btn-success" v-on:click="submit">Submit</button>
                                </div>
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
    //Vue.component('v-select', VueSelect.VueSelect);
    var vue=new Vue({
        mixins: [custom],
        el: '#main',
        components:{
            vuejsDatepicker
        },
        data:{
            url:{
                resource:"{{ url('api/resource') }}",
                submit:"{{ route('sales-invoice-received.store') }}"
            },
            field:{
                csrf_token: "{{ csrf_token() }}",
                customer_id:'',
                sales_invoice_id:'',
                sales_invoice_amount:'',
                sales_invoice_received_date: moment().format('DD MMM YYYY'),
                remarks:''
            },
            resource:{
                customers:{
                    data:[{id:0, address:'--Select Customer--'}]
                },
                sales_invoices:{
                    data:[{id:0, name:'--Select Sales Invoice--'}]
                }
            },
            temp:null,
            errors_msg:false,
            errors:null
        },
        methods:{
            update_customer:function(){

                var ref=this;

                if(!ref.field.customer_id){
                    ref.alert('Please!, select a Customer.');
                    return false;
                }

                ref.fetch_resource(
                    ref.url.resource +'/'+ 'sales-invoice',
                    ref.resource.sales_invoices,
                    null,
                    {query:{customer_id: ref.field.customer_id, sales_invoice_status:'in_transit'}}
                );

            },
            update_sales_invoice:function(){

                var ref=this;

                if(!ref.field.sales_invoice_id){
                    ref.alert('Please!, select a Invoice.');
                    return false;
                }

                var selected_invoice=ref.resource.sales_invoices.data.find(function(row){
                    return row.id==ref.field.sales_invoice_id;
                });

                ref.field.sales_invoice_amount=selected_invoice.grand_total;

            },
            submit:function(){

                var ref=this;

                this.reset_error();

                axios({
                    method: 'post',
                    url: ref.url.submit,
                    data: ref.field,
                    config: { headers: {'Content-Type': 'multipart/form-data' }}
                }).then(function(response){

                    ref.alert(response.data, 'success');
                    window.location.replace("{{ route('sales-invoice-received.index') }}");

                }).catch(function (error){

                    if(error.response.status==422){
                        ref.errors_msg=true;
                        ref.errors=error.response.data;                        
                    }else ref.alert('Sorry!, form submit failed internal server error.');


                });

            },
            reset_error:function(){

                this.errors_msg=false;

                this.errors={
                    customer_id:false,
                    sales_invoice_id:false,
                    sales_invoice_amount:false,
                    sales_invoice_received_date:false,
                    remarks:false
                }

            }
        },
        beforeMount(){
            this.fetch_resource(this.url.resource + '/customer', this.resource.customers);
            this.reset_error();
        },//End of beforeMount
        updated(){
            $('.bSelect').selectpicker('refresh');
        }//end of updated
    });//End of vue js

    $('.bSelect').selectpicker({
        liveSearch:true,
        size:5
    });

});
</script>
@endsection