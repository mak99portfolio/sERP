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

	public function initial_approver(){
		return $this->belongsTo('App\User', 'initial_approver_id');
	}

	public function final_approver(){
		return $this->belongsTo('App\User', 'final_approver_id');
	}

	public function items(){
		return $this->hasMany('App\InventoryIssueItem', 'inventory_issue_id');
	}

}
