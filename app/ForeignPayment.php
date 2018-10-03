<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ForeignPayment extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'payment_date',
        'vendor_id',
        'payment_by_id',
        'payment_by_no',
        'payment_type_id',
        'payment_amount',
        'discount_amount',
        'vat',
        'note',
    ];
}
