<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalPurchaseOrderPaymentTerm extends Model
{
    public function localpurchaseorder(){
        return $this->belongsTo('App\LocalPurchaseOrder');
    }
}
