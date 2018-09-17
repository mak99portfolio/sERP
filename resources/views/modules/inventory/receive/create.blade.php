@extends('layout')
@section('title', 'Receive Item')
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
                        <h2>Receive Item</h2>
                        <a href="{{route('receive.index')}}" class="mb-xs mt-xs mr-xs  btn btn-success btn-sm pull-right"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Receive Item List</a>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <!-- Nav tabs -->

                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"title="Receive Internal"><i class="fa fa-industry" aria-hidden="true"></i> <span class="hidden-xs">Receive Internal</span></a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"title="Receive Agains PO"><i class="fa fa-truck" aria-hidden="true"></i> <span class="hidden-xs">Receive Agains PO</span></a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false"title="Receive Agains Issue"><i class="fa fa-truck" aria-hidden="true"></i> <span class="hidden-xs">Receive Agains Issue</span></a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                    <form class="form-horizontal form-label-left">

                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Product Name</label>
                                                    <input class="form-control input-sm" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Product Name</label>
                                                    <input class="form-control input-sm" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Product Name</label>
                                                    <input class="form-control input-sm" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                                        booth letterpress, commodo enim craft beer mlkshk aliquip</p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                    <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                                        booth letterpress, commodo enim craft beer mlkshk </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <br />
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                {!! btnSubmitGroup() !!}
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