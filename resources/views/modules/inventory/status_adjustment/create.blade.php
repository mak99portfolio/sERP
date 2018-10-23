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
                        <h2>Inventory status Adjustment</h2>
                        <a href="{{route('status-adjustment.index')}}" class="mb-xs mt-xs mr-xs  btn btn-primary btn-sm pull-right"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Status Adjustment List</a>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @include('partials.flash_msg')
						{{ BootForm::open(['model'=>$status_adjustment, 'store'=>'status-adjustment.store', 'update'=>'status-adjustment.update']) }}
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('inventory_status_adjustment_no', 'Adjusment No', $inventory_status_adjustment_no, ['class'=>'form-control input-sm']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('date', 'Date', null, ['class'=>'form-control input-sm datepicker']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('working_unit_id', 'Working Unit', $working_units, null, ['class'=>'form-control input-sm selectpicker','required', 'data-popup'=> route('working-unit.index')]) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('selected_type_id', 'Select Product Type', $product_types, null, ['class'=>'form-control input-sm selectpicker']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('selected_status_id', 'Select Product Status', $product_statuses, null, ['class'=>'form-control input-sm selectpicker']) }}
                                </div>

                            <div id="vue_app">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::hidden('product_id', null, ['class'=>'form-control input-sm', 'v-model'=>"product.id"]) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('name', 'Product Name', null, ['class'=>'form-control input-sm', 'v-model'=>"product.name", "v-on:change"=>"fetch_product_info(product.name)", 'suffix' => BootForm::addonButton(fa('fa-search'), ['class' => 'btn-default btn-sm', "v-on:click"=>"fetch_product_info(product.name)"])]) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::text('stock', 'Available Stock', null, ['class'=>'form-control input-sm', 'v-model'=>"product.stock", 'readonly']) }}
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('adjusted_status_id', 'Status Changed To', $product_statuses, null, ['class'=>'form-control input-sm selectpicker']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::number('quantity', 'Quantity', null, ['class'=>'form-control input-sm', 'min'=>0, "v-model"=>"product.quantity", "v-on:change"=>"check_stock"]) }}
                                </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    {{ BootForm::textarea('remarks', null, null, ['class'=>'form-control input-sm', 'rows'=>'3']) }}
                                </div>
                            </div>

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
                fetch_product_info_url: "{{ url('inventory/api/product-info-for-adjusment') }}",
                old_inputs_url: "{{ url('inventory/api/vue-old-inputs') }}"
            },
            product:{
                id:'',
                name:'',
                stock: '',
                quantity:''
            },
        },
        methods:{

            fetch_product_info:function(slug){

                var vm=this;
                var loading = $.loading();
                loading.open(3000);

                //reset models
                vm.product={
                    id:'',
                    name:'',
                    stock: '',
                    quantity:''
                }

                if(slug){

                    var working_unit=$('#working_unit_id').val();
                    var selected_pattern=$('#selected_pattern_id').val();
                    var selected_status=$('#selected_status_id').val();

                    axios.get(this.config.fetch_product_info_url + '/' + working_unit + '/' + selected_pattern + '/' + selected_status + '/' + slug).then(function(response){

                        vm.product=response.data;                
                        loading.close();

                    }).catch(function(){

                        loading.close();

                    });

                }else loading.close();

            },
            load_old:function(){

                var vm=this;
                var loading=$.loading();
                loading.open(3000);

                axios.get(this.config.old_inputs_url).then(function(response){

                    vm.product=response.data;                
                    loading.close();

                }).catch(function(){

                    loading.close();

                });//End of axios

            },
            check_stock:function(){

                if(this.product.quantity > this.product.stock){
                    alert('Adjusted Stock Qunatity Exceeds Available Stocks!.');
                    this.product.quantity=this.product.stock;
                }

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

    $(".selectpicker").select2({});

});//End of jquery
</script>
@endsection