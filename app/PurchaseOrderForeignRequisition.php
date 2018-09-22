<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PurchaseOrderForeignRequisition extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'foreign_requisition_id',
        'purchase_order_id',
    ];
    public function foreign_requisition(){
        return $this->belongsTo('App\ForeignRequisition','foreign_requisition_id');
    }
    public function purchase_order(){
        return $this->belongsTo('App\PurchaseOrder','purchase_order_id');
    }
}
