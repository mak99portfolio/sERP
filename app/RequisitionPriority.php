<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequisitionPriority extends Model
{
    protected $fillable = [
        'name',
        'short_name',
    ];
}
