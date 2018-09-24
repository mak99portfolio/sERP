<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class PackingListItem extends Model
{
    use softDeletes;

    protected $guarded = ['id'];
    protected $fillable = [
        'paking_list_id',
        'product_id',
        'quantity',
        'per_unit_weight'
    ];

    function packingList() {
        return $this->belongsTo('App\PackingList');
    }

    function product() {
        return $this->belongsTo('App\Product');
    }
}
