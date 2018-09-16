<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorPaymentTerm extends Model
{

    protected $guarded = ['id'];
    protected $fillable = [
        'vendor_id',
        'net_days',
        'payment_discount',
        'other_discount',
        'discount_terms',
    ];
    public function vendor()
    {
        return $this->belongsTo('App\Vendor');
    }

}
