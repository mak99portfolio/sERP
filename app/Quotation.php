<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quotation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'quotation_no',
        'delivery_date',
        'vendor_id',
        'local_requisition_id'
    ];

    public function vendor(){
        return $this->belongsTo('App\Vendor');
    }
    public function payment_terms(){
        return $this->hasMany('App\QuotationPaymentTerm');
    }
    public function terms_conditions(){
        return $this->hasMany('App\QuotationTermsCondition');
    }
}
