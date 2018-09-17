<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enclosure extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'short_name'
    ];
}
