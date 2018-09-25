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
                        <h2>Receive Item</h2>
                        <a href="{{route('receive.index')}}" class="mb-xs mt-xs mr-xs  btn btn-success btn-sm pull-right"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Receive List</a>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <!-- Nav tabs -->

                        <div class="" role="tabpanel" data-example-id="togglable-tabs">

                            @include('modules.inventory.receive._tab_header')
                            
                            <div id="myTabContent" class="tab-content">
                               
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="profile-tab">

                                    @include('partials.flash_msg')

                                    {{ BootForm::open(['model'=>$inventory_receive, 'store'=>'receive-internal.store', 'update'=>'receive-internal.update']) }}
                                        <div id="vue_app"> {{-- begining of vue app --}}
                                        <div class="row">

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::text('inventory_receive_id', 'Receive No', $inventory_receive_id, ['class'=>'form-control input-sm', 'readonly']) }}
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::select('working_unit_id', 'Select Working Unit', $working_units, null, ['class'=>'form-control input-sm']) }}
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    {{--<label>Date</label>
                                                    <input class="form-control input-sm" type="text"> --}}
                                                    {{ BootForm::text('receive_date', 'Select Date', null, ['class'=>'form-control input-sm datepicker']) }}
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                
                                                    <label>Requisition No</label>
                                                    <!--<input class="form-control input-sm" type="text">-->
                                                    <div class="input-group">
                                                        {{ Form::text('inventory_requisition_id', null, ['class'=>'form-control input-sm', "v-model"=>"requisition.inventory_requisition_id", "v-on:change"=>"fetch_requisition(requisition.inventory_requisition_id)"]) }}
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-default btn-sm" type="button" v-on:click="fetch_requisition(requisition.inventory_requisition_id)">
                                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                            </button>
                                                        </span>
                                                    </div><!-- /input-group -->
                                                
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    {{ BootForm::text('challan_no', null, null, ['class'=>'form-control input-sm']) }}
                                                </div>
                                            </div>

                                            {{ BootForm::hidden('inventory_issue_id', null, ['v-model'=>"requisition.inventory_issue_id"]) }}

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    {{ BootForm::text('Receive From', null, null, ['class'=>'form-control input-sm', 'disabled', 'v-model'=>"requisition.receive_from"]) }}
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::select('product_status_id', 'Product Status', $product_statuses, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                {{ BootForm::select('product_pattern_id', 'Product Pattern', $product_patterns, ['class'=>'form-control input-sm']) }}
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Remarks</label>
                                                    <textarea class="form-control" rows="2"></textarea>
                                                </div>
                                            </div>
                                        </div>


                            <hr>
                            <div class="border_1" style="border: 1px solid #ddd;margin: 5px 0px;padding: 5px;">
                                <div class="row">
                                    <div class="col-lg-2 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>HS Code</label>
                                            <!--<input class="form-control input-sm" type="text">-->
                                            <div class="input-group">
                                            <input type="text" class="form-control input-sm" placeholder="Search by HS code" v-model='active_record.hs_code' v-on:change='fetch_product(active_record.hs_code)'>
                                            <span class="input-group-btn">
                                                <button class="btn btn-default btn-sm" type="button" v-on:click='fetch_product(active_record.hs_code)'><i class="fa fa-search" aria-hidden="true"></i></button>
                                            </span>
                                        </div><!-- /input-group -->
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <!--<input class="form-control input-sm" type="text">-->
                                            <div class="input-group">
                                            <input type="text" class="form-control input-sm" placeholder="Search by name" v-model='active_record.name' v-on:change='fetch_product(active_record.name)'>
                                            <span class="input-group-btn">
                                                <button class="btn btn-default btn-sm" type="button" v-on:click='fetch_product(active_record.name)'><i class="fa fa-search" aria-hidden="true"></i></button>
                                            </span>
                                        </div><!-- /input-group -->
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input class="form-control input-sm" type="text" v-model='active_record.quantity' placeholder="Insert Quantity">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6">
                                        <button type="button" class="btn btn-success btn-md m-t-20" v-on:click="add_product" v-bind:disabled="!active_record.id">Add</button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive m-t-20">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>SL</th>
                                        <th>HS Code</th>
                                        <th>Item name</th>
                                        <th>Requisition Quantity</th>
                                        <th>Issue Quantity</th>
                                        <th>Return Quantity</th>
                                        <th>Return Status</th>
                                        <th>Delete</th>
                                    </tr>
                                    <tr v-for="(product, index) in products">
                                        <td v-html='index+1'></td>
                                        <td v-html='product.hs_code'></td>
                                        <td v-html='product.name'></td>
                                        <td v-html='product.requisition_quantity'></td>
                                        <td>
                                            <div class="form-group">
                                                <input v-bind:name="'products['+index+'][id]'" class="form-control input-sm" type="hidden" v-bind:value='product.id'/>
                                                <input v-bind:name="'products['+index+'][quantity]'" class="form-control input-sm" type="number" v-model='product.quantity' min="0"/>
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
                                        <td>
                                            <button type="button" class="btn btn-default btn-sm" v-on:click="delete_product(product)">
                                                <i class="fa fa-times-circle fa-lg text-danger" aria-hidden="true"></i>
                                            </button>
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
                base_url: "{{ url('inventory/api/get-product-info/') }}",
                old_data_url: "{{ url('inventory/api/vue-old-products') }}",
                get_requisition_url: "{{ url('inventory/api/get-inventory-requisition') }}",
                old_inputs_url: "{{ url('inventory/api/vue-old-inputs') }}",
                product_status_url: "{{ url('inventory/api/get-product-statuses') }}"
            },
            products:[],
            active_record:null,
            remote_data:null,
            requisition:{
                inventory_requisition_id:'',
                receive_from: '', //Requested working units name
                inventory_issue_id: ''
            },
            product_statuses:null
        },
        methods:{

            fetch_requisition:function(slug){

                var vm=this;
                var loading = $.loading();
                loading.open(3000);

                //reset models
                vm.products=[];
                vm.requisition={
                    inventory_requisition_id:'',
                    receive_from: '',
                    inventory_issue_id: ''
                }

                if(slug){

                    var working_unit=$('#working_unit_id').val();

                    axios.get(this.config.get_requisition_url + '/' + working_unit + '/' + slug).then(function(response){

                        vm.requisition=response.data.requisition;
                        vm.products=response.data.products;                
                        loading.close();

                    }).catch(function(){

                        loading.close();

                    });

                }else loading.close();

            },
            fetch_product:function(slug){

                var vm=this;
                var loading = $.loading();
                loading.open(3000);
                vm.remote_data=null;
                vm.reset_active_record();

                if(slug){

                    axios.get(this.config.base_url + '/' + slug).then(function(response){

                        vm.remote_data=response.data;
                        vm.active_record=vm.remote_data;
                        vm.active_record.quantity=0;
                        vm.active_record.return_quantity=0;
                        vm.active_record.return_status_id=1;
                
                        loading.close();

                    }).catch(function(){

                        loading.close();

                    });

                }else loading.close();

            },
            delete_product:function(product){
                this.products.splice(this.products.indexOf(product), 1);
             },
            reset_active_record:function(){
                this.active_record={
                    hs_code:'',
                    id:'',
                    name:'',
                    quantity:'',
                    return_quantity:0,
                    return_status_id:1
                };
            },
            add_product:function(){
                if(this.active_record.quantity > 0){
                    this.products.push(this.active_record);
                    this.reset_active_record();
                }
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

                    vm.requisition=response.data;                
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
         },//End of fetch_product_statuses method
         deduct_return:function(product){

            console.log(this.products.indexOf(product));

         }//End of deduct_return
        },
        beforeMount(){
            this.reset_active_record();
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

});//End of jquery
</script>
@endsection