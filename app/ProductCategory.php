<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProductCategory extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'product_categorie_id',
        'name',
        'short_name'
    ];
}
