<?php

namespace App\Http\Controllers\Sales;

use App\CollectionSchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectionScheduleController extends Controller
{
    private $view_root = 'modules/sales/collection_schedule/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        return $view;
    }

    public function create()
    {
        $view = view($this->view_root . 'create');
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
     * @param  \App\CollectionSchedule  $collectionSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(CollectionSchedule $collectionSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CollectionSchedule  $collectionSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(CollectionSchedule $collectionSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CollectionSchedule  $collectionSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CollectionSchedule $collectionSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CollectionSchedule  $collectionSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(CollectionSchedule $collectionSchedule)
    {
        //
    }
}
