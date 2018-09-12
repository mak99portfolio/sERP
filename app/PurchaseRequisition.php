<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequisition extends Model
{
    protected $fillable = [
        'requisition_type_id',
        'requisition_priority_id',
        'purpose_id',
        'requisition_no',
        'requisition_title',
        'department_id',
        'expenses',
        'expense_quantity',
        'order_total_amount',
        'issued_date',
        'date_expected',
        'warehouse_id',
        'attachment_file',
        'reference_no',
        'note',
    ];
}
