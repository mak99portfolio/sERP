<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SalesReturnReason extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'reason',
        'description',
    ];
}
