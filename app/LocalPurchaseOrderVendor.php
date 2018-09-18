<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalPurchaseOrderVendor extends Model
{
    public function localpurchaseorder(){
        return $this->belongsTo('App\LocalPurchaseOrder');
    }
}
