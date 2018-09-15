<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Port extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'contact_person',
        'contact_person_number',
        'city_id',
        'country_id'
    ];

    public function country(){
        return $this->belongsTo('App\Country');
    }

    public function city(){
        return $this->belongsTo('App\City');
    }
}
