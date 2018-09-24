<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackingList extends Model
{
        use SoftDeletes;

    protected $guarded = ['id'];
    protected $fillable = [
        'commercial_invoice_id',
        'currency',
        'customer_code',
        'notes',
        'net_total',
        'gross_total'
    ];
    function items() {
        return $this->hasMany('App\PackingListItem');
    }
}
