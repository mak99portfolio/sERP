<?php

namespace App\Http\Controllers\Sales;

use App\CollectionSchedule;
use App\SalesInvoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

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
      //  $view->with('sales_invoice_list', SalesInvoice::pluck('name','id')->prepend('-- Select Invoice No --', ''));
        return $view;
    }

    public function store(Request $request)
    {
        dd($request->input());
        $request->validate([  
            'invoice_id' => 'required',
            'collection_date' => 'required',
            'amount' => 'required'
        ]);
        $collection_schedule = new CollectionSchedule;
        $collection_schedule->fill($request->input());
        $collection_schedule->creator_user_id = Auth::id();
        $collection_schedule->save();
        Session::put('alert-success', 'Collection Schedule created successfully');
        return redirect()->route('collection-schedule.create');
    }

   
    public function show(CollectionSchedule $collectionSchedule)
    {
        //
    }

    public function edit(CollectionSchedule $collectionSchedule)
    {
        //
    }

    public function update(Request $request, CollectionSchedule $collectionSchedule)
    {
        //
    }

    public function destroy(CollectionSchedule $collectionSchedule)
    {
        //
    }
}
