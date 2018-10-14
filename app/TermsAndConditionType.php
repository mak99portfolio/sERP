<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TermsAndConditionType extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'short_name',
    ];
}
