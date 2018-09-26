<?php

namespace App\Http\Controllers\Procurement;
use App\Http\Controllers\Controller;
use App\MoveType;
use Auth;
use Session;
use Illuminate\Http\Request;

class MoveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/procurement/setting/move_type/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('movetype_list', MoveType::all());
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
            'name' => 'required|unique:move_types',
            'short_name' => 'required|unique:move_types',
        ]);
        $movetype = new MoveType;
        $movetype->fill($request->input());
        $movetype->creator_user_id = Auth::id();
        $movetype->save();
        Session::put('alert-success', $movetype->name . ' created successfully');
        return redirect()->route('move-type.index');
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
