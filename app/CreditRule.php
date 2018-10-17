<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditRule extends Model
{
    protected $fillable = [
        'customer_id',
        'credit_amount',
    ];
    public function customer(){
        return $this->belongsTo('App\Customer');
    }
}
