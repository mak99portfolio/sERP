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
    function unit_of_measurement(){
        return $this->belongsTo('App\UnitOfMeasurement');
    }
    function product_brand(){
        return $this->belongsTo('App\ProductBrand');
    }
    function status(){
        return DB::table('product_statuses')->where('id', $this->product_status_id)->first();
    }
}
