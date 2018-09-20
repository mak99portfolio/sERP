<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
use App\City;
use App\Port;
use App\LetterOfCredit;
use App\CommercialInvoice;
use Auth;
use Session;

class CommercialInvoiceController extends Controller {

    private $view_root = 'modules/procurement/foreign/commercial_invoice/';

    public function index() {
        $view = view($this->view_root . 'index');
        $view->with('commercial_invoice_list', CommercialInvoice::all());
        // $view->with('foo', 'bar');
        // your code here
        return $view;
    }

    public function create() {


        $view = view($this->view_root . 'create');
        $view->with('country_list', Country ::pluck('name', 'id')->prepend('--Select Country--'));
        $view->with('port_list', Port ::pluck('name', 'id')->prepend('--Select Port--'));
        $view->with('city_list', City ::pluck('name', 'id')->prepend('--Select City--'));
        $view->with('lc_list', LetterOfCredit::all());
        return $view;
    }

    public function store(Request $request) {
        // dd($request->input());
        $request->validate([
            // 'requisition_no'=>'required',
            'commercial_invoice_no' => 'required',
        ]);
        $commercial_invoice = new CommercialInvoice;
        $commercial_invoice->fill($request->input());
        $commercial_invoice->creator_user_id = Auth::id();
        $commercial_invoice->save();
        Session::put('alert-success', 'Commercial Invoice created successfully');
        return redirect()->route('commercial-invoice.create');
    }

    public function show(CommercialInvoice $commercialInvoice) {
        $view = view($this->view_root . 'show');
        $view->with('commercial_invoice', $commercialInvoice);
        return $view;
    }

    public function edit(CommercialInvoice $commercialInvoice) {
        //
    }

    public function update(Request $request, CommercialInvoice $commercialInvoice) {
        //
    }

    public function destroy(CommercialInvoice $commercialInvoice) {
        //
    }

    public function getLcByLcId($id) {
        $lc = LetterOfCredit::find($id);
        $lc_items = $lc->items;
        foreach ($lc_items as $lc_item) {
            $items[] = [
                'product_id' => $lc_item->product_id,
                'quantity' => $lc_item->quantity,
                'name' => $lc_item->product->name,
                'unit_price' => $lc_item->unit_price,
            ];
        }
        $data['items']=$items;
        $data['letter_of_credit_date'] = $lc->letter_of_credit_date;
        $data['beneficiary_ac_no'] = $lc->beneficiary_ac_no;
        $data['beneficiary_ac_name'] = $lc->beneficiary_ac_name;
        $data['beneficiary_bank_name'] = $lc->beneficiary_bank_name;
        $data['beneficiary_branch_name'] = $lc->beneficiary_branch_name;
        return response()->json($data);
    }

}
