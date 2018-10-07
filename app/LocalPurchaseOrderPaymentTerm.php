<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalPurchaseOrderPaymentTerm extends Model{

    protected $fillable = [
        'payment_type',
        'payment_date',
        'description',
        'amount'
    ];

    public function localpurchaseorder(){
        return $this->belongsTo('App\LocalPurchaseOrder');
    }

}
