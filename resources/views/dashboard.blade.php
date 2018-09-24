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
                        <div class="row">
                            <div class="col-lg-12 col-md-12">


                                <form class="form-horizontal form-label-left" >


                                    <span class="section">Personal Info</span>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Confirm Email <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" id="email2" name="confirm_email" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Number <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="number" id="number" name="number" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Website URL <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="url" id="website" name="website" required="required" placeholder="www.website.com" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Occupation <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="occupation" type="text" name="occupation" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="password" class="control-label col-md-3">Password</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telephone <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="tel" id="telephone" name="phone" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Textarea <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea id="textarea" required="required" name="textarea" class="form-control col-md-7 col-xs-12"></textarea>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <button type="submit" class="btn btn-primary">Cancel</button>
                                            <button id="send" type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
