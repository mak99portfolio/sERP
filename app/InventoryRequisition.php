<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryRequisition extends Model{

	protected $guarded=['id'];

	public function type(){
		return $this->belongsTo('App\InventoryRequisitionType', 'inventory_requisition_type_id');
	}

	public function sender(){
		return $this->belongsTo('App\WorkingUnit', 'sender_depot_id');
	}

	public function requested_to(){
		return $this->belongsTo('App\WorkingUnit', 'requested_depot_id');
	}

	public function item_status(){
		return $this->belongsTo('App\ProductStatus', 'product_status_id');
	}

	public function item_pattern(){
		return $this->belongsTo('App\ProductPattern', 'product_pattern_id');
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

	public function issue(){
		return $this->hasOne('App\InventoryIssue');
	}

}
