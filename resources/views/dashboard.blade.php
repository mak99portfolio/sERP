@extends('layout')
@section('title', 'Dashboard')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Dashboard</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        <div class="row">
                            <div class="application">
                                <div class="col-xs-4 col-sm-3 col-md-2">
                                    <a class="#">
                                        <div class="action_ap text-center" style="background-color: #75CDDC">
                                            <i class="fa fa-4x fa-truck"></i>
                                        </div>
                                    </a>
                                    <div class="discuss text-center">Procurement</div>
                                </div>
                                <div class="col-xs-4 col-sm-3 col-md-2">
                                    <a class="#">
                                        <div class="action_ap text-center" style="background-color: #F96262">
                                            <i class="fa fa-4x fa-hdd-o"></i>
                                        </div>
                                    </a>
                                    <div class="discuss text-center">Inventory</div>
                                </div>
                                <div class="col-xs-4 col-sm-3 col-md-2">
                                    <a class="#">
                                        <div class="action_ap text-center" style="background-color: #E8670F">
                                            <i class="fa fa-4x fa-line-chart"></i>
                                        </div>
                                    </a>
                                    <div class="discuss text-center">Sales</div>
                                </div>
                                <div class="col-xs-4 col-sm-3 col-md-2">
                                    <a class="#">
                                        <div class="action_ap text-center" style="background-color: #6337B7">
                                            <i class="fa fa-4x fa-archive"></i>
                                        </div>
                                    </a>
                                    <div class="discuss text-center">Warehouse</div>
                                </div>
                                <div class="col-xs-4 col-sm-3 col-md-2">
                                    <a class="#">
                                        <div class="action_ap text-center" style="background-color: #7E8B8C">
                                            <i class="fa fa-4x fa-cogs"></i>
                                        </div>
                                    </a>
                                    <div class="discuss text-center">Core Management</div>
                                </div>
                                <div class="col-xs-4 col-sm-3 col-md-2">
                                    <a class="#">
                                        <div class="action_ap text-center" style="background-color: #55B848">
                                            <i class="fa fa-4x fa-gavel"></i>
                                        </div>
                                    </a>
                                    <div class="discuss text-center">Manufacturing</div>
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
