<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesInvoice extends Model
{
    public function items(){

        return $this->hasMany('App\SalesInvoiceItem','sales_invoice_id');

    }
}
