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
                        <h2>Inventory Issue</h2>
                        <a href="{{route('issue.index')}}" class="mb-xs mt-xs mr-xs  btn btn-success btn-sm pull-right"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Inventory Issue List</a>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @include('partials.flash_msg')
						              {{ BootForm::open(['model'=>$issue, /*'store'=>'issue.store',*/ 'update'=>'issue.update']) }}
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('inventory_requisition_no', 'Requisition No', $issue->requisition->inventory_requisition_no, ['class'=>'form-control input-sm', 'disabled'=>'true']) }}
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('inventory_requisition_type_id', 'Requisition Type', $inventory_requisition_types, $issue->requisition->inventory_requisition_type_id, ['class'=>'form-control input-sm', 'disabled'=>'true']) }}
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('sender_working_unit_id', 'Requisition Sender Depot', $working_units, $issue->requisition->sender_working_unit_id, ['class'=>'form-control input-sm', 'disabled']) }}
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('requested_working_unit_id', 'Requested Depot', $working_units, $issue->requisition->requested_working_unit_id, ['class'=>'form-control input-sm', 'disabled']) }}
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('product_status_id', 'Item Status', $product_statuses, $issue->requisition->product_status_id, ['class'=>'form-control input-sm', 'disabled'=>'true']) }}
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('product_type_id', 'Item Type', $product_types, $issue->requisition->product_type_id, ['class'=>'form-control input-sm', 'disabled'=>'true']) }}
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('date', 'Date', $carbon->parse($issue->requisition->date)->format('d-m-Y'), ['class'=>'form-control input-sm datepicker', 'disabled']) }}
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('forward_working_unit_id', 'Forward To', $forward_units, null, ['class'=>'form-control input-sm']) }}
                                </div>

                            </div>
                            <hr>
                            <div id="vue_app">
                            <div class="border_1" style="border: 1px solid #ddd;margin: 5px 0px;padding: 5px;">
                                <div class="row">
{{--                                     <div class="col-lg-2 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>HS Code</label>
                                            <!--<input class="form-control input-sm" type="text">-->
                                            <div class="input-group">
                                            <input type="text" class="form-control input-sm" placeholder="Search by HS code" v-model='active_record.hs_code' v-on:change='fetch_product(active_record.hs_code)' v-on:keydown.enter.prevent="add_product">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default btn-sm" type="button" v-on:click='fetch_product(active_record.hs_code)'><i class="fa fa-search" aria-hidden="true"></i></button>
                                            </span>
                                        </div><!-- /input-group -->
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-2 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Search Product</label>
                                            <!--<input class="form-control input-sm" type="text">-->
                                            <div class="input-group">
                                            <input type="text" class="form-control input-sm" placeholder="Search by name" v-model='active_record.name' v-on:change='fetch_product(active_record.name)' v-on:keydown.enter.prevent="add_product">
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
                                            <label>Issue Quantity</label>
                                            <input class="form-control input-sm" type="number" min="0" v-model='active_record.quantity' v-on:keydown.enter.prevent="add_product">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6">
                                        <button type="button" class="btn btn-success btn-sm m-t-25" v-on:click="add_product" v-bind:disabled="!active_record.id">Add</button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive m-t-20">
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width: 125px;">id</th>
                                        <th>Item name</th>
                                        <th style="width: 150px;" class="text-center">Stock</th>
                                        <th style="width: 150px;">Quantity</th>
                                        <th style="width: 150px;">Batch No</th>
                                        <th style="width: 150px;"  class="text-center">Check To Forward</th>
                                        <th style="width: 125px;" class="text-center">Delete</th>
                                    </tr>
                                    <tr v-for="(product, index) in products">
  										                  <td v-html='product.id'></td>
  										                  <td v-html='product.name'></td>
  										                  <td v-html='product.stock' class="text-right"></td>
  										                  <td>
                                          <div class="form-group">
                                              <input v-bind:name="'products['+index+'][id]'" class="form-control input-sm" type="hidden" v-bind:value='product.id'/>
                                              <input v-bind:name="'products['+index+'][quantity]'" class="form-control input-sm" type="number" v-model='product.quantity' min="0"/>
                                          </div>
  										                  </td>
                                        <td>
                                          <div class="form-group">
                                              <input v-bind:name="'products['+index+'][expiration_date]'" class="form-control input-sm" type="hidden" v-bind:value='product.expiration_date'/>
                                              <input v-bind:name="'products['+index+'][batch_no]'" class="form-control input-sm" type="text" v-model='product.batch_no' v-on:change="get_batch_stock(index)" min="0"/>
                                          </div>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" v-bind:name="'products['+index+'][forward]'" v-model="product.forward">
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

                            @if(!$issue->initial_approver()->exists())
                            {{ BootForm::hidden('approval', 'initial') }}
                            @elseif(!$issue->final_approver()->exists())
                            {{ BootForm::hidden('approval', 'final') }}
                            @endif

                            <div class="col-md-12">
                                <br />
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                  @if(!$issue->initial_approver()->exists())
                                    <button type="submit" class="btn btn-warning btn-sm">Submit Initial Approval</button>
                                  @elseif(!$issue->final_approver()->exists())
                                    <button type="submit" class="btn btn-warning btn-sm">Submit Final Approval</button>
                                  @else
                                    {!! btnSubmitGroup() !!}
                                  @endif
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
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios@0.18.0/dist/axios.min.js"></script>
<script src="{{ asset('assets/vendors/ajax_loading/ajax-loading.js') }}"></script>

<script>
$(function(){
	var vue=new Vue({
  		el: '#vue_app',
  		data:{
        config:{
          base_url: "{{ url('inventory/get-product-info/') }}",
          old_data_url: "{{ url('inventory/vue-old-products') }}",
          batch_stock_url: "{{ url('inventory/get-batch-stock') }}",
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

          requested_working_unit_id=$('#requested_working_unit_id').val();
          product_status_id=$('#product_status_id').val();
          product_type_id=$('#product_type_id').val();

          if(slug && requested_working_unit_id){

            axios.get(this.config.base_url + '/' + requested_working_unit_id + '/' + product_status_id + '/' + product_type_id + '/' +slug).then(function(response){

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
          if(this.active_record.stock > 0 && this.active_record.quantity > 0 && this.active_record.quantity <= this.active_record.stock){
            this.products.push(this.active_record);
            this.reset_active_record();
          }else{

            new PNotify({
              'title': 'Failed!',
              'text': 'Sorry!, inserted quantity amount is zero or available stock below inserted quantity.',
              'type': 'error',
              'styling': 'bootstrap3'
            });

          }
         },
         load_old:function(){
            var vm=this;
            var loading=$.loading();

            requested_working_unit_id=$('#requested_working_unit_id').val();
            product_status_id=$('#product_status_id').val();
            product_type_id=$('#product_type_id').val();

            loading.open(3000);
            axios.get(this.config.old_data_url + '/' + requested_working_unit_id + '/' + product_status_id + '/' + product_type_id).then(function(response){

              vm.products=response.data;                
              loading.close();

            }).catch(function(){

              loading.close();

            });
         },
         get_batch_stock:function(index){

          var vm=this;
          var loading = $.loading();
          loading.open(3000);

          var requested_working_unit_id=$('#requested_working_unit_id').val();
          var product_status_id=$('#product_status_id').val();
          var product_type_id=$('#product_type_id').val();
          var product=vm.products[index].id;
          var slug=vm.products[index].batch_no;

          if(!slug) slug='reset';

          axios.get(this.config.batch_stock_url + '/' + requested_working_unit_id + '/' + product_status_id + '/' + product_type_id + '/' + product + '/' +slug).then(function(response){

            vm.products[index].stock=response.data;
              
            loading.close();

          }).catch(function(){

            loading.close();

          });

         }//End of method get_batch_stock
  		},
      watch:{
        remote_data:function(){

        }
      },
      beforeMount(){
        this.load_old();
      }
	})//End of vue js

  $('.datepicker').daterangepicker({
      singleDatePicker: true,
      singleClasses: "picker_3",
      locale: {
          format: 'DD-MM-YYYY'
      }
  });

});
</script>
@endsection