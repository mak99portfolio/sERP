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
                    <a href="{{ route('sales-challan.index') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> Invoice List</a>
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
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group " v-bind:class="{ 'has-error': errors.sales_challan_id }">
                                    <label for="sales_challan_id" class="control-label">Sales Challan</label>
                                    <select class="form-control input-sm bSelect" ref="sales_challan_id" id="sales_challan_id" v-model="field.sales_challan_id" v-on:change="update_sales_challan">
                                          <option v-for="(row, index) in resource.sales_challans.data" v-bind:value="row.id" v-html="row.sales_challan_no"></option>
                                    </select>
                                    <span
                                        class="help-block"
                                        v-for="row in errors.sales_challan_id"
                                        v-html="row"
                                    ></span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group" v-bind:class="{ 'has-error': errors.challan_date }">
                                    <label for="challan_date" class="control-label">Challan Date</label>
                                    <input type="text" class="form-control input-sm" ref="challan_date" v-model="field.challan_date" readonly/>
                                    <span
                                        class="help-block"
                                        v-for="row in errors.challan_date"
                                        v-html="row"
                                    ></span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group" v-bind:class="{ 'has-error': errors.invoice_date }">
                                    <label for="invoice_date" class="control-label">Invoice Date</label>
                                    <vuejs-datepicker v-model="field.invoice_date" input-class="form-control input-sm"></vuejs-datepicker>
                                    <span
                                        class="help-block"
                                        v-for="row in errors.invoice_date"
                                        v-html="row"
                                    ></span>
                                </div>
                            </div>

                            <br>

                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL#</th>
                                                <th>Sales Order No</th>
                                                <th>Order Date</th>
                                                <th>Reference</th>
                                            </tr>
                                        </thead>
                                        <tbody v-for="(row, index) in resource.sales_orders.data">
                                            <tr>
                                                <td v-html="index+1"></td>
                                                <td v-html="row.sales_order_no"></td>
                                                <td v-html="dFormat(row.sales_date)"></td>
                                                <td v-html="fetch_reference(row.sales_reference_id)"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>                                    
                            </div>


                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group" v-bind:class="{ 'has-error': errors.delivery_person_id }">
                                    <label for="delivery_person_id" class="control-label">Delivery Person</label>
                                    <select class="form-control input-sm bSelect"  ref="delivery_person_id" id="delivery_person_id" name="delivery_person_id" v-model="field.delivery_person_id">
                                        <option v-for="(row, index) in resource.delivery_persons" v-bind:value="row.id" v-html="row.name"></option>
                                    </select>
                                    <span
                                        class="help-block"
                                        v-for="row in errors.delivery_person_id"
                                        v-html="row"
                                    ></span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group" v-bind:class="{ 'has-error': errors.shipping_address_id }">
                                    <label for="shipping_address_id" class="control-label">Shipping Address</label>
                                    <select class="form-control input-sm bSelect"  ref="shipping_address_id" id="shipping_address_id" v-model="field.shipping_address_id">
                                        <option v-for="(row, index) in resource.customer_addresses.data
                                        " v-bind:value="row.id" v-html="row.address"></option>
                                    </select>
                                    <span
                                        class="help-block"
                                        v-for="row in errors.shipping_address_id"
                                        v-html="row"
                                    ></span>
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
                                                            <select
                                                                class="form-control input-sm"
                                                                v-model="row.own_vehicle_id"
                                                                v-on:change="update_own_vehicle(index)"
                                                            >
                                                                <option
                                                                    v-for="(row, index) in resource.own_vehicles.data"
                                                                    v-bind:value="row.id"
                                                                    v-html="row.vehicle_no"
                                                                ></option>
                                                            </select>
                                                        </td>
                                                        <td v-else-if="row.transport_agency_id">
                                                            <select class="form-control input-sm" v-model="row.transport_agency_id">
                                                                  <option v-for="(row, index) in resource.vendors.data" v-bind:value="row.id" v-html="row.name"></option>
                                                            </select>
                                                        </td>
                                                        <td v-else></td>
                                                        <td>
                                                            <input
                                                                type="text"
                                                                name="vehicle_no"
                                                                class="form-control input-sm"
                                                                v-model="row.vehicle_no"
                                                                v-bind:readonly="row.own_vehicle_id"
                                                            />
                                                        </td>
                                                        <td>
                                                            <input
                                                                type="text"
                                                                name="driver_name"
                                                                class="form-control input-sm"
                                                                v-model="row.driver_name"
                                                                v-bind:readonly="row.own_vehicle_id"
                                                            />
                                                        </td>
                                                        <td>
                                                            <input
                                                                type="text"
                                                                name="phone_no"
                                                                class="form-control input-sm"
                                                                v-model="row.phone_no"
                                                                {{-- v-bind:readonly="row.own_vehicle_id" --}}
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
                                                        <th>Product Name</th>
                                                        <th>Sales Order Quantity</th>
                                                        <th>Receive Quantity</th>
                                                        <th>Intransit</th>
                                                        <th>Pending</th>
                                                        <th>Challan Quantity</th>
                                                        <th>Remove</th>
                                                    </tr>
                                                </thead>
                                                <tbody v-for="(row, index) in field.sales_order_items">
                                                    <tr>
                                                        <td colspan="7" class="text-center" v-html="'Sales Order No: '+row.sales_order_no"></td>
                                                    </tr>
                                                    <tr v-for="(inner_row, inner_index) in row.items">
                                                        <td v-html="inner_row.product.name"></td>
                                                        <td v-html="inner_row.quantity"></td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>
                                                            <input
                                                                class="form-control input-sm"
                                                                type="number"
                                                                v-model="inner_row.challan_quantity"
                                                                v-on:change="total_challan_quantity"
                                                            />
                                                        </td>
                                                        <td>
                                                            <button
                                                                type="button"
                                                                class="btn btn-default btn-sm"
                                                                v-on:click="remove_order_item(index, inner_index)"
                                                            >
                                                                <i class="fa fa-times-circle fa-lg text-danger" aria-hidden="true"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="5" class="text-right">Total Challan Quantity</td>
                                                        <td v-html="field.total_challan_quantity" colspan="2"></td>
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
                                    {{-- {!! btnSubmitGroup() !!} --}}
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

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios@0.18.0/dist/axios.min.js"></script>
<script src="{{ asset('assets/vendors/ajax_loading/ajax-loading.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuejs-datepicker@1.5.3/dist/vuejs-datepicker.min.js"></script>
<script src="https://unpkg.com/vue-select@latest"></script>

<script>
$(function(){
    //Vue.component('v-select', VueSelect.VueSelect);
    var vue=new Vue({
        el: '#main',
        components:{
            vuejsDatepicker
        },
        data:{
            url:{
                resource:"{{ url('api/resource') }}",
                sales_orders:"{{ url('api/sales/challan/orders') }}",
                delivery_persons:"{{ url('api/sales/challan/delivery-persons') }}",
                sales_order_items:"{{ url('api/sales/challan/sales-orders-items') }}",
                customer_addresses:"{{ url('api/sales/challan/customer-addresses') }}",
                submit:"{{ route('sales-challan.store') }}"
            },
            field:{
                csrf_token: "{{ csrf_token() }}",
                customer_id:'',
                sales_orders:[],
                challan_date: '',
                invoice_date: Date.now(),
                mushak_number_id:'',
                delivery_person_id:'',
                delivery_vehicle:'',
                delivery_vehicles:[],
                sales_order_items:[],
                total_challan_quantity:0,
                shipping_address_id:''
            },
            resource:{
                sales_challans:{
                    data:[{id:0, name:'--Select Customers--'}]
                },
                delivery_vehicles:[
                    {id: 'own_vehicle', name: 'Own Vehicle'},
                    {id: 'transport_agency', name: 'Transport Agency'},
                    {id: 'customer', name: 'Customer'},
                    {id: 'others', name: 'Others'},
                ],
                sales_orders:{
                    data:[]
                },
                delivery_persons:[{id:0, name:'--Select Delivery Persons--'}],
                own_vehicles:{
                    data:[{id:0, vehicle_no:'--Select Own Vehicle--'}]
                },
                employees:{
                    data:[{id:0, name:'--Select Employee--'}]
                },
                vendors:{
                    data:[{id:0, name:'--Select Transport Agency--'}]
                },
                customer_addresses:{
                    data:[{id:0, address:'--Select Customer Address--'}]
                }
            },
            temp:null,
            errors_msg:false,
            errors:null
        },
        methods:{
            dFormat:function(val){
                return moment(val).format('DD MMM YYYY');
            },
            parse_num:function(val){
                if(typeof val=='undefined'){
                    return 0.00;
                }else if(parseFloat(val)){
                    return parseFloat(val);
                }else return 0.00;
            },
            alert:function(msg='Sorry!, try again later.', type='error'){
                new PNotify({
                  title: 'Message',
                  text: msg,
                  type: type,
                  styling: 'bootstrap3'
                });
            },
            fetch_resource:function(url, reference, callback=null, params=null){

                var loading=$.loading();
                loading.open(3000);

                axios.get(url, {params: params}).then(function(response){

                    reference.data=response.data.data;
                    loading.close();
                    if(typeof callback==='function'){
                        callback();
                    }

                }).catch(function(){

                    loading.close();
                    ref.alert('Sorry!, failed to fetch remote data.');


                });

            },
            update_sales_challan:function(){

                var ref=this;

                if(!ref.field.sales_challan_id){
                    ref.alert('Please!, select a challan.');
                    return false;
                }

                var selected_challan=this.resource.sales_challans.data.find(row=>{
                    return row.id==this.field.sales_challan_id;
                });

                this.resource.sales_orders.data=selected_challan.sales_orders;
                this.field.challan_date=moment(selected_challan.challan_date).format('DD MMM YYYY');

                //this.fetch_resource(this.resource + '/sales-orders', this.resource.sales_orders);

            },
            fetch_reference:function(id){
                var referer=this.resource.employees.data.find(row=>{
                    return row.id==id;
                })

                return referer.name;
            },
            fetch_sales_orders:function(){

                var ref=this;
                var loading=$.loading();
                loading.open(3000);

                if(!ref.field.customer_id){
                    ref.alert('Please!, select a challan.');
                    loading.close();
                    return false;
                }

                ref.fetch_resource(ref.url.resource + '/customer-address', ref.resource.customer_addresses, function(){
                    ref.field.shipping_address_id='';
                    ref.resource.customer_addresses.data=ref.resource.customer_addresses.data.filter(row=>{
                        return row.customer_id==ref.field.customer_id;
                    });
                });

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

                    first_own_vehicle=this.resource.own_vehicles.data[0];
                    var driver=this.resource.employees.data.find(row=>{
                        return row.id==first_own_vehicle.employee_profile_id;
                    });

                    this.field.delivery_vehicles.push({
                        medium_name: medium_name,
                        delivery_medium: ref.field.delivery_vehicle,
                        own_vehicle_id: first_own_vehicle.id,
                        vehicle_no: first_own_vehicle.vehicle_no,
                        driver_name: driver.name,
                        phone_no: ''
                    });

                }else if(this.field.delivery_vehicle=='transport_agency'){

                    this.field.delivery_vehicles.push({
                        medium_name: medium_name,
                        delivery_medium: ref.field.delivery_vehicle,
                        transport_agency_id: 1,
                        vehicle_no: '',
                        driver_name: '',
                        phone_no: ''
                    });

                }else if(this.field.delivery_vehicle=='customer'){

                    this.field.delivery_vehicles.push({
                        medium_name: medium_name,
                        delivery_medium: ref.field.delivery_vehicle,
                        vehicle_no: '',
                        driver_name: '',
                        phone_no: ''
                    });

                }else if(this.field.delivery_vehicle=='others'){

                    this.field.delivery_vehicles.push({
                        medium_name: medium_name,
                        delivery_medium: ref.field.delivery_vehicle,
                        vehicle_no: '',
                        driver_name: '',
                        phone_no: ''
                    });
                }

                this.field.delivery_vehicle='';

            },
            remove_delivery_vehicle:function(index){
                this.field.delivery_vehicles.splice(index, 1);
            },
            remove_order_item:function(index, inner_index){
                this.field.sales_order_items[index].items.splice(inner_index, 1);
                if(this.field.sales_order_items[index].items.length < 1){
                    this.field.sales_order_items.splice(index, 1);
                }
                this.total_challan_quantity();
            },
            update_own_vehicle:function(index){

                var own_vehicle_id=this.field.delivery_vehicles[index].own_vehicle_id;

                var own_vehicle=this.resource.own_vehicles.data.find(row=>{
                    return row.id==own_vehicle_id;
                });

                var driver=this.resource.employees.data.find(row=>{
                    return row.id==own_vehicle.employee_profile_id;
                });

                this.field.delivery_vehicles[index].driver_name=driver.name;
                this.field.delivery_vehicles[index].vehicle_no=own_vehicle.vehicle_no;

            },
            update_sales_order_list:function(){
                var ref=this;
                var sales_order_ids=this.field.sales_orders;

                //return console.log(sales_order_ids);

                var loading=$.loading();
                loading.open(3000);

                if(!sales_order_ids){
                    ref.alert('Please!, select a sales order.');
                    loading.close();
                    return false;
                }

                axios.get(ref.url.sales_order_items, {params: sales_order_ids}).then(function(response){

                    ref.field.sales_order_items=response.data;
                    loading.close();

                }).catch(function(){

                    loading.close();
                    ref.alert('Sorry!, failed to fetch remote data.');


                });

            },
            total_challan_quantity:function(){

                var ref=this;
                ref.field.total_challan_quantity=0;
                ref.field.sales_order_items.forEach(function(row){

                    //console.log(row);
                    row.items.forEach(function(inner_row){
                        ref.field.total_challan_quantity+=ref.parse_num(inner_row.challan_quantity);
                    });

                });

            },
            submit:function(){

                var ref=this;

                //if(ref.field.total_challan_quantity)

                this.reset_error();

                axios({
                    method: 'post',
                    url: ref.url.submit,
                    data: ref.field,
                    config: { headers: {'Content-Type': 'multipart/form-data' }}
                }).then(function(response){

                    ref.alert(response.data, 'success');
                    window.location.replace("{{ route('sales-challan.index') }}");

                    //console.log(response);
                }).catch(function (error){

                    ref.errors_msg=true;
                    ref.errors=error.response.data;
                    //ref.alert('Sorry!, form submit validation failed.');

                });

            },
            reset_error:function(){

                this.errors_msg=false;

                this.errors={
                    customer_id:false,
                    sales_orders:false,
                    challan_date:false,
                    mushak_number_id:false,
                    delivery_person_id:false,
                    shipping_address_id:false
                }

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
            this.fetch_resource(this.url.resource + '/sales-challan', this.resource.sales_challans, null, {with:['sales_orders']});
            //this.fetch_resource(this.url.resource + '/sales-order', this.resource.sales_orders);
            this.fetch_resource(this.url.resource + '/own-vehicle', this.resource.own_vehicles);
            this.fetch_resource(this.url.resource + '/employee-profile', this.resource.employees);
            this.fetch_resource(this.url.resource + '/vendor', this.resource.vendors);
            //this.fetch_resource(this.url.resource + '/customer-address', this.resource.customer_addresses);
            this.fetch_delivery_persons();
            this.reset_error();
            //this.resource.customers=this.temp.data;
            //this.model.customers=this.temp;
        },//End of beforeMount
        updated(){
            $(this.$refs.sales_challan_id).selectpicker('refresh');
            $(this.$refs.sales_orders).selectpicker('refresh');
            $(this.$refs.delivery_person_id).selectpicker('refresh');
            $(this.$refs.delivery_vehicle).selectpicker('refresh');
            $(this.$refs.shipping_address_id).selectpicker('refresh');
        }//end of updated
    });//End of vue js

    $('.datepicker').daterangepicker({
      singleDatePicker: true,
      singleClasses: "picker_3",
      locale: {
          format: 'DD-MMM-YYYY'
      }
    });
    //$('.datepicker').datetimepicker();

    $('.bSelect').selectpicker({
        liveSearch:true,
        size:5
    });

});
</script>
@endsection