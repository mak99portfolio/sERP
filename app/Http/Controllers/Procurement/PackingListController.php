<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use App\PackingList;
use App\PackingListItem;
use App\Country;
use App\Port;
use App\City;
use App\LetterOfCredit;
use App\CommercialInvoice;
use Auth;
use Session;
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
        $view->with('packing_list', PackingList::all());
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
        $view->with('ci_list', CommercialInvoice::all());
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
     
           'commercial_invoice_id' => 'required',
           'currency' => 'required',
        
      ]);
        $packing_list = new PackingList;
        $packing_list->fill($request->input());
        $packing_list->creator_user_id = Auth::id();
        $packing_list->save();
        foreach ($request->items as $item){
            $packing_list_items[] = new PackingListItem($item);
        }
        $packing_list->items()->saveMany($packing_list_items);
        Session::put('alert-success', 'Packing List created successfully');
        return redirect()->route('packing-list.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PackingList  $packingList
     * @return \Illuminate\Http\Response
     */
    public function show(PackingList $packingList)
    {
     $view = view($this->view_root . 'show');
        $view->with('packingList', $packingList);
        return $view;
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
