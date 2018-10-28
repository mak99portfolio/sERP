<?php

namespace App\Http\Controllers\Sales;

use App\CollectionSchedule;
use App\CollectionScheduleItem;
use App\SalesInvoice;
use App\Customer;
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
        $view->with('collection_schedule_list', CollectionSchedule::all());
        return $view;
    }

    public function create()
    {
        $view = view($this->view_root . 'create');
        $view->with('customer_list', Customer::pluck('name','id')->prepend('-- Select Customer --', ''));
        return $view;
    }

    public function store(Request $request)
    {
        //dd($request->input());
        $request->validate([  
            'customer_id' => 'required'
        ]);
        $collection_schedule = new CollectionSchedule;
        $collection_schedule->fill($request->input());
        $collection_schedule->creator_user_id = Auth::id();
       // $collection_schedule->collection_schedule_no = 'SC001';
       $collection_schedule->collection_schedule_no = uCode('collection_schedules.collection_schedule_no',"SC001");
        $collection_schedule->save();

        foreach ($request->collection_amounts as $collection_amount){
            //dd($collection_amount);
            $cs_items[] = new CollectionScheduleItem($collection_amount);
        }
        $collection_schedule->items()->saveMany($cs_items);

        Session::put('alert-success', 'Collection Schedule created successfully');
        return redirect()->route('collection-schedule.index');
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
