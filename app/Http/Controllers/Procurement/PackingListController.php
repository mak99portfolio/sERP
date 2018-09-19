<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use App\PackingList;
use Illuminate\Http\Request;

class PackingListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/procurement/foreign/packing_list/';
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
        $view = view($this->view_root . 'create');
        // $view->with('foo', 'bar');
        // your code here
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PackingList  $packingList
     * @return \Illuminate\Http\Response
     */
    public function show(PackingList $packingList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PackingList  $packingList
     * @return \Illuminate\Http\Response
     */
    public function edit(PackingList $packingList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PackingList  $packingList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PackingList $packingList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PackingList  $packingList
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackingList $packingList)
    {
        //
    }
}
