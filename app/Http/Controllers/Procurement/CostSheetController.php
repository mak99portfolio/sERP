<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use App\CostSheet;
use Illuminate\Http\Request;

class CostSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $view_root = 'modules/procurement/foreign/cost_sheet/';

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
     * @param  \App\CostSheet  $costSheet
     * @return \Illuminate\Http\Response
     */
    public function show(CostSheet $costSheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CostSheet  $costSheet
     * @return \Illuminate\Http\Response
     */
    public function edit(CostSheet $costSheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CostSheet  $costSheet
     * @return \Illuminate\Http\Response
     */
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
