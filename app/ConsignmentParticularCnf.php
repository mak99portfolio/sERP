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
}
