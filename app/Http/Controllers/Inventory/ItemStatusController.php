<?php

namespace App\Http\Controllers\Inventory;

use App\InventoryItemStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class ItemStatusController extends Controller{

    private $view_root = 'modules/inventory/item_status/';

    public function index(){

        $view = view($this->view_root.'index');
        $view->with('item_status_list', InventoryItemStatus::all());
        return $view;

    }


    public function create(){

        $view = view($this->view_root.'create');
        return $view;

    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:inventory_item_statuses',
            'short_name' => 'required|unique:inventory_item_statuses',
        ]);
        $item_status = new InventoryItemStatus;
        $item_status->fill($request->input());
        $item_status->creator_user_id = Auth::id();
        $item_status->save();
        Session::put('alert-success', $item_status->name . ' created successfully');
        return redirect()->route('item-status.index');
    }


    public function show($id){

    }


    public function edit($id){

    }


    public function update(Request $request, $id){

    }


    public function destroy($id){

    }

}
