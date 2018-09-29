<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use App\ProductCategory;
use DB;

class Product extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'hs_code',
        'product_category_id',
        'product_pattern_id',
        'product_group_id',
        'product_brand_id',
        'product_model_id',
        'product_size_id',
        'product_set_id',
        'model',
        'serial',
        'part_number',
        'country_of_origin_country_id',
        'country_of_manufacture_country_id',
        'unit_of_measurement_id',
        'product_status_id',
        'tp_rate',
        'mrp_rate',
        'flat_rate',
        'special_rate',
        'distribution_rate',
        'other',
        'pack_size',
        'shipper_carton_size',
        'description'
    ];
    function product_category(){
        return $this->belongsTo('App\ProductCategory');
    }
    function origin_country(){
        return $this->belongsTo('App\Country','country_of_origin_country_id');
    }
    function manufacture(){
        return $this->belongsTo('App\Country','country_of_manufacture_country_id');
    }
    function unit_of_measurement(){
        return $this->belongsTo('App\UnitOfMeasurement');
    }
    function product_brand(){
        return $this->belongsTo('App\ProductBrand');
    }
    function product_model(){
        return $this->belongsTo('App\ProductModel','product_model_id');
    }
    function product_size(){
        return $this->belongsTo('App\ProductSize','product_size_id');
    }
    function product_set(){
        return $this->belongsTo('App\ProductSet','product_set_id');
    }
    function product_pattern(){
        return $this->belongsTo('App\ProductPattern','product_pattern_id');
    }
    function status(){
        return DB::table('product_statuses')->where('id', $this->product_status_id)->first();
    }
    function stocks(){
        return $this->hasMany('App\Stock');
    }
}
