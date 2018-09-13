<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model{

    protected $gaurded=['id'];

    public function districts(){
        return $this->hasMany('App\District');
    }

    public function country(){
        return $this->belongsTo('App\Country');
    }

}
