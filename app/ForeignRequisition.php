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
        $this->requisition_no = 'REQ-' . date('Y-m-') . str_pad($serial, 4, '0', STR_PAD_LEFT);
    }
    private function count_last_serial()
    {
        return ForeignRequisition::whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->count();
    }
    public static function availableRequisitions()
    {
        // $req_items  = ForeignRequisitionItem::select('product_id', \DB::raw('sum(quantity) as quantity'))->groupBy('product_id')->get();
        // foreach($req_items as $key => $req_item){
        //     $po_quantity = PurchaseOrderItem::where('product_id', $req_item->product_id)->sum('quantity');
        //     $req_items[$key]['quantity'] -= $po_quantity;
        // }
        // dd($req_items);
        // $requisitions = ForeignRequisition::all();
        // foreach($requisitions as $req){
        //     foreach($req->items as $req_item){
        //         foreach($req_items as $available_item){
        //             if($req_item->product_id == $available_item['product_id']){
        //                 if($available_item['quantity'] > $req_item->quantity){
                            
        //                 }
        //             }
        //         }
        //     }
        // }
        $requisitions = \App\ForeignRequisition::all();
        $available_requisitions = [];
        foreach ($requisitions as $requisition) {
            foreach ($requisition->items as $item) {
                $po_quantity = PurchaseOrderItem::where('product_id', $item->product_id)
                                ->whereIn('purchase_order_id', $requisition->purchase_orders->pluck('id')->toArray())
                                ->sum('quantity');
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
            $this->items[$key]->quantity -= PurchaseOrderItem::where('product_id', $item->product_id)
                                            ->whereIn('purchase_order_id', $this->purchase_orders->pluck('id')->toArray())
                                            ->sum('quantity');
        }
        return $this->items;
    }
}
