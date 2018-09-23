<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use App\LetterOfCredit;
use App\Vendor;
use App\ProformaInvoice;
use App\LetterOfCreditProformaInvoice;
use App\LetterOfCreditItem;
use Illuminate\Http\Request;
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
        $view->with('vendor_list', Vendor::pluck('name','id')->prepend('-- Select Country --', ''));
        $view->with('proforma_invoice_list', ProformaInvoice::pluck('proforma_invoice_no','id')->prepend('-- Select proforma invoice --', ''));
        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->proforma_invoice_ids);
        $request->validate([
            'letter_of_credit_no' => 'required',
            'letter_of_credit_date' => 'required',
            // 'letter_of_credit_value' => 'required',
            'vendor_id' => 'required',
            // 'letter_of_credit_expire_date' => 'required',
            // 'letter_of_credit_status' => 'required',
            // 'letter_of_credit_shipment_date' => 'required',
            // 'currency' => 'required',
            // 'beneficiary_ac_no' => 'required',
            // 'beneficiary_ac_name' => 'required',
            // 'beneficiary_branch_name' => 'required',
            // 'beneficiary_bank_name' => 'required',
            // 'issue_ac_no' => 'required',
            // 'issue_ac_name' => 'required',
            // 'issue_branch_name' => 'required',
            // 'issue_bank_name' => 'required',
            // 'partial_shipment' => 'required',
            // 'transhipment_information' => 'required',
        ]);
        $letter_of_credit = new LetterOfCredit;
        $letter_of_credit->fill($request->input());
        $letter_of_credit->creator_user_id = Auth::id();
        $letter_of_credit->save();

        $letter_of_credit->proforma_invoices()->sync($request->proforma_invoice_ids);

        $items = Array();
        foreach($request->items as $item){
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
        $view->with('letterOfCredit',$letterOfCredit);
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
