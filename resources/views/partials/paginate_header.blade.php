{!! Form::open(['method'=>'GET','url'=>url()->current(),'class'=>'form-inline vert-offset-bottom-1']) !!}
	<strong class='hidden-sm hidden-md'>Search by:</strong>
	<div class="form-group">
		{!! Form::select('activeField',$paginate->fields, request()->get('activeField'),['class'=>'form-control selectpicker', 'onchange'=>'this.form.submit()']) !!}
	</div>

	<div class="form-group">
		<div class="btn-group" data-toggle="buttons">
			<label class="btn btn-default {{ $paginate->wholeWordActiveFlag }}" title='Match whole line'>
				{!! Form::checkbox('wholeWord',null, request()->get('wholeWord'),['onchange'=>'this.form.submit()']) !!} Match line
			</label>
		</div>
	</div>

	<div class='form-group'>
		<div class='input-group'>
			{!! Form::text('search', request()->get('search'),['class'=>'form-control']) !!}
			<span class='input-group-btn'>
				<button class='btn btn-default' type='submit'><i class='fa fa-search'></i></button>
			</span>
		</div>
	</div>

	<strong class='hidden-sm hidden-md'>Order by:</strong>
	<div class='form-group'>
		<div class='btn-group' data-toggle='buttons'>
			<label class='btn btn-default {{ $paginate->ascActiveFlag }}' title='Ascending order'>
				{!! Form::radio('order','ASC',$paginate->ascActiveFlag,['onchange'=>'this.form.submit()']) !!}
				<i class='fa fa-sort-amount-asc'></i>
			</label>
			<label class='btn btn-default {{ $paginate->descActiveFlag }}' title='Descending order'>
				{!! Form::radio('order','DESC',$paginate->descActiveFlag,['onchange'=>'this.form.submit()']) !!}
				<i class='fa fa-sort-amount-desc'></i>
			</label>
		</div>
	</div>

	<strong class='hidden-sm hidden-md'>Limit:</strong>
	<div class='form-group'>
		{!! Form::select('limit',[10=>10,20=>20,50=>50,100=>100], request()->get('limit'), ['class'=>'form-control selectpicker','onchange'=>'this.form.submit()']) !!}
	</div>

	<strong class='hidden-sm hidden-md'>Go to:</strong>
	<div class='form-group'>
		<select name='page' id='page' class='form-control selectpicker'  data-size='6' data-live-search='true' title='page' onchange='this.form.submit()'>
			@for($i=1; $i<=$paginate->totalPage; $i++)
				<option value="{{ $i }}">{{ $i }}</option>
			@endfor
		</select>
	</div>
{!! Form::close() !!}