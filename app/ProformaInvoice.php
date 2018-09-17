<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProformaInvoice extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'requisition_no',
        'purchase_order_date',
        'proforma_invoice_no',
        'proforma_invoice_date',
        'proforma_invoice_receive_date',
        'vendor_id',
        'port_of_loading_port_id',
        'port_of_discharge_port_id',
        'country_of_final_destination_countru_id',
        'final_destination_countru_id',
        'country_of_origin_of_goods_countru_id',
        'shipment_allow',
        'payment_type',
        'pre_carriage_by',
        'customer_code',
        'consignee',
        'beneficiary_bank_info',
        'notes',
    ];
}
