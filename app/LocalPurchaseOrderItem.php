<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalPurchaseOrderItem extends Model{

    protected $fillable = [
        "local_requisition_id",
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
    	return $this->belongsTo('App\Product');
    }

    public function sub_amount()
    {
        return $this->quantity * $this->unit_price;
    }

    public function discount_amount()
    {
        return ($this->sub_amount() * $this->discount_rate) / 100;
    }

    public function vat_amount()
    {
        return ($this->sub_amount() * $this->vat_rate) / 100;
    }

    public function net_amount()
    {
        return $this->sub_amount() - $this->discount_amount() + $this->vat_amount();
    }
}
