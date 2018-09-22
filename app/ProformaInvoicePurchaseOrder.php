<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProformaInvoicePurchaseOrder extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'purchase_order_id',
        'proforma_invoice_id',
    ];
    public function purchase_order(){
        return $this->belongsTo('App\PurchaseOrder','purchase_order_id');
    }
    public function proforma_invoice(){
        return $this->belongsTo('App\ProformaInvoice','proforma_invoice_id');
    }
}
