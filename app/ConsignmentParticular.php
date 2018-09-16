<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConsignmentParticular extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'short_name'
    ];
}
