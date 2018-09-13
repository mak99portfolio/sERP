<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'bank_name',
        'country',
        'short_name',
        'bank_description'
    ];
}
