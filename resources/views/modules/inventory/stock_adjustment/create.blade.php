@extends('layout')
@section('title', 'Inventory Requisition')
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
                        <h2>Inventory Stock Adjustment</h2>
                        <a href="{{route('stock-adjustment.index')}}" class="mb-xs mt-xs mr-xs  btn btn-primary btn-sm pull-right"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Inventory Adjustment List</a>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @include('partials.flash_msg')
						{{ BootForm::open(['model'=>$stock_adjustment, 'store'=>'stock-adjustment.store', 'update'=>'stock-adjustment.update']) }}
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('inventory_stock_adjustment_no', 'Stock Adjustment No', $stock_adjustment_no, ['class'=>'form-control input-sm'/*, 'readonly'=>'true'*/]) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('adjustment_type', 'Select Requisition Type', ['stock_in'=>'Stock In', 'stock_out'=>'Stock Out'], null, ['class'=>'form-control input-sm select2']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('inventory_adjustment_purpose_id', 'Select Adjustment Purpose', $inventory_adjustment_purposes, null, ['class'=>'form-control input-sm select2']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('working_unit_id', 'Select Working Unit', $working_units, null, ['class'=>'form-control input-sm select2']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('product_status_id', 'Item Status', $product_statuses, null, ['class'=>'form-control input-sm select2']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('product_type_id', 'Item Pattern', $product_types, null, ['class'=>'form-control input-sm select2']) }}
                                </div>
                            </div>
                            <hr>
                            <div id="vue_app">
                            <div class="border_1" style="border: 1px solid #ddd;margin: 5px 0px;padding: 5px;">
                                <div class="row">
                                    <div class="col-lg-2 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>HS Code</label>
                                            <!--<input class="form-control input-sm" type="text">-->
                                            <div class="input-group">
                                            <input type="text" class="form-control input-sm" placeholder="Search by HS code" v-model='active_record.hs_code' v-on:change='fetch_product(active_record.hs_code)' v-on:keydown.enter.prevent="fetch_product(active_record.name)">
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
                                            <input type="text" class="form-control input-sm" placeholder="Search by name" v-model='active_record.name' v-on:change='fetch_product(active_record.name)' v-on:keydown.enter.prevent="fetch_product(active_record.name)">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default btn-sm" type="button" v-on:click='fetch_product(active_record.name)'><i class="fa fa-search" aria-hidden="true"></i></button>
                                            </span>
                                        </div><!-- /input-group -->
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Available Quantity</label>
                                            <input class="form-control input-sm" type="text" v-model='active_record.stock' readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Adjusted Quantity</label>
                                            <input class="form-control input-sm" type="number" min="0" v-model='active_record.quantity' v-on:keydown.enter.prevent="add_product">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6">
                                        <button type="button" class="btn btn-primary btn-md m-t-20" v-on:click="add_product" v-bind:disabled="!active_record.id">Add</button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive m-t-20">
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width: 100px;">ID</th>
                                        <th>Item name</th>
                                        <th style="width: 150px;">Stock</th>
                                        <th style="width: 175px;">Adjusted Quantity</th>
                                        <th style="width: 175px;">Batch No</th>
                                        <th style="width: 175px;">Expiration Date</th>
                                        <th style="width: 100px;">Delete</th>
                                    </tr>
                                    <tr v-for="(product, index) in products">
                                      <td v-html='product.id'></td>
                                      <td v-html='product.name'></td>
                                      <td v-html='product.stock'></td>
                                      <td>
                                       <div class="form-group">
                                          <input v-bind:name="'products['+index+'][id]'" class="form-control input-sm" type="hidden" v-bind:value='product.id'/>
                                          <input v-bind:name="'products['+index+'][quantity]'" class="form-control input-sm" type="number" v-model='product.quantity' min="0"/>
                                       </div>
                                     </td>
                                      <td>
                                       <div class="form-group">
                                          <input v-bind:name="'products['+index+'][batch_no]'" class="form-control input-sm" type="text" v-model='product.batch_no' min="0"  placeholder="Optional"/>
                                       </div>
                                     </td>
                                      <td>
                                       <div class="form-group">
                                          <input v-bind:name="'products['+index+'][expiration_date]'" class="form-control input-sm" type="date" v-model='product.expiration_date' min="0" placeholder="Optional" />
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
                                {!! btnSubmitGroup() !!}
                            </div>
                            {{ BootForm::close() }}
                        </form>
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
          base_url: "{{ url('inventory/get-product-info-for-adjustment/') }}",
          old_data_url: "{{ url('inventory/vue-old-products') }}"
        },
  			products:[/*
  				{id:1, name:'First Table', stock:10, quantity:8},
  				{id:2, name:'Second Table', stock:15, quantity:10}*/
  			],
  			active_record:{
  				hs_code:'',
  				id:'',
  				name:'',
  				stock:'',
  				quantity:''
  			},
  			remote_data:'Working..'
  		},
  		methods:{
  			alert:function(event){
  				alert('Working...');
  				console.log(event.target);
  			},
  			fetch_product:function(slug){

  				var vm=this;
          var loading = $.loading();
          loading.open(3000);
          vm.remote_data=null;
          vm.reset_active_record();

          requested_depot_id=$('#working_unit_id').val();

          if(slug && requested_depot_id){

            axios.get(this.config.base_url + '/' + requested_depot_id + '/' +slug).then(function(response){

              vm.remote_data=response.data;
              vm.active_record=vm.remote_data;
              vm.active_record.quantity=0
                
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
          this.active_record={hs_code:'', id:'', name:'', stock:'', quantity:''};
         },
         add_product:function(){
          if(this.active_record.quantity > 0){
            this.products.push(this.active_record);
            this.reset_active_record();
          }else{
            new PNotify({
              'title': 'Failed!',
              'text': 'Sorry!, inserted quantity amount is zero.',
              'type': 'error',
              'styling': 'bootstrap3'
            });
          }
         },
         load_old:function(){
            var vm=this;
            var loading=$.loading();

            requested_depot_id=$('#working_unit_id').val();
            product_status_id=$('#product_status_id').val();
            product_type_id=$('#product_type_id').val();

            loading.open(3000);
            axios.get(this.config.old_data_url + '/' + requested_depot_id + '/' + product_status_id + '/' + product_type_id).then(function(response){

              vm.products=response.data;                
              loading.close();

            }).catch(function(){

              loading.close();

            });
         }
  		},
      watch:{
        remote_data:function(){

        }
      },
      beforeMount(){
        this.load_old();
      }
	})//End of vue js

});
</script>
@endsection