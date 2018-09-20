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
        return $this->brlongsTo('App\CommercialInvoice');
    }

    function product() {
        return $this->brlongsTo('App\Product');
    }

}
