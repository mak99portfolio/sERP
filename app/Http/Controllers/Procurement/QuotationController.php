<?php

namespace App\Http\Controllers\Procurement;

use App\Quotation;
use App\Vendor;
use App\LocalRequisition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class QuotationController extends Controller
{
    private $view_root = 'modules/procurement/local/quotation/';

    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('quotation_list', Quotation::all());
        return $view;
    }

    public function create()
    {
        $view = view($this->view_root . 'create');
        $view->with('vendor_list', Vendor::pluck('name','id')->prepend('', ''));
        $view->with('local_requisition_list', LocalRequisition::pluck('requisition_no','id')->prepend('', ''));
        return $view;
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Quotation $quotation)
    {
        //
    }

    public function edit(Quotation $quotation)
    {
        //
    }

    public function update(Request $request, Quotation $quotation)
    {
        //
    }

    public function destroy(Quotation $quotation)
    {
        //
    }
}
