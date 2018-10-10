<?php

namespace App\Http\Controllers\Procurement;

use App\InsuranceCoverNote;
use App\LetterOfCredit;
use App\Vendor;
use App\CompanyBank;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class InsuranceCoverNoteController extends Controller
{

    private $view_root = 'modules/procurement/foreign/insurance_cover_note/';

    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('insurance_cover_note_list', InsuranceCoverNote::all());
        return $view;
    }


    public function create()
    {
        $view = view($this->view_root . 'create');
        $view->with('insurance_cover_note_list', InsuranceCoverNote::all());
        $view->with('account_list', CompanyBank::pluck('account_no', 'id')->prepend('', ''));
        $view->with('vendor_list', Vendor::pluck('name', 'id')->prepend('', ''));
        $view->with('lc_list', LetterOfCredit::pluck('letter_of_credit_no', 'id')->prepend('', ''));
        return $view;
    }


    public function store(Request $request)
    {
        $request->validate([
            'letter_of_credit_id' => 'required|unique:insurance_cover_notes',
            'insurance_cover_note_no' => 'required|unique:insurance_cover_notes',
        ]);

        $insurance_cover_note = new InsuranceCoverNote;
        $insurance_cover_note->fill($request->input());
        $insurance_cover_note->creator_user_id = Auth::id();
        $insurance_cover_note->company_id = 1;
        $insurance_cover_note->insurance_cover_note_date = \Carbon\Carbon::parse($request->insurance_cover_note_date)->format('Y-m-d');;
        $insurance_cover_note->save();
        Session::put('alert-success', $insurance_cover_note->insurance_cover_note_no . " successfully created");
        return redirect()->route('insurance-cover-note.index');
    }


    public function show(InsuranceCoverNote $insuranceCoverNote)
    {
        $view = view($this->view_root . 'show');
        $view->with('insuranceCoverNote', $insuranceCoverNote);
        return $view;
    }


    public function edit(InsuranceCoverNote $insuranceCoverNote)
    {
        //
    }


    public function update(Request $request, InsuranceCoverNote $insuranceCoverNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InsuranceCoverNote  $insuranceCoverNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(InsuranceCoverNote $insuranceCoverNote)
    {
        //
    }
}
