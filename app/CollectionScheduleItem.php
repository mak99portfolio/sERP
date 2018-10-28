<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollectionScheduleItem extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'payment_date',
        'invoice_id',
        'payment_amount'
    ];

    function collection_schedule() {
        return $this->belongsTo('App\CollectionSchedule');
    }
    
}
