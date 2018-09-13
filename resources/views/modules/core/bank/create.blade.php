@extends('layout')
@section('title', 'Bank')
@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                      <h2>Bank</h2>
                      <a class="btn btn-primary btn-sm pull-right" href="{{route('bank.index')}}"><i class="fa fa-list-ul"></i> Country List</a>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <br />
                  <form class="form-horizontal form-label-left" action="{{ route('bank.store') }}" method="POST">
                      {{ csrf_field() }}
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group">
                                  <label>Bank Name</label>
                                  <input class="form-control input-sm" type="text" name="name">
                              </div>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group">
                                    <label>Country</label>
                                    <div>
                                        <select class="form-control input-sm" name="country_id">
                                            <option value="" disabled>Choose..</option>
                                            @foreach ($country_list as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- {{ BootForm::select('country', null, $countries) }} --}}
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group">
                                  <label>Short Name</label>
                                  <input class="form-control input-sm" type="text" name="short_name">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Bank Description</label>
                                    <textarea class="form-control input-sm" name="description" id="" cols="30" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                          <br>
                          <hr>
                          <div class="col-md-12">
                              <button type="submit" class="btn btn-success">Save</button>
                              <a class="btn btn-default btn-sm" href="{{route('bank.index')}}">Cancel</a>
                          </div>
                      </form>

                  </div>
              </div>
          </div>
          </div>
      <div class="clearfix"></div>
    </div>
  </div>
@endsection
