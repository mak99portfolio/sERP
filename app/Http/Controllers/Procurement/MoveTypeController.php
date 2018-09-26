<?php

namespace App\Http\Controllers\Procurement;
use App\Http\Controllers\Controller;
use App\MoveType;
use Illuminate\Http\Request;

class MoveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/procurement/foreign/move_type/';
    public function index()
    {
        $view = view($this->view_root . 'index');
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
     * @param  \App\MoveType  $moveType
     * @return \Illuminate\Http\Response
     */
    public function show(MoveType $moveType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MoveType  $moveType
     * @return \Illuminate\Http\Response
     */
    public function edit(MoveType $moveType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MoveType  $moveType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MoveType $moveType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MoveType  $moveType
     * @return \Illuminate\Http\Response
     */
    public function destroy(MoveType $moveType)
    {
        //
    }
}
