<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LocalPurchaseOrder extends Model
{
     use SoftDeletes;
    protected $fillable = [
        'purchase_oder_no',
        'inco_terms',
        'inco_term_info',
        'procurement_type',
        'purchase_order_type',
        'status',
        'remarks',
        'purchase_oder_date'
    ];
}
