<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalPurchaseOrderItem extends Model{

    public function localpurchaseorder(){
        return $this->belongsTo('App\LocalPurchaseOrder');
    }

    public function product(){
    	return $this->belongsTo('App\Product', 'item_id');
    }

}
