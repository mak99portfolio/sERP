<?php

namespace App\Http\Controllers\Procurement;

use App\Cnf;
use App\ConsignmentParticularCnf;
use App\ConsignmentParticular;
use App\LetterOfCredit;
use App\Vendor;
use App\CommercialInvoice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class CnfController extends Controller
{
    private $view_root = 'modules/procurement/foreign/cnf/';

    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('cnf_list', Cnf::all());
        return $view;
    }

    public function create()
    {
        $view = view($this->view_root . 'create');
        $view->with('lc_list', LetterOfCredit::all());
        $view->with('vendor_list', Vendor::pluck('name', 'id')->prepend('--select vendor--', ''));
        $view->with('commercial_invoice_list', CommercialInvoice::all());
        $view->with('consignment_partucular_list', ConsignmentParticular::all());

        return $view;
    }

    public function store(Request $request)
    {
        dd($request->input());
        $request->validate([
            'letter_of_credit_id' => 'required|unique:insurance_cover_notes',
            'commercial_invoice_id' => 'required',
            'vendor_id' => 'required',
            'consignee' => 'required',
            'bill_no' => 'required',
            'bill_date' => 'required',
            'bill_of_entry_no' => 'required',
            'bill_of_entry_date' => 'required',
            'arrival_date' => 'required',
            'delivery_date' => 'required',
            'job_no' => 'required',
            'cnf_value' => 'required',
            'usd_amount' => 'required',
            'exchange_rate' => 'required',
            'bdt_amount' => 'required',
            'total_day' => 'required',
            'duty_payment_date' => 'required',
            // 'consignment_particular_amount' => 'required',
            // 'previous_due_amount' => 'required',
            // 'cash_recieved_amount' => 'required',
            'note' => 'required'
            // 'consignment_particular_id' => 'required'
        ]);

        $cnf = new Cnf;
        $cnf->fill($request->input());
        $cnf->creator_user_id = Auth::id();
        $cnf->company_id = 1;
        $cnf->cnf_no = time();
        $cnf->save();
        $consignment_particular_cnf = new ConsignmentParticularCnf;
        $consignment_particular_cnf->fill($request->input());
        // $particulars = Array();
        // foreach($request->items as $item){
        //     array_push($items, new LetterOfCreditItem($item));
        // }
        $cnf->consignment_particular_cnf()->save($consignment_particular_cnf);
        Session::put('alert-success', $cnf->cnf_no . " successfully created");
        return redirect()->route('cnf.index');
    }

    public function show(Cnf $cnf)
    {
        $view = view($this->view_root . 'show');
        // $view->with('cnf', $cnf);
        return $view;
    }

    public function edit(Cnf $cnf)
    {
        //
    }

    public function update(Request $request, Cnf $cnf)
    {
        //
    }

    public function destroy(Cnf $cnf)
    {
        //
    }
}
