<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationPaymentTerm extends Model
{
    protected $fillable = [
        'payment_type',
        'payment_date',
        'description',
        'amount'
    ];

    public function quotation(){
        return $this->belongsTo('App\Quotation');
    }
}
