<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SalesOrderTermsAndCondition extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'description',
        'terms_and_condition_id',
    ];
}
