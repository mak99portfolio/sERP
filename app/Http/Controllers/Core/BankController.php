<?php

namespace App\Http\Controllers\Core;

use App\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use Auth;
use Session;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $view_root = 'modules/core/bank/';

    public function index()
    {
        // $data = [
        //     'countries' => \App\Country::pluck( 'name', 'id')
        // ];

        $view = view($this->view_root . 'index');
        $view->with('bank_list', Bank::all());
        $view->with('country_list', Country::all());

        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = view($this->view_root.'create');
        $view->with('country_list', Country::all());
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
        $request->validate([
            'name' => 'required|unique:banks',
            'country_id' => 'required',
            'short_name' => 'required|unique:banks',
            'description' => 'required'
        ]);

        $bank = new Bank;
        $bank->fill($request->input());
        $bank->creator_user_id = Auth::id();
        $bank->save();
        Session::put('alert-success', $bank->name . " successfully created");
        return redirect()->route('bank.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        //
    }
}
