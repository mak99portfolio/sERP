<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CustomerAddress extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'country_id',
        'division_id',
        'district_id',
        'city_id',
        'address',
    ];
    public function country(){
        return $this->belongsTo('App\Country');
    }
    public function division(){
        return $this->belongsTo('App\Division');
    }
    public function district(){
        return $this->belongsTo('App\District');
    }
    public function city(){
        return $this->belongsTo('App\City');
    }
}
