<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesInvoiceItem extends Model{

	public function sales_invoice(){
		return $this->belongsTo('App\SalesInvoice', 'sales_invoice_id');
	}

}
