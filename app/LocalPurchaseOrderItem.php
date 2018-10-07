<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalPurchaseOrderItem extends Model{

    protected $fillable = [
        "product_id",
        "quantity",
        "unit_price",
        "discount_rate",
        "vat_rate"
    ];

    public function localpurchaseorder(){
        return $this->belongsTo('App\LocalPurchaseOrder');
    }

    public function product(){
    	return $this->belongsTo('App\Product', 'item_id');
    }

}
