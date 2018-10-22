<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use App\Http\Requests\LetterOfCreditRequest;
use App\LetterOfCredit;
use App\LetterOfCreditApplicationNumber;
use App\LetterOfCreditItem;
use App\ProformaInvoice;
use App\CompanyBank;
use App\Currency;
use App\Vendor;
use DB;
use Auth;
use Session;

class LetterOfCreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/procurement/foreign/letter_of_credit/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('letter_of_credit_list', LetterOfCredit::all());
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
        $view->with('currency_list', Currency::pluck('name', 'id')->prepend('-- Select Currency --', ''));
        $view->with('vendor_list', Vendor::pluck('name', 'id')->prepend('-- Select Vendor --', ''));
        $view->with('company_bank_list', CompanyBank::pluck('account_no', 'id')->prepend('-- Select Account --', ''));
        $view->with('proforma_invoice_list', ProformaInvoice::pluck('proforma_invoice_no', 'id')->prepend('', ''));
        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LetterOfCreditRequest $request)
    {

        // dd($request->input());

        $letter_of_credit = new LetterOfCredit;
        $letter_of_credit->fill($request->input());
        $letter_of_credit->creator_user_id = Auth::id();
        $letter_of_credit->save();
        $letter_of_credit->proforma_invoices()->sync($request->proforma_invoice_ids);
       
        if ($request->lca_nos) {
            $lca_nos = array();
            foreach ($request->lca_nos as $lca_no) {
                array_push($lca_nos, new LetterOfCreditApplicationNumber($lca_no));
            }
            $letter_of_credit->application_numbers()->saveMany($lca_nos);
        }

        $items = array();
        foreach ($request->items as $item) {
            array_push($items, new LetterOfCreditItem($item));
        }
        $letter_of_credit->items()->saveMany($items);
        Session::put('alert-success', 'Letter of credit created successfully');
        return redirect()->route('letter-of-credit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LetterOfCredit  $letterOfCredit
     * @return \Illuminate\Http\Response
     */
    public function show(LetterOfCredit $letterOfCredit)
    {
        $view = view($this->view_root . 'show');
        $view->with('letterOfCredit', $letterOfCredit);
        return $view;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LetterOfCredit  $letterOfCredit
     * @return \Illuminate\Http\Response
     */
    public function edit(LetterOfCredit $letterOfCredit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LetterOfCredit  $letterOfCredit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LetterOfCredit $letterOfCredit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LetterOfCredit  $letterOfCredit
     * @return \Illuminate\Http\Response
     */
    public function destroy(LetterOfCredit $letterOfCredit)
    {
        //
    }

}
