<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PurchaseOrder extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'vendor_id',
        'requisition_date',
        'purchase_order_date',
        'port_of_loading_port_id',
        'port_of_discharge_port_id',
        'final_destination_country_id',
        'final_destination_city_id',
        'origin_of_goods_country_id',
        'payment_type',
        'pre_carriage_by',
        'subject',
        'letter_header',
        'letter_footer',
        'notes'
    ];
    public function items(){
        return $this->hasMany('App\PurchaseOrderItem');
    }
    public function vendor(){
        return $this->belongsTo('App\Vendor');
    }
    public function loading(){
        return $this->belongsTo('App\Port','port_of_loading_port_id');
    }
    public function discharge(){
        return $this->belongsTo('App\Port','port_of_discharge_port_id');
    }
    public function final_destination_country(){
        return $this->belongsTo('App\Country','final_destination_country_id');
    }
    public function final_destination_city(){
        return $this->belongsTo('App\City','final_destination_city_id');
    }
    public function origin_of_goods(){
        return $this->belongsTo('App\Country','origin_of_goods_country_id');
    }
    public function foreign_requisitions(){
        return $this->belongsToMany('App\ForeignRequisition');
    }
    public function amount()
    {
        return $this->items->sum(function ($item) {
            return $item->quantity * $item->unit_price;
        });
    }
    public function generate_purchase_order_number(){
        $serial = $this->count_last_serial() + 1;
        $this->purchase_order_no =  'PO-'.date('Y-m-').str_pad($serial, 4, '0', STR_PAD_LEFT);
    }
    private function count_last_serial(){
        return PurchaseOrder::whereYear('created_at', date('Y'))
                            ->whereMonth('created_at', date('m'))
                            ->count();
    }
    public static function availablePurchaseOrder()
    {
        $purchase_orders = \App\ForeignRequisition::all();
        $available_purchase_orders = [];
        foreach ($purchase_orders as $purchase_order) {
            $purchase_orders = $purchase_order->purchase_orders;
            foreach ($purchase_order->items as $item) {
                $pi_quantity = ProformaInvoiceItem::where('product_id', $item->product_id)->sum('quantity');
                if ($item->quantity - $pi_quantity > 0) {
                    $available_purchase_orders[] = $purchase_order;
                    break;
                }
            }
        }
        return $available_purchase_orders;
    }
    public function availableItems()
    {
        foreach ($this->items as $key => $item) {
            $this->items[$key]->quantity -= ProformaInvoiceItem::where('product_id', $item->product_id)->sum('quantity');
        }
        return $this->items;
    }
}
