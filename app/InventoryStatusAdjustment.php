<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryStatusAdjustment extends Model{

    protected $guarded=['id'];

    public function working_unit(){
    	return $this->belongsTo('App\WorkingUnit', 'working_unit_id');
    }

    public function product(){
    	return $this->belongsTo('App\Product', 'product_id');
    }

    public function selected_type(){
    	return $this->belongsTo('App\ProductType', 'selected_type_id');
    }

    public function selected_status(){
    	return $this->belongsTo('App\ProductStatus', 'selected_status_id');
    }

    public function adjusted_status(){
    	return $this->belongsTo('App\ProductStatus', 'adjusted_status_id');
    }

    public function creator(){
    	return $this->belongsTo('App\User', 'creator_user_id');
    }

    public function editor(){
    	return $this->belongsTo('App\User', 'updator_user_id');
    }

    public function stocks(){
    	return $this->hasMany('App\Stock', 'status_adjustment_id');
    }

}
