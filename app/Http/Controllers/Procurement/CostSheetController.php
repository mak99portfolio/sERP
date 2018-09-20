<?php

namespace App\Http\Controllers\Procurement;

use App\CostSheet;
use App\CostSheetParticular;
use App\LetterOfCredit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class CostSheetController extends Controller
{


    private $view_root = 'modules/procurement/foreign/cost_sheet/';

    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('cost_sheet_list', CostSheet::all());
        $view->with('lc_list', LetterOfCredit::pluck('letter_of_credit_no', 'id')->prepend('--select lc--', ''));
        return $view;
    }

    public function create()
    {
        $view = view($this->view_root . 'create');
        $view->with('lc_list', LetterOfCredit::pluck('letter_of_credit_no', 'id')->prepend('--select lc--', ''));
        return $view;
    }

    public function store(Request $request)
    {
        $request->validate([
            'letter_of_credit_id' => 'required|unique:insurance_cover_notes',
            'currency' => 'required',
            'exchange_rate' => 'required',
            'bdt_amount' => 'required',
            'note' => 'required',
            'percent_of_lc_margin' => 'required',
            'amount_of_lc_margin' => 'required',
            'round_amount_of_lc_margin' => 'required',
            'percent_of_lc_commision' => 'required',
            'amount_of_lc_commision' => 'required',
            'round_amount_of_lc_commision' => 'required',
            'percent_of_vat' => 'required',
            'amount_of_vat' => 'required',
            'round_amount_of_vat' => 'required',
            'percent_of_swift' => 'required',
            'amount_of_swift' => 'required',
            'round_amount_of_swift' => 'required',
            'percent_of_stamp_charge' => 'required',
            'amount_of_stamp_charge' => 'required',
            'round_amount_of_stamp_charge' => 'required',
            'percent_of_lcaf_issue_charge' => 'required',
            'amount_of_lcaf_issue_charge' => 'required',
            'round_amount_of_lcaf_issue_charge' => 'required',
            'percent_of_imp' => 'required',
            'amount_of_imp' => 'required',
            'round_amount_of_imp' => 'required',
            'percent_of_lc_application_form' => 'required',
            'amount_of_lc_application_form' => 'required',
            'round_amount_of_lc_application_form' => 'required',
            'percent_of_others' => 'required',
            'amount_of_others' => 'required',
            'round_amount_of_others' => 'required'
        ]);

        $cost_sheet = new CostSheet;
        $cost_sheet->fill($request->input());
        $cost_sheet->creator_user_id = Auth::id();
        $cost_sheet->company_id = 1;
        $cost_sheet->cost_sheet_no = time();;
        $cost_sheet->save();
        Session::put('alert-success', $cost_sheet->cost_sheet_no . " successfully created");
        return redirect()->route('insurance-cover-note.index');
    }

    public function show(CostSheet $costSheet)
    {
        //
    }

    public function edit(CostSheet $costSheet)
    {
        //
    }

    public function update(Request $request, CostSheet $costSheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CostSheet  $costSheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(CostSheet $costSheet)
    {
        //
    }
}
