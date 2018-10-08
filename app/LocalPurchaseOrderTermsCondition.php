<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalPurchaseOrderTermsCondition extends Model{

    protected $fillable=[
        'terms_type',
        'description'
    ];

     public function localpurchaseorder(){
        return $this->belongsTo('App\LocalPurchaseOrder');
    }
}
