<template>
<div class="form-horizontal form-label-left input_mask">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group ">
                <label for="customer_id" class="control-label">Customer</label>
                <select class="form-control input-sm bSelect" ref="customer_id" id="customer_id" name="customer_id" v-model="field.customer_id" v-on:change="fetch_sales_orders">
                      <option v-for="(customer, index) in resource.customers.data" v-bind:value="customer.id" v-html="customer.name"></option>
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group ">
                <label for="sales_orders[]" class="control-label">Sales Orders</label>
                <select class="form-control input-sm bSelect" id="sales_orders" ref='sales_orders' name="sales_orders" v-model="field.sales_orders" multiple>
                    <option v-for="(row, index) in resource.sales_orders" v-bind:value="row.id" v-html="row.sales_order_no"></option>
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group ">
                <label for="challan_date" class="control-label">Challan Date</label>
                <vuejs-datepicker v-model="field.challan_date" input-class="form-control input-sm"></vuejs-datepicker>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group ">
                <label for="mushak_id" class="control-label">Mushak No</label>
                <select class="form-control input-sm bSelect" ref="mushak_id" id="mushak_id" name="mushak_id" v-model="field.mushak_id">
                    <option v-for="(row, index) in resource.mushak_numbers.data" v-bind:value="row.id" v-html="row.name"></option>
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group ">
                <label for="delivery_person_id" class="control-label">Delivery Person</label>
                <select class="form-control input-sm bSelect"  ref="delivery_person_id" id="delivery_person_id" name="delivery_person_id" v-model="field.delivery_person_id">
                    <option v-for="(row, index) in resource.delivery_persons" v-bind:value="row.id" v-html="row.name"></option>
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group ">
                <label for="shipping_address" class="control-label">Shipping Address</label>
                <textarea class="form-control input-sm" rows="2" id="shipping_address" name="shipping_address" cols="50" v-model="field.shipping_address"></textarea>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="">Delivery Vehicle</label>
                <div class="input-group">

                    <select name="delivery_vehicle" class="form-control input-sm bSelect" ref="delivery_vehicle" v-model="field.delivery_vehicle">
                        <option v-for="(row, index) in resource.delivery_vehicles" v-bind:value="row.id" v-html="row.name"></option>
                    </select>

                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button" v-on:click="add_delivery_vehicle">
                         <span class="fa fa-lg fa-plus-circle text-primary"></span>
                      </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">Delivery Vehicles</div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table table-condensed table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Delivery Medium</th>
                                    <th>Select Vehicle</th>
                                    <th>Vehicle No</th>
                                    <th>Driver name</th>
                                    <th>Phone Number</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(row, index) in field.delivery_vehicles">
                                    <td v-html="row.medium_name"></td>
                                    <td v-if="row.own_vehicle_id">
                                        <select class="form-control input-sm" v-model="row.own_vehicle_id">
                                              <option v-for="(row, index) in resource.own_vehicles.data" v-bind:value="row.id" v-html="row.vehicle_no"></option>
                                        </select>
                                    </td>
                                    <td v-else-if="row.transport_agency_id">
                                        <select class="form-control input-sm" v-model="row.transport_agency_id">
                                              <option v-for="(row, index) in resource.customers.data" v-bind:value="row.id" v-html="row.name"></option>
                                        </select>
                                    </td>
                                    <td v-else></td>
                                    <td>
                                        <input
                                            type="text"
                                            name="vehicle_no"
                                            class="form-control input-sm"
                                            v-model="row.vehicle_no"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            name="driver_name"
                                            class="form-control input-sm"
                                            v-model="row.driver_name"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            name="phone_no"
                                            class="form-control input-sm"
                                            v-model="row.phone_no"
                                        />
                                    </td>
                                    <td>
                                        <button
                                            type="button"
                                            class="btn btn-default btn-sm"
                                            v-on:click="remove_delivery_vehicle(index)"
                                        >
                                            <i class="fa fa-times-circle fa-lg text-danger" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">Table Of Product</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product Names</th>
                                    <th>Sales Order Quantity</th>
                                    <th>Receive Quantity</th>
                                    <th>Intransit</th>
                                    <th>Pending</th>
                                    <th>Challan Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>aa</td>
                                    <td>5</td>
                                    <td>8</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right">Total Challan Quantity</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="ln_solid"></div>
			<div class="form-group">
				<div class="btn-group">
					<button type="submit" class="btn btn-default">
						<i class="fa text-info fa-rocket fa-lg"></i> Submit
					</button>
				</div>
			</div>
        </div>
    </div>
</div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';

export default {
        components:{
            Datepicker
        },
        data(){
        	return {
	            url:{
	                resource: "http://localhost:8000/api/resource",
	                sales_orders: "http://localhost:8000/api/sales/challan/orders",
	                delivery_persons: "http://localhost:8000/api/sales/challan/delivery-persons"
	            },
	            field:{
	                customer_id:'',
	                sales_orders:[],
	                challan_date:'',
	                mushak_id:'',
	                delivery_person_id:'',
	                shipping_address:'',
	                delivery_vehicle:'',
	                delivery_vehicles:[]
	            },
	            resource:{
	                customers:{
	                    data:[{id:0, name:'--Select Customers--'}]
	                },
	                mushak_numbers:{
	                    data:[{id:0, name:'--Select Mushak Number--'}]
	                },
	                delivery_vehicles:[
	                    {id: 'own_vehicle', name: 'Own Vehicle'},
	                    {id: 'transport_agency', name: 'Transport Agency'},
	                    {id: 'customer', name: 'Customer'},
	                    {id: 'others', name: 'Others'},
	                ],
	                sales_orders:[{id:0, name:'--Select orders--'}],
	                delivery_persons:[{id:0, name:'--Select Delivery Persons--'}],
	                own_vehicles:{
	                    data:[{id:0, name:'--Select Own Vehicle--'}]
	                }
	            },
	            temp:null,
	            flag:{
	                add_vehicle_indication:true
	            }
	        }
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
            fetch_resource:function(url, reference){

                var loading=$.loading();
                loading.open(3000);

                axios.get(url).then(function(response){

                    reference.data=response.data.data;
                    loading.close();

                }).catch(function(){

                    loading.close();
                    ref.alert('Sorry!, failed to fetch remote data.');


                });

            },
            fetch_sales_orders:function(){

                var ref=this;
                var loading=$.loading();
                loading.open(3000);

                if(!ref.field.customer_id){
                    ref.alert('Please!, select a customer.');
                    loading.close();
                    return false;
                }

                ref.resource.customers.data.filter(row=>{
                    //return obj.id===ref.field.customer_id;
                    if(row.id==ref.field.customer_id){
                        ref.field.shipping_address=row.address;
                    }
                })

                axios.get(ref.url.sales_orders + '/' + ref.field.customer_id).then(function(response){

                    ref.resource.sales_orders=response.data;
                    loading.close();

                }).catch(function(){

                    loading.close();
                    ref.alert('Sorry!, failed to fetch remote data.');


                });

            },
            fetch_delivery_persons:function(){
                var ref=this;
                var loading=$.loading();
                loading.open(3000);

                axios.get(ref.url.delivery_persons).then(function(response){

                    ref.resource.delivery_persons=response.data;
                    loading.close();

                }).catch(function(){

                    loading.close();
                    ref.alert('Sorry!, failed to fetch remote data.');


                });
            },
            add_delivery_vehicle:function(){

                var ref=this;

                var medium_name=ref.resource.delivery_vehicles.find(row=>{
                    return row.id==ref.field.delivery_vehicle;
                }).name;

                if(this.field.delivery_vehicle=='own_vehicle'){

                    this.field.delivery_vehicles.push({
                        medium_name: medium_name,
                        delivery_medium: ref.field.delivery_vehicle,
                        own_vehicle_id: 1,
                        vehicle_no: 0,
                        driver_name: '',
                        phone_no: ''
                    });

                }else if(this.field.delivery_vehicle=='transport_agency'){

                    this.field.delivery_vehicles.push({
                        medium_name: medium_name,
                        delivery_medium: ref.field.delivery_vehicle,
                        transport_agency_id: 1,
                        vehicle_no: 0,
                        driver_name: '',
                        phone_no: ''
                    });

                }else if(this.field.delivery_vehicle=='customer'){

                    this.field.delivery_vehicles.push({
                        medium_name: medium_name,
                        delivery_medium: ref.field.delivery_vehicle,
                        vehicle_no: 0,
                        driver_name: '',
                        phone_no: ''
                    });

                }else if(this.field.delivery_vehicle=='others'){

                    this.field.delivery_vehicles.push({
                        medium_name: medium_name,
                        delivery_medium: ref.field.delivery_vehicle,
                        vehicle_no: 0,
                        driver_name: '',
                        phone_no: ''
                    });
                }

            },
            remove_delivery_vehicle:function(index){
            	alert(index);
            	this.field.delivery_vehicles.splice(index, 1);
            }

        },
        watch:{

            field:{
                deep:true,
                handler:function(val, oldVal){
                    
                    //if(val.field.delivery_vehicles) val.flag.add_vehicle_indication=false;
                    //else val.flag.add_vehicle_indication=true;

                }
            }

        },
        beforeMount(){
            this.fetch_resource(this.url.resource + '/customer', this.resource.customers);
            this.fetch_resource(this.url.resource + '/mushak-number', this.resource.mushak_numbers);
            this.fetch_resource(this.url.resource + '/own-vehicle', this.resource.own_vehicles);
            this.fetch_delivery_persons();
            //this.resource.customers=this.temp.data;
            //this.model.customers=this.temp;
        },//End of beforeMount
        updated(){
            $(this.$refs.customer_id).selectpicker('refresh');
            $(this.$refs.mushak_id).selectpicker('refresh');
            $(this.$refs.sales_orders).selectpicker('refresh');
            $(this.$refs.delivery_person_id).selectpicker('refresh');
            $(this.$refs.delivery_vehicle).selectpicker('refresh');
        }//end of updated
}
</script>