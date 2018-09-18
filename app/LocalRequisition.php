<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalRequisition extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'requisition_priority_id',
        'purpose_id',
        'requisition_no',
        'requisition_title',
        'issued_date',
        'date_expected',
        'note',
        'status',
    ];
    public function items(){
        return $this->hasMany('App\LocalRequisitionItem');
    }
    public function priority(){
        return $this->belongsTo('App\RequisitionPriority');
    }
    public function purpose(){
        return $this->belongsTo('App\RequisitionPurpose');
    }
}
