@extends('layout')
@section('title', 'Company General Information')
@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
                    <div class="x_title">
                        <h2>Company - Notifications</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered table-hover">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="25">#</th>
                                        <th>Time</th>
                                        <th>Sender</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Detail</th>
                                        <th>Mark As Read</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($notifications as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</td>
                                        <td>{{ \App\User::find($row->data['sender_id'])->name }}</td>
                                        <td>{{ $row->data['subject'] }}</td>
                                        <td>{{ $row->data['message'] }}</td>
                                        <td>{!! btnCustom(['title'=>'View Details', 'url'=>route('notification.show', ['notification'=>$row->id])]) !!}</td>
                                        <td>
                                            @if(!$row->read_at)
                                            {!! btnDelete(['title'=>'Mark As Read', 'url'=>route('notification.destroy', ['notification'=>$row->id]), 'icon'=>'fa-pencil-square-o', 'class'=>'text-info']) !!}
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end table-->
                    </div>
                </div>
          </div>
          </div>
      <div class="clearfix"></div>
    </div>
  </div>
@endsection