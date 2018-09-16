<?php

namespace App\Http\Controllers\Procurement;

use App\CostParticular;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class CostParticularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $view_root = 'modules/procurement/setting/cost_particular/';

    public function index()
    {

        $view = view($this->view_root . 'index');
        $view->with('cost_particular_list', CostParticular::all());

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
            'name' => 'required|unique:cost_particulars',
            'short_name' => 'required|unique:cost_particulars',
        ]);
        $cost_particular = new CostParticular;
        $cost_particular->fill($request->input());
        $cost_particular->creator_user_id = Auth::id();
        $cost_particular->save();
        Session::put('alert-success', $cost_particular->name . ' created successfully');
        return redirect()->route('cost-particular.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CostParticulars  $costParticulars
     * @return \Illuminate\Http\Response
     */
    public function show(CostParticulars $costParticulars)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CostParticulars  $costParticulars
     * @return \Illuminate\Http\Response
     */
    public function edit(CostParticulars $costParticulars)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CostParticulars  $costParticulars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CostParticulars $costParticulars)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CostParticulars  $costParticulars
     * @return \Illuminate\Http\Response
     */
    public function destroy(CostParticulars $costParticulars)
    {
        //
    }
}
