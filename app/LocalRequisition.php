<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalRequisition extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'requisition_priority_id',
        'requisition_purpose_id',
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
    public static function availableRequisitions()
    {
        $requisitions = \App\LocalRequisition::all();
        $available_requisitions = [];
        foreach ($requisitions as $requisition) {
            $purchase_orders = $requisition->purchase_orders;
            foreach ($requisition->items as $item) {
                $po_quantity = LocalPurchaseOrderItem::where('product_id', $item->product_id)->sum('quantity');
                if ($item->quantity - $po_quantity > 0) {
                    $available_requisitions[] = $requisition;
                    break;
                }
            }
        }
        return $available_requisitions;
    }
    public function availableItems()
    {
        foreach ($this->items as $key => $item) {
            $this->items[$key]->quantity -= LocalPurchaseOrderItem::where('product_id', $item->product_id)->sum('quantity');
        }
        return $this->items;
    }
}
