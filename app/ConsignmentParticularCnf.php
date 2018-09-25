<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConsignmentParticularCnf extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'cnf_id',
        'consignment_particular_id',
        'amount'
    ];

    public function cnf(){
        return $this->belongsTo('App\Cnf', 'cnf_id');
    }

    public function consignment_particular(){
        return $this->belongsTo('App\ConsignmentParticular', 'consignment_particular_id');
    }
    public function amount_in_taka(){
        return floor($this->amount);
    }
    public function amount_in_paisa(){
        return ($this->amount*100)%floor($this->amount*100);
    }
}
