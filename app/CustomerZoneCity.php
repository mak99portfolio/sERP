<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CustomerZoneCity extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'city_ids'
    ];
}
