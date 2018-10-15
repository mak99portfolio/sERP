<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerZone extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'short_name',
    ];

    public function zone_cities(){
        return $this->belongsToMany('App\CustomerZoneCity','customer_zone_cities','customer_zone_id','city_id');
    }
   
}
