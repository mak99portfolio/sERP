<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use App\Model\Pocurement\CommercialInvoice;
use Illuminate\Http\Request;
use App\Country;
use App\City;
use App\Port;
use App\LetterOfCredit;

class CommercialInvoiceController extends Controller
{
   
    private $view_root = 'modules/procurement/foreign/commercial_invoice/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        // $view->with('foo', 'bar');
        // your code here
        return $view;
    }

  
    public function create()
    {
        
        
        $view = view($this->view_root . 'create');
       $view->with('country_list',Country ::pluck('name', 'id')->prepend('--Select Country--'));
       $view->with('port_list',Port ::pluck('name', 'id')->prepend('--Select Port--'));
       $view->with('city_list',City ::pluck('name', 'id')->prepend('--Select City--'));
       $view->with('lc_list', LetterOfCredit::pluck('letter_of_credit_no', 'id')->prepend('--Select LC--'));
        return $view;
    }

 
    public function store(Request $request)
    {
        //
    }

    public function show(CommercialInvoice $commercialInvoice)
    {
        //
    }

  
    public function edit(CommercialInvoice $commercialInvoice)
    {
        //
    }

 
    public function update(Request $request, CommercialInvoice $commercialInvoice)
    {
        //
    }

 
    public function destroy(CommercialInvoice $commercialInvoice)
    {
        //
    }
}
