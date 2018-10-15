<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryRequisition extends Model{

	protected $guarded=['id'];

	public function type(){
		return $this->belongsTo('App\InventoryRequisitionType', 'inventory_requisition_type_id');
	}

	public function sender(){
		return $this->belongsTo('App\WorkingUnit', 'sender_working_unit_id');
	}

	public function requested_to(){
		return $this->belongsTo('App\WorkingUnit', 'requested_working_unit_id');
	}

	public function item_status(){
		return $this->belongsTo('App\ProductStatus', 'product_status_id');
	}

	public function item_type(){
		return $this->belongsTo('App\ProductType', 'product_type_id');
	}

	public function requested_items(){
		return $this->hasMany('App\InventoryRequisitionItem');
	}

	public function initial_approver(){
		return $this->belongsTo('App\User', 'initial_approver_id');
	}

	public function final_approver(){
		return $this->belongsTo('App\User', 'final_approver_id');
	}

	public function creator(){
		return $this->belongsTo('App\User', 'creator_user_id');
	}

	public function editor(){
		return $this->belongsTo('App\User', 'updator_user_id');
	}

	public function status(){
		return $this->belongsTo('App\InventoryRequisitionStatus', 'inventory_requisition_status_id');
	}

	public function issue_requests(){
		return $this->hasMany('App\InventoryIssueRequest', 'inventory_requisition_id');
	}

	public function issues(){
		return $this->hasMany('App\InventoryIssue');
	}
	public function items(){
		return $this->hasMany('App\InventoryRequisitionItem', 'inventory_requisition_id');
	}

}
