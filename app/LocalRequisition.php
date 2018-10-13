<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LocalRequisition extends Model
{
    use SoftDeletes;
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
        return $this->belongsTo('App\RequisitionPriority', 'requisition_priority_id');
    }
    public function purpose(){
        return $this->belongsTo('App\RequisitionPurpose', 'requisition_purpose_id');
    }
    public function purchase_orders()
    {
        return $this->belongsToMany('App\LocalPurchaseOrder');
    }
    public static function availableRequisitions()
    {
        $requisitions = \App\LocalRequisition::all();
        $available_requisitions = [];
        foreach ($requisitions as $requisition) {
            foreach ($requisition->items as $item) {
                $po_quantity = LocalPurchaseOrderItem::where('product_id', $item->product_id)->sum('quantity');
                if ($item->quantity > $po_quantity) {
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

    public function generateRequisitionNumber()
    {
        $serial = $this->count_last_serial() + 1;
        $this->requisition_no = 'LOCAL-REQ-' . date('Y-m-') . str_pad($serial, 4, '0', STR_PAD_LEFT);
    }
    private function count_last_serial()
    {
        return LocalRequisition::whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->count();
    }
}
