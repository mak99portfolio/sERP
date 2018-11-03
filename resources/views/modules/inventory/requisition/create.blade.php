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
                        <h2>Inventory Requisition</h2>
                        <a href="{{route('requisition.index')}}" class="mb-xs mt-xs mr-xs  btn btn-success btn-sm pull-right"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Inventory Requisition List</a>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @include('partials.flash_msg')
						{{ BootForm::open(['model'=>$inventory_requisition, 'store'=>'requisition.store', 'update'=>'requisition.update']) }}
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('inventory_requisition_no', 'Requisition No', $requisition_no, ['class'=>'form-control input-sm'/*, 'readonly'=>'true'*/]) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('inventory_requisition_type_id', 'Select Requisition Type', $inventory_requisition_types, null, ['class'=>'form-control input-sm select2','required', 'data-popup'=> route('requisition-type.index')]) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('sender_working_unit_id', 'Requisition Sender Depot', $sender_working_units, null, ['class'=>'form-control input-sm select2']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('requested_working_unit_id', 'Requested Depot', $requested_working_units, null, ['class'=>'form-control input-sm select2']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('product_status_id', 'Item Status', $product_statuses, null, ['class'=>'form-control input-sm select2','required', 'data-popup'=> route('status-adjustment.index')]) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('product_type_id', 'Item Type', $product_types, null, ['class'=>'form-control input-sm select2']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('date', 'Select Date', null, ['class'=>'form-control input-sm datepicker']) }}
                                </div>
                            </div>
                            <hr>
                            <div id="vue_app">

                              {{-- Product Modal --}}
                              <div class="modal fade in" id="product_list" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                 <div class="modal-dialog">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                          <h4 class="modal-title" id="myModalLabel">
                                             Add Product From List
                                          </h4>
                                       </div>
                                       <div class="modal-body" style="height: 75vh; overflow-y: auto">
                                        <div class="table-responsive m-t-20">
                                            <div class="row">
                                              <div class="col-lg-5 col-md-5 col-sm-5">
                                                  <div class="form-group">
                                                      <input class="form-control input-sm" type="text" placeholder="Search Product" v-model='search'>
                                                  </div>
                                              </div>
                                            </div>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>HS Code</th>
                                                    <th>Add</th>
                                                </tr>
                                                <tr v-for="(row, index) in filter_products">
                                                  <td v-html='row.name'></td>
                                                  <td v-html='row.hs_code'></td>
                                                  <td>
                                                    <button type="button" class="btn btn-default btn-sm" v-on:click="add_product_from_list(index)">
                                                      <i class="fa fa-plus-circle fa-lg text-primary" aria-hidden="true"></i> Add
                                                    </button>
                                                  </td>
                                                 </tr>
                                            </table>
                                        </div>
                                       </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                              </div><!-- /.modal -->

                            <div class="border_1" style="border: 1px solid #ddd;margin: 5px 0px;padding: 5px;">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for='product_id'>Products</label>
                                              <select class="form-control input-sm" data-live-search="true" data-size='5' id="product_id" ref='product_id' v-model='product_id' v-on:change="fetch_product">
                                                <option v-for="(row, index) in resource.products.data" v-bind:value='row.id' v-html='row.name'></option>
                                              </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>In Stock</label>
                                            <input class="form-control input-sm" type="text" v-model='active_record.stock' readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Requested Quantity</label>
                                            <input class="form-control input-sm" type="number" min="0" v-model='active_record.quantity'  v-on:keydown.enter.prevent="add_product">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6">
                                        <span class="btn-group">
                                          <button type="button" class="btn btn-success btn-md m-t-20" v-on:click="add_product" v-bind:disabled="!active_record.id">Add</button>
                                          <button type="button" class="btn btn-default btn-md m-t-20"  data-toggle="modal" data-target="#product_list">
                                            <i class="fa fa-bars text-primary"></i>
                                            From List
                                          </button>
                                          </span>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive m-t-20">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Item name</th>
                                        <th class="text-center">Stock</th>
                                        <th>Quantity</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    <tr v-for="(product, index) in products">
  					<td v-html='product.name'></td>
                                        <td class="text-center" v-html='product.stock'></td>
  					<td>
	                                    <div class="form-group">
                                            <input v-bind:name="'products['+index+'][id]'" class="form-control input-sm" type="hidden" v-bind:value='product.id'/>
                                            <input v-bind:name="'products['+index+'][quantity]'" class="form-control input-sm" type="number" v-model='product.quantity' min="0"/>
	                                    </div>
  					</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-default btn-sm" v-on:click="delete_product(product)">
  	                                	<i class="fa fa-times-circle fa-lg text-danger" aria-hidden="true"></i>
                                            </button>
                                    	</td>
                                    </tr>
                                </table>
                            </div>
                            </div> {{-- End of vue app --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <br />
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                      @if($inventory_requisition->initial_approver()->exists())
                                        <button type="submit" class="btn btn-warning btn-sm">Submit Final Approval</button>
                                      @else
                                        {!! btnSubmitGroup() !!}
                                      @endif
                                    </div>
                                </div>
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
<script>
$(function(){
	var vue=new Vue({
      mixins: [custom],
  		el: '#vue_app',
  		data:{
        search:'',
        product_id:'',
        config:{
          base_url: "{{ url('inventory/get-product-info/') }}",
          old_data_url: "{{ url('inventory/vue-old-products') }}",
          resource:"{{ url('api/resource') }}",
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
  			remote_data:'Working..',
        resource:{
          products:{
            data:[]
          }
        }
  		},
  		methods:{
  			fetch_product:function(){

  				var ref=this;
          ref.loading.open(3000);
          ref.remote_data=null;
          ref.reset_active_record();

          sender_working_unit_id=$('#sender_working_unit_id').val();
          product_status_id=$('#product_status_id').val();
          product_type_id=$('#product_type_id').val();

          if(ref.product_id && sender_working_unit_id){

            axios.get(this.config.base_url + '/' + sender_working_unit_id + '/' + product_status_id + '/' + product_type_id + '/' +ref.product_id).then(function(response){

              ref.remote_data=response.data;
              ref.active_record=ref.remote_data;
              ref.active_record.quantity=0;                
              ref.loading.close();

            }).catch(function(){

              ref.loading.close();
              ref.alert('Sorry!, found no result.')

            });

          }else{
            ref.loading.close();
            ref.alert('Please!, select a product');
          }

  			},
  			delete_product:function(product){
			    this.products.splice(this.products.indexOf(product), 1);
  			 },
         reset_active_record:function(){
          this.active_record={hs_code:'', id:'', name:'', stock:'', quantity:''};
         },
         add_product:function(){
          if(this.active_record.quantity > 0){
            this.product_id='';
            this.products.push(this.active_record);
            this.reset_active_record();
          }else this.alert('Product quantity have to be more than zero.');
         },
         load_old:function(){
            var ref=this;
            var loading=$.loading();

            sender_working_unit_id=$('#sender_working_unit_id').val();
            product_status_id=$('#product_status_id').val();
            product_type_id=$('#product_type_id').val();

            loading.open(3000);
            axios.get(this.config.old_data_url + '/' + sender_working_unit_id + '/' + product_status_id + '/' + product_type_id).then(function(response){

              ref.products=response.data;                
              loading.close();

            }).catch(function(){

              loading.close();

            });
         },
        add_product_from_list:function(index){
          var product=this.resource.products.data[index];
          this.products.push({
            hs_code:product.hs_code,
            id:product.id,
            name:product.name,
            stock:'',
            quantity:''
          });
        }
  		},
      computed: {
        filter_products() {
          return this.resource.products.data.filter(row=>{
            return row.name.toLowerCase().includes(this.search.toLowerCase());
          })
        }
      },
      watch:{
        remote_data:function(){

        }
      },
      beforeMount(){
        this.fetch_resource(this.config.resource + '/product', this.resource.products);
        this.load_old();
      },//End of beforeMount
      updated(){
        $(this.$refs.product_id).selectpicker('refresh');
      }//end of updated
	})//End of vue js

});
</script>
@endsection