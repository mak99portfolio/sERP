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
						              {{ BootForm::open(['model'=>$issue, 'store'=>'issue.store', 'update'=>'issue.update']) }}
                              <div id="vue_app">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    {{ BootForm::text('inventory_requisition_no', 'Requisition No', null, ['class'=>'input-sm', 'suffix' => BootForm::addonButton(fa('fa-search fa-lg text-primary'), ['class' => 'btn-default btn-sm', 'v-on:click'=>'fetch_requisition']), 'v-model'=>'inventory_requisition_no', 'v-on:change'=>'fetch_requisition', 'v-on:keydown.enter.prevent'=>'fetch_requisition']) }}
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    {{ BootForm::text('requisition[type][name]', 'Requisition Type', null, ['class'=>'input-sm', 'readonly'=>'true', 'v-model'=>'requisition.type.name']) }}
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    {{ BootForm::text('requisition[sender][name]', 'Requisition Sender Depot', null, ['class'=>'input-sm', 'readonly', 'v-model'=>'requisition.sender.name']) }}
                                </div>

                                {{-- {{ BootForm::hidden('requested_working_unit_id', $requested_depot->id) }} --}}

                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    {{ BootForm::text('requisition[item_status][name]', 'Product Status', null, ['class'=>'form-control input-sm', 'readonly'=>'true', 'v-model'=>'requisition.item_status.name']) }}
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    {{ BootForm::text('requisition[item_type][name]', 'Product Type', null, ['class'=>'form-control input-sm', 'readonly'=>'true', 'v-model'=>'requisition.item_type.name']) }}
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    {{ BootForm::select('forward_working_unit_id', 'Forward To', $forward_units, null, ['class'=>'form-control input-sm']) }}
                                </div>

                            </div>
                            <hr>
                            {{-- <div id="vue_app"> --}}
                            <div class="table-responsive m-t-20">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Item name</th>
                                        <th style="width: 150px;" class="text-center">Stock</th>
                                        <th style="width: 150px;">Requested Quantity</th>
                                        <th style="width: 150px;">Issue Quantity</th>
                                        <th style="width: 150px;">Batch No</th>
                                        <th style="width: 150px;" class="text-center">Check To Forward</th>
                                        <th style="width: 125px;" class="text-center">Delete</th>
                                    </tr>
                                    <tr v-for="(product, index) in products">
  										                  <td v-html='product.name'></td>
  										                  <td v-html='product.stock' class="text-right"></td>
                                        <td v-html="product.requested_quantity" class="text-right"></td>
  										                  <td>
                                          <div class="form-group">
                                              <input v-bind:name="'products['+index+'][id]'" class="form-control input-sm" type="hidden" v-bind:value='product.id'/>
                                              <input v-bind:name="'products['+index+'][name]'" class="form-control input-sm" type="hidden" v-bind:value='product.name'/>
                                              <input v-bind:name="'products['+index+'][stock]'" class="form-control input-sm" type="hidden" v-bind:value='product.stock'/>
                                              <input v-bind:name="'products['+index+'][requested_quantity]'" class="form-control input-sm" type="hidden" v-bind:value='product.requested_quantity'/>
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
          requisition: "{{ url('inventory/api/fetch-requisition') }}"
        },
  			products:{!! old('products')?collect(old('products'))->toJson():'[]' !!},
        inventory_requisition_no:'{{ old('inventory_requisition_no') }}',
        requisition:{}
  		},
  		methods:{
        alert:function(msg='Sorry!, try again later.', type='error'){

            new PNotify({
              title: 'Message',
              text: msg,
              type: type,
              styling: 'bootstrap3'
            });

        },
        reset_requisition(old=null){

          var ref=this;

          if(old){

            ref.requisition=old;

          }else{

            ref.requisition={
              type:{
                name:''
              },
              sender:{
                name:''
              },
              item_status:{
                name:''
              },
              item_type:{
                name:''
              }
            }

          }

        },
        fetch_requisition:function(){
          
          var ref=this;
          var requested_working_unit_id={{ $requested_depot->id }};

          if(ref.inventory_requisition_no){

            ref.reset_requisition();
            ref.products=[];
            var loading = $.loading();
            loading.open(3000);

            axios.get(ref.config.requisition + '/' + requested_working_unit_id + '/' + ref.inventory_requisition_no).then(function(response){

              loading.close();

              if(response.data){

                ref.requisition=response.data.requisition;
                ref.products=response.data.products;

              }else ref.alert('Sorry!, requested requsition does not found.');

            }).catch(function(){

              loading.close();
              ref.alert('Sorry!, requested requsition does not found.');

            });

          }else{

            ref.alert('Please!, insert requisition number.');

          }

        },
  			delete_product:function(product){
			    this.products.splice(this.products.indexOf(product), 1);
  			 },
         load_old:function(){
            var ref=this;
            var loading=$.loading();

            requested_working_unit_id=$('#requested_working_unit_id').val();
            product_status_id=$('#product_status_id').val();
            product_type_id=$('#product_type_id').val();

            loading.open(3000);
            axios.get(this.config.old_data_url + '/' + requested_working_unit_id + '/' + product_status_id + '/' + product_type_id).then(function(response){

              ref.products=response.data;                
              loading.close();

            }).catch(function(){

              loading.close();

            });
         },
         get_batch_stock:function(index){

          var ref=this;
          var loading = $.loading();
          loading.open(3000);

          var requested_working_unit_id=$('#requested_working_unit_id').val();
          var product_status_id=$('#product_status_id').val();
          var product_type_id=$('#product_type_id').val();
          var product=ref.products[index].id;
          var slug=ref.products[index].batch_no;

          if(!slug) slug='reset';

          axios.get(this.config.batch_stock_url + '/' + requested_working_unit_id + '/' + product_status_id + '/' + product_type_id + '/' + product + '/' +slug).then(function(response){

            ref.products[index].stock=response.data;
              
            loading.close();

          }).catch(function(){

            loading.close();

          });

         }//End of method get_batch_stock
  		},
      beforeMount(){
        this.reset_requisition({!! old('requisition')?collect(old('requisition'))->toJson():'null' !!});
        //this.load_old();
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