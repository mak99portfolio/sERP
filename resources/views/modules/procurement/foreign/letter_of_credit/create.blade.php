@extends('layout')
@section('title', 'Lc details')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Procurement</h3>
    </div>
</div>
<div class="clearfix"></div>
{{-- Content here --}}

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2> LC detail <small>Form</small></h2>
                <a href="#" class="mb-xs mt-xs mr-xs  btn btn-success btn-sm pull-right"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; List</a>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                 
                {{-- <form class="form-horizontal form-label-left"> --}}
                   
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>LC No.</label>
                                        <input class="form-control input-sm" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>LC Date</label>
                                        <input class="form-control input-sm" type="text">
                                    </div>
                                </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>LC Status </label>
                                    <select class="form-control input-sm">
                                        <option value="" disabled selected> Select status</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Vendor </label>
                                    <select class="form-control input-sm">
                                        <option value="" disabled selected> Select vendor</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Currency </label>
                                    <select class="form-control input-sm">
                                        <option value="" disabled selected> Select currency</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div> 

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                        <label>Requisition</label>
                                        <input class="form-control input-sm" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>LC Expire Date</label>
                                        <input class="form-control input-sm" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>LC Shipment Date</label>
                                        <input class="form-control input-sm" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>LC Shipment Date</label>
                                        <input class="form-control input-sm" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                        <label>Requisition</label>
                                        <input class="form-control input-sm" type="text">
                                    </div>
                                </div>
                                


                            </div>
                        </div>
                    </div>
                 
                    <div class="col-md-12">
                        <br />
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <a href="#" class="btn">Save</a>
                       </div>
                   </div>
           </div>
       </div>
   </div>
</div>


{{-- Content end --}}
</div>
</div>
@endsection