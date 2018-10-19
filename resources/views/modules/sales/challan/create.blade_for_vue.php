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
                    <div id="app">
                        <sales-challan-component></sales-challan-component>
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
<script src="{{ asset('js/app.js') }}" defer></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/axios@0.18.0/dist/axios.min.js"></script> --}}
<script src="{{ asset('assets/vendors/ajax_loading/ajax-loading.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
{{-- <script src="https://unpkg.com/vuejs-datepicker"></script> --}}
{{-- <script src="https://unpkg.com/vue-select@latest"></script> --}}

<script>
$(function(){

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