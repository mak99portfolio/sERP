<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerBank extends Model
{
    protected $fillable = [
        'account_number',
        'account_name',
        'bank_name',
        'branch',
        'swift_code',
        'bank_address',
        'customer_id',
    ];
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
