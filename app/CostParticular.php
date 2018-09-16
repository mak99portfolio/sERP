<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CostParticular extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'country_id'
    ];

}
