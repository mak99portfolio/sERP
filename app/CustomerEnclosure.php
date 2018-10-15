<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerEnclosure extends Model
{
    protected $guarded=['id'];
    public function enclosure(){
		return $this->belongsTo('App\Enclosure');
	}
    
}
