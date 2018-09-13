<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use App\InsuranceCoverNote;
use Illuminate\Http\Request;

class InsuranceCoverNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/procurement/foreign/insurance_cover_note/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        // $view->with('foo', 'bar');
        // your code here
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InsuranceCoverNote  $insuranceCoverNote
     * @return \Illuminate\Http\Response
     */
    public function show(InsuranceCoverNote $insuranceCoverNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InsuranceCoverNote  $insuranceCoverNote
     * @return \Illuminate\Http\Response
     */
    public function edit(InsuranceCoverNote $insuranceCoverNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InsuranceCoverNote  $insuranceCoverNote
     * @return \Illuminate\Http\Response
     */
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
