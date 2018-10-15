<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationPaymentTerm extends Model
{
    protected $fillable = [
        'payment_date',
        'description',
        'amount',
        'payment_type_id'
    ];

    public function quotation(){
        return $this->belongsTo('App\Quotation');
    }
    public function payment_type(){
        return $this->belongsTo('App\PaymentType', 'payment_type_id');
    }
}
