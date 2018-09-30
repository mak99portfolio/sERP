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
        'short_name',
    ];
    public function products()
    {
        return $this->hasMany('Product');
    }
    public function parent()
    {
        return $this->belongsTo('App\ProductCategory', 'parent_product_category_id');
    }

    public function children()
    {
        return $this->hasMany('App\ProductCategory', 'parent_product_category_id');
    }
    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }
    
}
