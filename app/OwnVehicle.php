<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnVehicle extends Model{
    
    protected $guarded=['id'];

    public function employee(){
    	return $this->belongsTo('App\EmployeeProfile', 'employee_profile_id');
    }

    public function creator(){
    	return $this->belongsTo('App\User', 'creator_user_id');
    }

    public function editor(){
    	return $this->belongsTo('App\User', 'updator_user_id');
    }

}
