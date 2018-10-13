<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LocalRequisitionItem extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'local_requisition_id',
        'product_id',
        'quantity',
    ];
    public function product(){
        return $this->belongsTo('App\Product');
    }

    public function requisition(){
        return $this->belongsTo('App\LocalRequisition', 'local_requisition_id');
    }

    public function physical_stock(){
        return Stock::where('product_id', $this->product_id)->sum('receive_quantity') - Stock::where('product_id', $this->product_id)->sum('issue_quantity');
    }

    public function pending(){
        return PurchaseOrderItem::where('product_id', $this->product_id)->sum('quantity');
    }

    public function total_local_quantity(){
        return $this->physical_stock() + $this->pending();
    }
}
