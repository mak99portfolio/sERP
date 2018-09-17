<?php

namespace App\Model\Procurement;

use Illuminate\Database\Eloquent\Model;

class VendorCategory extends Model
{
    protected $fillable = [
        'name',
        'short_name',
        'description',
    ];
}
