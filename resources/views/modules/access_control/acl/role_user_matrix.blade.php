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
                <h2>Role User<small>Matrix</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <br/>
            {{-- Main content area --}}
                @include('partials.flash_msg')

                {{ BootForm::open(['url'=>route('matrix.store')]) }}
                <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                  <thead>
                    <tr class="bg-warning">
                      <th>Users \ Roles</th>
                      @foreach($roles as $role)
                        <th class="text-center">
                            {{ $role->name }}
                        </th>
                      @endforeach
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        @foreach($roles as $role)
                        <td class="text-center">
                            <input name="matrix[{{ $role->id }}][]" value="{{ $user->id }}" type='checkbox' {{
                            $cross_check($model_has_roles, $role->id, $user->id) }}/>
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