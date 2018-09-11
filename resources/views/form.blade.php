@extends('layouts.base')

@section('content')
	{{ BootForm::open(['url'=>'#']) }}
		<div class="row">
			<div class="col-md-6">
				{{ BootForm::text('Name') }}
			</div>
			<div class="col-md-6">
				{{ BootForm::text('Email') }}
			</div>
		</div>

		{{ BootForm::password('Password') }}
		{{ BootForm::submit('Submit') }}
	{{ BootForm::close() }}
@endsection

@section('style')
<style>
	
</style>
@endsection