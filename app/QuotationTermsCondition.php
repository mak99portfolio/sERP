<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationTermsCondition extends Model
{
    protected $fillable=[
        'terms_type',
        'description'
    ];

    public function quotation(){
        return $this->belongsTo('App\Quotation');
    }
}
