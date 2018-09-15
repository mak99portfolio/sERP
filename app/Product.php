<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
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
}
