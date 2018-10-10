<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use App\ProformaInvoice;
use App\PurchaseOrder;
use App\ProformaInvoiceItem;
use App\ProformaInvoicePurchaseOrder;
use App\Port;
use App\Country;
use App\CompanyProfile;
use App\City;
use App\Vendor;
use App\Http\Requests\ForeignProformaInvoiceRequest;
use Auth;
use Session;

class ProformaInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/procurement/foreign/proforma_invoice/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('proforma_invoice_list', ProformaInvoice::all());
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = view($this->view_root . 'create');
        $view->with('purchase_orders', PurchaseOrder::availablePurchaseOrder());
        $view->with('port_list', Port::pluck('name','id'));
        $view->with('country_list', Country::pluck('name','id'));
        $view->with('company_profile_list', CompanyProfile::pluck('name','id')->prepend('-- Select Company --', ''));
        $view->with('vendor_list', Vendor::pluck('name','id')->prepend('-- Select Vendor --', ''));
        $view->with('city_list', City::pluck('name','id'));
        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ForeignProformaInvoiceRequest $request)
    {
        // dd($request->purchase_order_ids);
        $proforma_invoice = new ProformaInvoice;
        $proforma_invoice->fill($request->input());
        $proforma_invoice->creator_user_id = Auth::id();
        // $proforma_invoice->proforma_invoice_no = time();
        // $proforma_invoice->generate_proforma_invoice_number();
        // dd($request->input());
        $proforma_invoice->save();


        $proforma_invoice->purchase_orders()->sync($request->purchase_order_ids);

        $items = Array();
        foreach($request->items as $item){
            array_push($items, new ProformaInvoiceItem($item));
        }
        $proforma_invoice->items()->saveMany($items);
        Session::put('alert-success', 'Proforma invoice created successfully');
        return redirect()->route('proforma-invoice.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProformaInvoice  $proformaInvoice
     * @return \Illuminate\Http\Response
     */
    public function show(ProformaInvoice $proformaInvoice)
    {
        $view = view($this->view_root . 'show');
        $view->with('proformaInvoice',$proformaInvoice);
        return $view;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProformaInvoice  $proformaInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit(ProformaInvoice $proformaInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProformaInvoice  $proformaInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProformaInvoice $proformaInvoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProformaInvoice  $proformaInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProformaInvoice $proformaInvoice)
    {
        //
    }

}
