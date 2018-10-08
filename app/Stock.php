<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model{
    
	protected $guarded=['id'];

	public function working_unit(){
		return $this->belongsTo('App\WorkingUnit');
	}

	public function product(){
		return $this->belongsTo('App\Product');
	}

	public function stock_adjustment(){
		return $this->belongsTo('App\InventoryStockAdjustment', 'stock_adjustment_id');
	}

    public function status_adjustment(){
        return $this->belongsTo('App\InventoryStatuskAdjustment', 'status_adjustment_id');
    }

    public function creator(){
    	return $this->belongsTo('App\User', 'creator_user_id');
    }

    public function editor(){
    	return $this->belongsTo('App\User', 'updator_user_id');
    }

    public function status(){
    	return $this->belongsTo('App\ProductStatus', 'product_status_id');
    }

    public function type(){
    	return $this->belongsTo('App\ProductType', 'product_type_id');
    }

    public function receive(){
    	return $this->belongsTo('App\InventoryReceive', 'inventory_receive_id');
    }

    public function issue(){
    	return $this->belongsTo('App\InventoryIssue', 'inventory_issue_id');
    }

}
