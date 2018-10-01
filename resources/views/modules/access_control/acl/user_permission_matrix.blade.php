@extends('layout')
@section('title', 'ACL')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Access Control</h3>
    </div>
</div>
<div class="clearfix"></div>
{{-- Content here --}}

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>User Permission<small>Matrix</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <br/>
            {{-- Main content area --}}
                @include('partials.flash_msg')

                {{ BootForm::open(['url'=>route('user-permission-matrix.store')]) }}
                <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                  <thead>
                    <tr class="bg-primary">
                      <th>Permissions \ Users</th>
                      @foreach($users as $user)
                        <th class="text-center">
                            {{ $user->name }}
                        </th>
                      @endforeach
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        @foreach($users as $user)
                        <td class="text-center">
                            <div class="pretty p-switch p-fill p-success">
                                <input name="matrix[{{ $user->id }}][]" value="{{ $permission->id }}" type='checkbox' {{
                            $cross_check($model_has_permissions, $user->id, $permission->id) }}/>
                                <div class="state p-primary">
                                    <label></label>
                                </div>
                            </div>
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
                {!! btnSubmitGroup() !!}
                {{ BootForm::close() }}
            {{-- End of Main content area --}}
           </div>
       </div>
   </div>
</div>

{{-- Content end --}}
</div>
</div>
@endsection

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css"/>
@endsection