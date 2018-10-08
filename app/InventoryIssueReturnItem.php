<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryIssueReturnItem extends Model{

	protected $guarded=['id'];

	public function issue(){
		return $this->belongsTo('App\InventoryIssue', 'inventory_issue_id');
	}

	public function product(){
		return $this->belongsTo('App\Product', 'product_id');
	}

    public function status(){
    	return $this->belongsTo('App\ProductStatus', 'product_status_id');
    }

    public function type(){
    	return $this->belongsTo('App\ProductType', 'product_type_id');
    }

}
