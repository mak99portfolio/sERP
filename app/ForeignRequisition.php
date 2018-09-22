<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForeignRequisition extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $fillable = [
        'requisition_priority_id',
        'requisition_purpose_id',
        'requisition_title',
        'issued_date',
        'date_expected',
        'note'
    ];
    public function items(){
        return $this->hasMany('App\ForeignRequisitionItem');
    }
    public function purpose(){
        return $this->belongsTo('App\RequisitionPurpose','requisition_purpose_id');
    }
    public function priority(){
        return $this->belongsTo('App\RequisitionPriority','requisition_priority_id');
    }
}
