<?php

namespace App\Http\Controllers\Procurement;

use App\Cnf;
use App\ConsignmentParticularCnf;
use App\ConsignmentParticular;
use App\BillOfLading;
use App\LetterOfCredit;
use App\Vendor;
use App\CompanyProfile;
use App\CommercialInvoice;
use App\Http\Requests\CnfRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class CnfController extends Controller
{
    private $view_root = 'modules/procurement/foreign/cnf/';

    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('cnf_list', Cnf::all());
        return $view;
    }

    public function create()
    {
        $view = view($this->view_root . 'create');
        $view->with('lc_list', LetterOfCredit::all());
        $view->with('vendor_list', Vendor::pluck('name', 'id')->prepend('--select vendor--', ''));
        $view->with('bill_of_lading_list', BillOfLading::pluck('bill_of_lading_no', 'id')->prepend('-- Select Bill Number --', ''));
        $view->with('consignment_partucular_list', ConsignmentParticular::all());
        $view->with('company_profile_list', CompanyProfile::pluck('name','id')->prepend('-- Select Company --', ''));

        return $view;
    }

    public function store(CnfRequest $request)
    {
        // dd($request->input());
        if(!$request->consignment_particular_validate()){
            return redirect()->back();
        }

        $cnf = new Cnf;
        $cnf->fill($request->input());
        $cnf->creator_user_id = Auth::id();
        $cnf->company_id = 1;
        $cnf->status = 1;
        $cnf->cnf_no = time();
        $cnf->bill_date = \Carbon\Carbon::parse($request->bill_date)->format('Y-m-d');
        $cnf->bill_of_entry_date = \Carbon\Carbon::parse($request->bill_of_entry_date)->format('Y-m-d');
        $cnf->arrival_date = \Carbon\Carbon::parse($request->arrival_date)->format('Y-m-d');
        $cnf->delivery_date = \Carbon\Carbon::parse($request->delivery_date)->format('Y-m-d');
        $cnf->duty_payment_date = \Carbon\Carbon::parse($request->duty_payment_date)->format('Y-m-d');
        $cnf->save();
        $consignment_particular_cnf = new ConsignmentParticularCnf;
        $consignment_particular_cnf->fill($request->input());

        $particulars = Array();
        foreach($request->items as $item){
            array_push($particulars, new ConsignmentParticularCnf($item));
        }

        $cnf->consignment_particular_cnf()->saveMany($particulars);


        Session::put('alert-success', $cnf->cnf_no . " successfully created");
        return redirect()->route('cnf.index');
    }

    public function show(Cnf $cnf)
    {
        // dd($cnf->consignment_particular_cnf);
        $view = view($this->view_root . 'show');
        $view->with('cnf', $cnf);
        return $view;
    }

    public function edit(Cnf $cnf)
    {
        //
    }

    public function update(Request $request, Cnf $cnf)
    {
        //
    }

    public function destroy(Cnf $cnf)
    {
        //
    }
}
