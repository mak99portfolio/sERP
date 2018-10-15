<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationTermsCondition extends Model
{
    protected $fillable=[
        'description',
        'terms_and_condition_type_id'
    ];

    public function quotation(){
        return $this->belongsTo('App\Quotation');
    }
    public function terms_condition_type(){
        return $this->belongsTo('App\TermsAndConditionType', 'terms_and_condition_type_id');
    }
}
