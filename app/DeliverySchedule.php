<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliverySchedule extends Model
{
    public function items(){
        return $this->hasMany('App\DeliveryScheduleItem','delivery_schedule_id');
    }

}
