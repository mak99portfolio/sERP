<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use App\BillOfLading;
use App\BillOfLadingItem;
use App\CommercialInvoice;
use App\Vendor;
use App\LetterOfCredit;
use App\ModesOfTransport;
use App\MoveType;
use App\CompanyProfile;
use App\Port;
use Illuminate\Http\Request;
use Auth;
use Session;
class BillOfLadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/procurement/foreign/bill_of_lading/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('bill_of_lading_list', BillOfLading::all());
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
        // $view->with('commercial_invoice_list', CommercialInvoice::pluck('bill_of_lading_no', 'bill_of_lading_no')->prepend('-- Select Bill Number --', ''));
        $view->with('exporter_list', Vendor::pluck('name', 'id')->prepend('-- Select --', ''));
        $view->with('port_list', Port::pluck('name','id'));
        $view->with('letter_of_credit_list', LetterOfCredit::pluck('letter_of_credit_no','id')->prepend('-- Select Letter of Credit --', ''));
        $view->with('modes_of_transport_list', ModesOfTransport::pluck('name','id')->prepend('-- Select Modes Of Transport --', ''));
        $view->with('move_type_list', MoveType::pluck('name','id')->prepend('-- Select Move Type --', ''));
        $view->with('company_profile_list', CompanyProfile::pluck('name','id')->prepend('-- Select Company --', ''));
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
        // dd($request->input());
        $bill_of_lading = new BillOfLading;
        $bill_of_lading->fill($request->input());
        $bill_of_lading->creator_user_id = Auth::id();
        $bill_of_lading->bill_of_lading_date = date("Y-m-d",strtotime($request->bill_of_lading_date));
        $bill_of_lading->letter_of_credit_date = date("Y-m-d",strtotime($request->letter_of_credit_date));

        $bill_of_lading->save();

        $bill_of_lading->commercial_invoices()->sync($request->ci_ids);
       
        $items = Array();
        foreach($request->items as $item){
            array_push($items, new BillOfLadingItem($item));
        }
        $bill_of_lading->items()->saveMany($items);

        Session::put('alert-success', 'Bill of lading created successfully');
        return redirect()->route('bill-of-lading.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BillOfLading  $billOfLading
     * @return \Illuminate\Http\Response
     */
    public function show(BillOfLading $billOfLading)
    {
        $view = view($this->view_root . 'show');
        $view->with('bill_of_lading',$billOfLading);
        return $view;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BillOfLading  $billOfLading
     * @return \Illuminate\Http\Response
     */
    public function edit(BillOfLading $billOfLading)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BillOfLading  $billOfLading
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BillOfLading $billOfLading)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BillOfLading  $billOfLading
     * @return \Illuminate\Http\Response
     */
    public function destroy(BillOfLading $billOfLading)
    {
        //
    }
}
