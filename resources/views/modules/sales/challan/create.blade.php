@extends('layout')
@section('title', 'Challan')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Challan</h2>
                    <a href="{{ route('sales-challan.index')}}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-list-ul" aria-hidden="true"></i> Challan List</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="form-horizontal form-label-left input_mask" id='main'>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group ">
                                    <label for="customer_id" class="control-label">Customer</label>
                                    <select class="form-control input-sm bSelect" ref="customer_id" id="customer_id" name="customer_id" v-model="field.customer_id" v-on:change="fetch_sales_orders">
                                          <option v-for="(customer, index) in resource.customers.data" v-bind:value="customer.id" v-html="customer.name"></option>
                                    </select>
                                    {{-- <v-select label="name" :options="model.customers" v-model="field.customer_id"></v-select> --}}
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
                                    {{-- <input type="text" class="form-control input-sm datepicker" ref="challan_date" v-model="field.challan_date"/> --}}
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

                                        <div class="row" v-for="(row, index) in field.delivery_vehicles">

                                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" v-if="row.transport_agency_id">
                                                <div class="form-group">
                                                    <label for="">Transport Agency</label>
                                                    <select class="form-control input-sm select2" id="delivery_person_id" name="delivery_person_id"></select>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" v-if="row.own_vehicle_id">
                                                <div class="form-group">
                                                    <label for="">Vehicle</label>
                                                    <select class="form-control input-sm" id="own_vehicle_id" name="own_vehicle_id"></select>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Driver Name</label>
                                                    <input type="text" name="driver_name" class="form-control input-sm" readonly>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Phone No</label>
                                                    <input type="text" name="phone_no" class="form-control input-sm" readonly>
                                                </div>
                                            </div>

                                        </div>

{{--                                         <div class="row" v-for="(row, index) in field.transport_agencies">
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Transport Agency</label>
                                                    <select class="form-control input-sm select2" id="delivery_person_id" name="delivery_person_id"></select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Vehicle No</label>
                                                    <input type="text" name="vehicle_no" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Driver Name</label>
                                                    <input type="text" name="driver_name" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Phone No</label>
                                                    <input type="text" name="phone_no" class="form-control input-sm">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" v-for="(row, index) in field.customers">
                                             <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Vehicle No</label>
                                                    <input type="text" name="vehicle_no" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Driver Name</label>
                                                    <input type="text" name="driver_name" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Phone No</label>
                                                    <input type="text" name="phone_no" class="form-control input-sm">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" v-for="(row, index) in field.others">
                                             <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Vehicle No</label>
                                                    <input type="text" name="vehicle_no" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Driver Name</label>
                                                    <input type="text" name="driver_name" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Phone No</label>
                                                    <input type="text" name="phone_no" class="form-control input-sm">
                                                </div>
                                            </div>
                                        </div> --}}

                                        <h5 class="text-center" v-if='flag.add_vehicle_indication'>
                                            Add Delivery Vehicles
                                        </h5>

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
                                    {!! btnSubmitGroup() !!}
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
<script src="https://unpkg.com/vuejs-datepicker"></script>
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
                customers:"{{ url('api/resource/customers') }}",
                mushak_numbers:"{{ url('api/resource/mushak-numbers') }}",
                sales_orders:"{{ url('api/sales/challan/orders') }}",
                delivery_persons:"{{ url('api/sales/challan/delivery-persons') }}"
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
                delivery_persons:[{id:0, name:'--Select Delivery Persons--'}]
            },
            temp:null,
            flag:{
                add_vehicle_indication:true
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

                if(this.field.delivery_vehicle=='own_vehicle'){

                    alert(this.field.delivery_vehicle);

                }else if(this.field.delivery_vehicle=='transport_agency'){

                    this.field.own_vehicles.push({transport_agency_id: 10, driver_name: 'Md. Asraful Islam'});

                }else if(this.field.delivery_vehicle=='customer'){


                }else if(this.field.delivery_vehicle=='others'){


                }

            },
            remove_delivery_vehicle:function(index, delivery_medium){

            }

        },
        watch:{

            field:{
                deep:true,
                handler:function(val, oldVal){
                    
                    if(val.field.delivery_vehicles) val.flag.add_vehicle_indication=false;
                    else val.flag.add_vehicle_indication=true;

                }
            }

        },
        beforeMount(){
            this.fetch_resource(this.url.customers, this.resource.customers);
            this.fetch_resource(this.url.mushak_numbers, this.resource.mushak_numbers);
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
    })//End of vue js

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