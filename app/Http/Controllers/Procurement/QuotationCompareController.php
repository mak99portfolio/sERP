<?php

namespace App\Http\Controllers\Procurement;


use App\QuotationCompare;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class QuotationCompareController extends Controller
{
    private $view_root = 'modules/procurement/local/quotation_compare/';

    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('quotation_compare_list', QuotationCompare::all());
        return $view;
    }

    public function create()
    {
        $view = view($this->view_root . 'create');
        return $view;
    }

    public function store(Request $request)
    {
        //
    }

    public function show(QuotationCompare $quotationCompare)
    {
        //
    }

    public function edit(QuotationCompare $quotationCompare)
    {
        //
    }

    public function update(Request $request, QuotationCompare $quotationCompare)
    {
        //
    }

    public function destroy(QuotationCompare $quotationCompare)
    {
        //
    }
}
