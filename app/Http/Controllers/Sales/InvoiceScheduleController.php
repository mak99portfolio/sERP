<?php

namespace App\Http\Controllers\Sales;

use App\InvoiceSchedule;
use App\InvoiceScheduleItem;
use App\Customer;
use App\Http\Requests\InvoiceScheduleRequest;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class InvoiceScheduleController extends Controller
{
    private $view_root = 'modules/sales/invoice_schedule/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('invoice_schedule_list', InvoiceSchedule::all());
        return $view;
    }

   
    public function create()
    {
        $view = view($this->view_root . 'create');
        $view->with('customer_list', Customer::pluck('name','id')->prepend('-- Select Customer --', '')); 
        return $view;
    }

   
    public function store(InvoiceScheduleRequest $request)
    {
        if(!$request->item_validate()){
            return redirect()->back();
        }
    $invoice_schedule = new InvoiceSchedule;
    $invoice_schedule->fill($request->input());
    $invoice_schedule->creator_user_id = Auth::id();
   // $collection_schedule->collection_schedule_no = 'SC001';
   $invoice_schedule->invoice_schedule_no = uCode('invoice_schedules.invoice_schedule_no',"IS00");
    $invoice_schedule->save();

    foreach ($request->collection_amounts as $invoice_amount){
        //dd($collection_amount);
        $cs_items[] = new InvoiceScheduleItem($invoice_amount);
    }
    $invoice_schedule->items()->saveMany($cs_items);

    Session::put('alert-success', 'Invoice Schedule created successfully');
    return redirect()->route('invoice-schedule.index');
    }

  
    public function show(InvoiceSchedule $invoiceSchedule)
    {
        $view = view($this->view_root . 'show');
        $view->with('invoiceSchedule' , $invoiceSchedule);
        return $view;
    }

   
    public function edit(InvoiceSchedule $invoiceSchedule)
    {
        //
    }

  
    public function update(Request $request, InvoiceSchedule $invoiceSchedule)
    {
        //
    }

 
    public function destroy(InvoiceSchedule $invoiceSchedule)
    {
        //
    }
}
