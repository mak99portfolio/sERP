<?php
function fa($icon){
	return "<i class='fa $icon' aria-hidden='true'></i> ";
}
function setFlash($key,$value){
	request()->session()->put($key,$value);
}
function getFlash($key){
 	return request()->session()->pull($key);
}
function readFlash($key){
	return request()->session()->get($key);
}
function hasFlash($key){
	return request()->session()->has($key);
}
function btnEdit($args=[]){
	$attr=[
		'url'=>'#',
		'icon'=>'fa-pencil',
		'class'=>'text-primary'
	];
	$attr=array_merge($attr,$args);
	return "<a class='btn btn-default btn-xs btn-block' href='$attr[url]' title='Edit' onclick='return action_confirm()'><i class='$attr[class] fa $attr[icon] fa-lg' aria-hidden='true'></i></a>";
}
function btnDelete($args=[]){
	$attr=[
		'url'=>'#',
		'icon'=>'fa-trash-o',
		'class'=>'text-danger'
	];
	$attr=array_merge($attr,$args);
	return "<form method='POST' action='$attr[url]'>".csrf_field().method_field('DELETE')."<button type='submit' class='btn btn-default btn-xs btn-block' title='Delete' onclick='return action_confirm()'><i class='$attr[class] fa $attr[icon] fa-lg' aria-hidden='true' title='Delete'></i></button></form>";
}
function btnCustom($args=[], Array $customeAttr=[]){

	$attr=[
		'url'=>'#',
		'icon'=>'fa-exclamation-circle',
		'class'=>'text-primary',
		'title'=>'',
		'btnClass'=>'btn btn-default',
	];

	$attributesStr='';

	foreach($customeAttr as $key=>$value){
		$attributesStr.="{$key}='{$value}' ";
	}

	$attr=array_merge($attr,$args);
	return "<a class='$attr[btnClass]' href='$attr[url]' title='$attr[title]' onclick='return action_confirm()' {$attributesStr}><i class='$attr[class] fa $attr[icon] fa-lg' aria-hidden='true'></i> $attr[title]</a>";

}
function in($urls=[]){
	$currentUrl=url()->current();
	foreach($urls as $url) if($currentUrl==url($url)) return 'in';
}

function active($urls){

	$currentUrl=url()->current();

	if(is_array($urls)){
		
		foreach($urls as $url) if($currentUrl==url($url)) return 'active';

	}elseif(is_string($urls)){

		if($currentUrl==url($urls)) return 'active';
		
	}

}

function goBack($args=[]){
	$attr=[
		'class'=>'btn btn-default',
		'icon'=>'text-info fa-reply',
		'title'=>'Go back'
	];	
	$attr=array_merge($attr,$args);
	return "<buton type='button' class='$attr[class]' onclick='window.history.back();'/><i class='fa $attr[icon]'></i> $attr[title]</buton>";
}

function btnAddNew($args=[]){
	$attr=[
		'class'=>'pull-right btn btn-default',
		'icon'=>'text-info fa-plus-circle fa-lg',
		'title'=>'Add New',
		'url'=>'#'
	];	
	$attr=array_merge($attr,$args);
	return "<a href='$attr[url]' class='$attr[class]'><i class='fa $attr[icon]'></i> $attr[title]</a>";
}

function Xedit($args=[]){
	return \App\Helpers\Xedit::render($args);
}

function btnSubmitGroup(){
	return "<div class='btn-group'>
	<button class='btn btn-default' type='submit'><i class='fa text-info fa-rocket fa-lg'></i> Submit</button>
	<a class='btn btn-default' href='".url()->current()."' title='Reset' onclick='return action_confirm()'><i class='fa fa-exclamation-circle fa-lg text-warning' aria-hidden='true'></i> Reset</a>
	<button type='button' class='btn btn-default' onclick='window.history.back();'/><i class='fa text-info fa-reply fa-lg'></i> Go Back</button>
	</div>";
}

function uCode(string $tableField, string $prefix, int $pointer=1){

	list($table, $field)=explode('.', $tableField);
	$prefix=strtoupper($prefix);
	$row=\DB::table($table)->select($field)->whereNotNull($field)->latest()->first();

	if(empty($row->$field)){

		return $prefix.$pointer;

	}else{

		$latestValue=intVal(preg_replace("/[^0-9\.]/", '', $row->$field));

		if($pointer <= $latestValue) $pointer=++$latestValue;
		
		$nextValue=$prefix.$pointer;

		if(\DB::table($table)->where($field, $nextValue)->exists()){

			return uCode($tableField, $prefix, ++$pointer);

		}else return $nextValue;

	}

}

function stock_balance(\App\WorkingUnit $working_unit, \App\Product $product){

    $receive_quantity=$working_unit->stocks()->where('product_id', $product->id)->sum('receive_quantity');
    $issue_quantity=$working_unit->stocks()->where('product_id', $product->id)->sum('issue_quantity');
    $allocated_quantity=$working_unit->stocks()->where('product_id', $product->id)->sum('allocated_quantity');
    return $receive_quantity - $issue_quantity - $allocated_quantity;

}