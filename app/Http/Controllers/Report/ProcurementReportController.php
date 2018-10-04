<?php

namespace App\Http\Controllers\Report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PurchaseOrder;

class ProcurementReportController extends Controller
{
    private $view_root = 'modules/report/procurement/';
    public function foreign_purchase_order(){
        $view = view($this->view_root . 'foreign_purchase_order');
        $view->with('purchase_order', PurchaseOrder::first());
        return $view;
    }
    public function proforma_invoice(){
        $view = view($this->view_root . 'proforma_invoice');
        return $view;
    }
    public function commercial_invoice(){
        $view = view($this->view_root . 'commercial_invoice');
        return $view;
    }
}
