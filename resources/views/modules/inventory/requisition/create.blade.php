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
						{{ BootForm::open(['model'=>$inventory_requisition, 'store'=>'requisition.store', 'update'=>'requisition.update']) }}
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('requisition_no', null, $requisition_no, ['class'=>'form-control input-sm', 'disabled'=>'true']) }}
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('inventory_requisition_type_id', 'Select Requisition Type', $inventory_requisition_types, null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('sender_depot_id', 'Requisition Sender Depot', $working_units, null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('requested_depot_id', 'Requested Depot', $working_units, null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('inventory_item_status', 'Item Status', $inventory_item_statuses, null, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('date', 'Select Date', null, ['class'=>'form-control input-sm datepicker']) }}
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
                                            <label>Available Quantity</label>
                                            <input class="form-control input-sm" type="text" v-model='active_record.stock' readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Requested Quantity</label>
                                            <input class="form-control input-sm" type="text" v-model='active_record.quantity'>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6">
                                        <button class="btn btn-success btn-md m-t-20">Add</button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive m-t-20">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>id</th>
                                        <th>Item name</th>
                                        <th>Stock</th>
                                        <th>Quantity</th>
                                        <th>Delete</th>
                                    </tr>
                                    <tr v-for="product in products">
  										<td v-html='product.id'></td>
  										<td v-html='product.name'></td>
  										<td v-html='product.stock'></td>
  										<td>
	                                        <div class="form-group">
	                                            <input class="form-control input-sm" type="number" v-model='product.quantity' min="0">
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
<script>
$(function(){
	var vue=new Vue({
  		el: '#vue_app',
  		data:{
  			base_url: "{{ url('inventory/get-product-info/') }}",
  			products:[
  				{id:1, name:'First Table', stock:10, quantity:8},
  				{id:2, name:'Second Table', stock:15, quantity:10}
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

  				var self=this;

  				axios.get(this.base_url +'/'+ slug).then(function(response){

  					console.log(response.data);
  					self.remote_data=response.data;
  					//alert(self.remote_data);
  				});

  			},
  			delete_product:function(product){
			    this.products.splice(this.products.indexOf(product), 1);
			}
  		}
	})//End of vue js

});
</script>
@endsection