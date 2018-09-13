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
	return "<a class='btn btn-default' href='$attr[url]' title='Edit' onclick='return action_confirm()'><i class='$attr[class] fa $attr[icon] fa-lg' aria-hidden='true'></i></a>";
}
function btnDelete($args=[]){
	$attr=[
		'url'=>'#',
		'icon'=>'fa-trash-o',
		'class'=>'text-danger'
	];
	$attr=array_merge($attr,$args);
	return "<form method='POST' action='$attr[url]'>".csrf_field().method_field('DELETE')."<button type='submit' class='btn btn-default btn-xs' title='Delete' onclick='return action_confirm()'><i class='$attr[class] fa $attr[icon] fa-lg' aria-hidden='true' title='Delete'></i></button></form>";
}
function btnCustom($args=[]){
	$attr=[
		'url'=>'#',
		'icon'=>'fa-exclamation-circle',
		'class'=>'text-primary',
		'title'=>'',
		'btnClass'=>'btn btn-default'
	];
	$attr=array_merge($attr,$args);
	return "<a class='$attr[btnClass]' href='$attr[url]' title='$attr[title]' onclick='return action_confirm()'><i class='$attr[class] fa $attr[icon] fa-lg' aria-hidden='true'></i> $attr[title]</a>";
}
function in($urls=[]){
	$currentUrl=url()->current();
	foreach($urls as $url) if($currentUrl==url($url)) return 'in';
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
		'class'=>'pull-right btn btn-default btn-xs',
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