<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalPurchaseOrderPaymentTerm extends Model{

    protected $fillable = [
        'payment_type_id',
        'payment_date',
        'description',
        'amount'
    ];

    public function localpurchaseorder(){
        return $this->belongsTo('App\LocalPurchaseOrder');
    }
    public function payment_type(){
        return $this->belongsTo('App\PaymentType', 'payment_type_id');
    }

}
