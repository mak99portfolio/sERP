{!! Form::open(['method'=>'GET','url'=>url()->current(),'class'=>'form-inline vert-offset-bottom-1']) !!}
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <strong class='hidden-sm hidden-md hidden-xs'>Search by:</strong>
        <div class="form-group">
            {!! Form::select('activeField',$paginate->fields, request()->get('activeField'),['class'=>'form-control input-sm select2', 'onchange'=>'this.form.submit()']) !!}
        </div>
    </div>
    <div class="col-lg-1 col-md-2 col-sm-2 col-xs-3">
        <div class="form-group">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-default btn-sm form-control input-sm {{ $paginate->wholeWordActiveFlag }}" title='Match whole line'>
                    {!! Form::checkbox('wholeWord',null, request()->get('wholeWord'),['class'=>'form-control', 'onchange'=>'this.form.submit()']) !!} Match line
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
        <div class='form-group'>
            <div class='input-group'>
                {!! Form::text('search', request()->get('search'),['class'=>'form-control input-sm']) !!}
                <span class='input-group-btn'>
                    <button class='btn btn-default btn-sm form-control input-sm' type='submit'><i class='fa fa-search'></i></button>
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
        <strong class='hidden-sm hidden-md hidden-xs'>Order by:</strong>
        <div class='form-group'>
            <div class='btn-group' data-toggle='buttons'>
                <label class='btn btn-default btn-sm {{ $paginate->ascActiveFlag }}' title='Ascending order'>
                    {!! Form::radio('order','ASC',$paginate->ascActiveFlag,['onchange'=>'this.form.submit()']) !!}
                    <i class='fa fa-sort-amount-asc'></i>
                </label>
                <label class='btn btn-default btn-sm {{ $paginate->descActiveFlag }}' title='Descending order'>
                    {!! Form::radio('order','DESC',$paginate->descActiveFlag,['onchange'=>'this.form.submit()']) !!}
                    <i class='fa fa-sort-amount-desc'></i>
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-8">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6">
                <div class="pull-right">
                    <strong class='hidden-sm hidden-md'>Limit:</strong>
                    <div class='form-group'>
                        {!! Form::select('limit',[10=>10,20=>20,50=>50,100=>100], request()->get('limit'), ['class'=>'input-sm','onchange'=>'this.form.submit()']) !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6">
                <strong class='hidden-sm hidden-md'>Go to:</strong>
                <div class='form-group'>
                    <select name='page' id='page' class='input-sm'  data-size='6' data-live-search='true' title='page' onchange='this.form.submit()'>
                        @for($i=1; $i<=$paginate->totalPage; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}