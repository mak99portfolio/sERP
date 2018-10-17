<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalPurchaseOrderTermsCondition extends Model{

    protected $fillable=[
        'terms_and_condition_type_id',
        'description'
    ];

    public function localpurchaseorder(){
        return $this->belongsTo('App\LocalPurchaseOrder');
    }
    public function terms_condition_type(){
        return $this->belongsTo('App\TermsAndConditionType', 'terms_and_condition_type_id');
    }
}
