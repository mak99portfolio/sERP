<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryRecordType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'record_type_id',
        'name',
        'short_name'
    ];
}
