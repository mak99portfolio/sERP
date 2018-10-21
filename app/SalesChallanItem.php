<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesChallanItem extends Model{
    
    protected $fillable=[
		'sales_order_id',
		'product_id',
		'challan_quantity'
    ];

    public function sales_challan(){
    	return $this->belongsTo('App\SalesChallan', 'sales_challan_id');
    }

    public function sales_order(){
    	return $this->belongsTo('App\SalesOrder', 'sales_order_id');
    }

    public function product(){
    	return $this->belongsTo('App\Product', 'product_id');
    }

}
