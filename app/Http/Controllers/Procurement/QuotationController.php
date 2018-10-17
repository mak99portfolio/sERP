<?php

namespace App\Http\Controllers\Procurement;

use App\Quotation;
use App\Vendor;
use App\LocalRequisition;
use App\PaymentType;
use App\TermsAndConditionType;
use App\QuotationPaymentTerm;
use App\QuotationTermsCondition;
use App\Http\Requests\QuotationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class QuotationController extends Controller
{
    private $view_root = 'modules/procurement/local/quotation/';

    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('quotation_list', Quotation::all());
        return $view;
    }

    public function create()
    {
        $view = view($this->view_root . 'create');
        $view->with('vendor_list', Vendor::pluck('name','id')->prepend('', ''));
        $view->with('payment_type_list', PaymentType::all());
        $view->with('terms_conditions_type_list', TermsAndConditionType::all());
        $view->with('local_requisition_list', LocalRequisition::pluck('requisition_no','id')->prepend('', ''));
        return $view;
    }

    public function store(QuotationRequest $request)
    {
        // dd($request->all());

        if(!$request->payment_type_validate()){
            return redirect()->back();
        }

        if(!$request->terms_and_condition_type_validate()){
            return redirect()->back();
        }

        $quotation = new Quotation;
        $quotation->fill($request->input());
        $quotation->creator_user_id = Auth::id();
        $quotation->company_id = 1;
        $quotation->generate_purchase_order_number();
        $quotation->delivery_date = \Carbon\Carbon::parse($request->delivery_date)->format('Y-m-d');
        $quotation->save();
        $quotation->items()->createMany($request->get('items'));
        foreach($request->payment_terms as $item){
            $payment_term = new QuotationPaymentTerm;
            $payment_term->fill($item);
            $payment_term->payment_date = \Carbon\Carbon::parse($item['payment_date'])->format('Y-m-d');
            $payment_terms[] = $payment_term;
        }
        $quotation->payment_terms()->saveMany($payment_terms);
        $quotation->terms_conditions()->createMany($request->get('terms_conditions'));
        Session::put('alert-success', 'Quotation created successfully. Purchase Order No: ' . $quotation->quotation_no);
        return redirect()->route('quotation.index');

    }

    public function show(Quotation $quotation)
    {
        //dd($quotation->find(2)->terms_conditions);
        $view = view($this->view_root . 'show');
        $view->with('quotation', $quotation);
        return $view;
    }

    public function edit(Quotation $quotation)
    {
        //
    }

    public function update(Request $request, Quotation $quotation)
    {
        //
    }

    public function destroy(Quotation $quotation)
    {
        //
    }
}
