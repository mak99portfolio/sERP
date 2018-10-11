<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProformaInvoiceItem extends Model
{
    use SoftDeletes;
    protected $guarded=['id'];
    protected $fillable = [
        'quantity',
        'unit_price',
        'proforma_invoice_id',
        'product_id'
    ];
    public function product(){
        return $this->belongsTo('App\Product'); 
    }
    public function proforma_invoice(){
        return $this->belongsTo('App\ProformaInvoice');
    }
}
