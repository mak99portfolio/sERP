<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model{

    protected $guarded=['id'];
    protected $fillable = [
        'name',
        'country_id',
        'division_id',
        'latitute',
        'longitude'
    ];

    public function division(){
        return $this->belongsTo('App\Division');
    }

    public function country(){
        return $this->belongsTo('App\Country');
    }

}
