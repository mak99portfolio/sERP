<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesInvoiceItem extends Model{

	protected $fillable=[
		'sales_invoice_id',
		'sales_challan_id',
		'sales_order_id',
		'product_id',
		'unit_price',
		'bonus_quantity',
		'invoice_quantity',
		'discount_amount'
	];

	public function sales_invoice(){
		return $this->belongsTo('App\SalesInvoice', 'sales_invoice_id');
	}

	public function product(){
		return $this->belongsTo('App\Product', 'product_id');
	}

	public function sales_order(){
		return $this->belongsTo('App\SalesOrder', 'sales_order_id');
	}

	public function sales_challan(){
		return $this->belongsTo('App\SalesChallan', 'sales_challan_id');
	}

}
