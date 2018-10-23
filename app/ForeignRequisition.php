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
        'note',
    ];
    public function items()
    {
        return $this->hasMany('App\ForeignRequisitionItem');
    }
    public function po_items()
    {
        return $this->hasMany('App\PurchaseOrderItem');
    }
    public function purpose()
    {
        return $this->belongsTo('App\RequisitionPurpose', 'requisition_purpose_id');
    }
    public function priority()
    {
        return $this->belongsTo('App\RequisitionPriority', 'requisition_priority_id');
    }
    public function purchase_orders()
    {
        return $this->belongsToMany('App\PurchaseOrder');
    }
    public function generateRequisitionNumber()
    {
        $serial = $this->count_last_serial() + 1;
        $this->requisition_no = 'FR-' . date('Y-m-') . str_pad($serial, 4, '0', STR_PAD_LEFT);
    }
    private function count_last_serial()
    {
        return ForeignRequisition::whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->count();
    }
    public static function availableRequisitions()
    {
        $requisitions = \App\ForeignRequisition::all();
        $available_requisitions = [];
        foreach ($requisitions as $requisition) {
            if($requisition->items->sum('quantity') > $requisition->po_items->sum('quantity')){
                $available_requisitions[] = $requisition;
            }
        }
        return $available_requisitions;
    }
    public function availableItems()
    {
        foreach ($this->items as $key => $item) {
            $this->items[$key]->quantity -= PurchaseOrderItem::where('product_id', $item->product_id)
                                            ->where('foreign_requisition_id', $this->id)
                                            ->sum('quantity');
        }
        return $this->items;
    }
}
