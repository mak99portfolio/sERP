<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalPurchaseOrderTermsCondition extends Model
{
     public function localpurchaseorder(){
        return $this->belongsTo('App\LocalPurchaseOrder');
    }
}
