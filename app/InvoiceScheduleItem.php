<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceScheduleItem extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'payment_date',
        'payment_amount'
    ];

    function invoice_schedule() {
        return $this->belongsTo('App\InvoiceSchedule');
    }
}
