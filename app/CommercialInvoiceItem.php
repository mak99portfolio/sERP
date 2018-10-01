<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class CommercialInvoiceItem extends Model {

    use softDeletes;

    protected $guarded = ['id'];
    protected $fillable = [
        'commercial_invoice_id',
        'product_id',
        'quantity',
        'unit_price'
    ];

    function commercial_invoice() {
        return $this->belongsTo('App\CommercialInvoice');
    }

    function product() {
        return $this->belongsTo('App\Product', 'product_id');
    }

}
