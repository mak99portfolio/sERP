<?php

namespace App\Http\Controllers\Sales;

use App\SalesInvoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesInvoiceController extends Controller{

    protected function path(string $suffix){
        return "modules.sales.invoice.{$suffix}";
    }

    public function index(){

        return view($this->path('index'));

    }

    public function create(){

        return view($this->path('create'));

    }

    public function ui(){
        return view($this->path('ui'));
    }

    public function store(Request $request){

    }

    public function show(SalesInvoice $salesInvoice){
        
    }

    public function edit(SalesInvoice $salesInvoice){
        
    }

    public function update(Request $request, SalesInvoice $salesInvoice){
        
    }

    public function destroy(SalesInvoice $salesInvoice){
        
    }
}
