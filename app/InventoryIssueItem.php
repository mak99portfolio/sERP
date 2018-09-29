<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryIssueItem extends Model{
    
    protected $guarded=['id'];

    public function issue(){
		return $this->belongsTo('App\InventoryIssue', 'inventory_issue_id');
	}

    public function product(){
    	return $this->belongsTo('App\Product', 'product_id');
    }

}
