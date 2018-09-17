<?php

namespace App;
use App\Product;
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
    function products(){
        return $this->hasMany('Product');
    }
}
