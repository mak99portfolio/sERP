@extends('layout')
@section('title', 'Receive Item')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Inventory</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        {{-- Content here --}}

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Receive Return</h2>
                        <a href="{{route('receive.index')}}" class="mb-xs mt-xs mr-xs  btn btn-success btn-sm pull-right"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Receive List</a>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <!-- Nav tabs -->

                        <div class="" role="tabpanel" data-example-id="togglable-tabs">

                            @include('modules.inventory.receive._tab_header')

                            <div id="myTabContent" class="tab-content">

                                @include('partials.flash_msg')

                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="profile-tab">
                                    {{ BootForm::open(['model'=>$inventory_receive, 'store'=>'receive-return.store', 'update'=>'receive-return.update']) }}
                                    <div id="vue_app">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('inventory_receive_no', 'Receive No', $inventory_receive_no, ['class'=>'form-control input-sm', 'readonly']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::select('inventory_return_reason_id', 'Return Reason', $inventory_return_reasons, null, ['class'=>'form-control input-sm selectpicker']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::select('working_unit_id', 'Working Unit', $working_units, null, ['class'=>'form-control input-sm selectpicker']) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('receive_date', null, null, ['class'=>'form-control input-sm datepicker' ]) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('inventory_issue_no', 'Issue No', null, ['class'=>'form-control input-sm', 'placeholder'=>'Insert Issue No','suffix' => BootForm::addonButton(fa('fa-search'), ['class' => 'btn-default btn-sm', "v-on:click"=>"fetch_issue_return(issue.inventory_issue_no)"]), 'v-model'=>"issue.inventory_issue_no", 'v-on:change'=>"fetch_issue_return(issue.inventory_issue_no)"]) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('inventory_requisition_no', 'Requisition No', null, ['class'=>'form-control input-sm', 'readonly', 'v-model'=>"issue.inventory_requisition_no"]) }}
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('receive_from', null, null, ['class'=>'form-control input-sm', 'readonly', 'v-model'=>"issue.receive_from"]) }}
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                {{ BootForm::textarea('remarks', null, null, ['rows'=>2]) }}
                                            </div>
                                        </div>

                            <div class="table-responsive m-t-20">
                                <table class="table table-bordered">

                                    <tr>
                                        <th>SL</th>
                                        <th>HS Code</th>
                                        <th>Item name</th>
                                        <th style="width: 150px;">Issue Quantity</th>
                                        <th style="width: 150px;">Batch No</th>
                                        <th style="width: 150px;">Return Quantity</th>
                                        <th style="width: 150px;">Return Status</th>
                                    </tr>

                                    <tr v-for="(product, index) in products">
                                        <td v-html='index+1'></td>
                                        <td v-html='product.hs_code'></td>
                                        <td v-html='product.name'></td>
                                        <td>
                                            <div class="form-group">
                                                <input v-bind:name="'products['+index+'][id]'" class="form-control input-sm" type="hidden" v-bind:value='product.id'/>
                                                <input v-bind:name="'products['+index+'][quantity]'" class="form-control input-sm" type="number" v-model='product.quantity' min="0" readonly/>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input v-bind:name="'products['+index+'][expiration_date]'" class="form-control input-sm" type="hidden" v-bind:value='product.expiration_date'/>
                                                <input v-bind:name="'products['+index+'][batch_no]'" class="form-control input-sm" type="text" v-model='product.batch_no' min="0" readonly/>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input v-bind:name="'products['+index+'][return_quantity]'" class="form-control input-sm" type="number" v-model='product.return_quantity' min="0"/>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <select v-bind:name="'products['+index+'][return_status_id]'" class="form-control input-sm" v-bind:value="product.return_status_id">
                                                    <option v-for="status in product_statuses" v-bind:value="status.id" v-html="status.name" v-bind:selected="product.return_status_id==status.id"></option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            </div> {{-- End of vue app --}}

                                <div class="col-md-12">
                                    <br />
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        {!! btnSubmitGroup() !!}
                                    </div>
                                </div>
                                {{ BootForm::close() }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        {{-- Content end --}}
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios@0.18.0/dist/axios.min.js"></script>
<script src="{{ asset('assets/vendors/ajax_loading/ajax-loading.js') }}"></script>
<script>
$(function(){
    var vue=new Vue({
        el: '#vue_app',
        data:{
            config:{
                old_data_url: "{{ url('inventory/api/vue-old-products') }}",
                get_issue_return_url: "{{ url('inventory/api/get-issue-return') }}",
                old_inputs_url: "{{ url('inventory/api/vue-old-inputs') }}",
                product_status_url: "{{ url('inventory/api/get-product-statuses') }}"
            },
            products:[],
            issue:{
                inventory_issue_no:'',
                inventory_requisition_no: '',
                receive_from: ''
            },
            product_statuses:null
        },
        methods:{

            fetch_issue_return:function(slug){

                var vm=this;
                var loading = $.loading();
                loading.open(3000);

                //reset models
                vm.products=[];
                vm.issue={
                    inventory_issue_no:'',
                    inventory_requisition_no: '',
                    receive_from: ''
                }

                if(slug){

                    var working_unit=$('#working_unit_id').val();

                    axios.get(this.config.get_issue_return_url + '/' + working_unit + '/' + slug).then(function(response){

                        vm.issue=response.data.issue;
                        vm.products=response.data.products;                
                        loading.close();

                    }).catch(function(){

                        loading.close();

                    });

                }else loading.close();

            },
            delete_product:function(product){
                this.products.splice(this.products.indexOf(product), 1);
            },
            load_old:function(){
                var vm=this;
                var loading=$.loading();
                loading.open(3000);

                axios.get(this.config.old_data_url).then(function(response){

                    vm.products=response.data;                
                    loading.close();

                }).catch(function(){

                    loading.close();

                });//End of axios

                loading.open(3000);

                axios.get(this.config.old_inputs_url).then(function(response){

                    vm.issue=response.data;                
                    loading.close();

                }).catch(function(){

                    loading.close();

                });//End of axios
         },
         fetch_product_statuses:function(){
                var vm=this;
                var loading=$.loading();
                loading.open(3000);
                axios.get(this.config.product_status_url).then(function(response){

                    vm.product_statuses=response.data;                
                    loading.close();

                }).catch(function(){

                    loading.close();

                });//End of axios
         }
        },
        beforeMount(){
            this.load_old();
            this.fetch_product_statuses();
        }
    })//End of vue js

    $('.datepicker').daterangepicker({
        singleDatePicker: true,
        singleClasses: "picker_3",
        locale: {
            format: 'DD-MM-YYYY'
        }
    });

    $(".selectpicker").select2({});

});//End of jquery
</script>
@endsection