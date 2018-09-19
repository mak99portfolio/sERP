<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryIssue extends Model{

	protected $guarded=['id'];

	public function requisition(){
		return $this->belongsTo('App\InventoryRequisition', 'inventory_requisition_id');
	}

	public function allocated_items(){
		return $this->hasMany('App\InventoryIssueItem');
	}

}
