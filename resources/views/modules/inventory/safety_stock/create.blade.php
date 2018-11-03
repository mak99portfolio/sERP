@extends('layout')
@section('title', 'Safety Stock')
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
                        <h2>Add / Edit Safety Stock</h2>
                        <a href="{{route('safety-stock.index')}}" class="mb-xs mt-xs mr-xs  btn btn-success btn-sm pull-right"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Safety Stock List</a>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @include('partials.flash_msg')
						            {{ BootForm::open(['model'=>$safety_stock, 'store'=>'safety-stock.store', 'update'=>'safety-stock.update']) }}
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('working_unit_id', 'Working Unit', $working_units, null, ['class'=>'input-sm select2']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::select('product_id', 'Product', $products, null, ['class'=>'input-sm select2']) }}
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    {{ BootForm::number('safety_quantity', 'Safety Stock Quantity', null, ['class'=>'input-sm']) }}
                                </div>
                                <div class="col-md-12">
                                    <div class="ln_solid"></div>
                                    <div class="form-group">{!! btnSubmitGroup() !!}</div>
                                </div>
                            {{ BootForm::close() }}
                            </div>
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

  var safety_stock_url="{{ url('inventory/api/fetch-safety-stock') }}";
  var working_unit_id=$('#working_unit_id');
  var product_id=$('#product_id');
  var safety_quantity=$('#safety_quantity');

  $.get(safety_stock_url + '/' + working_unit_id.val() + '/' + product_id.val(), function(response){
      safety_quantity.val(response);
  });

  working_unit_id.on('change', function(){

      $.get(safety_stock_url + '/' + working_unit_id.val() + '/' + product_id.val(), function(response){
        safety_quantity.val(response);
      });

  });

  product_id.on('change', function(){

      $.get(safety_stock_url + '/' + working_unit_id.val() + '/' + product_id.val(), function(response){
        safety_quantity.val(response);
      });
      
  });

});
</script>
@endsection