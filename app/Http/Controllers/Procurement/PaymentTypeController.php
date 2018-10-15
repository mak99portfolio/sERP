<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use App\PaymentType;
use App\Http\Requests\PaymentTypeRequest;
use Illuminate\Http\Request;
use Auth;
use Session;
class PaymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/procurement/setting/payment_type/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('payment_type', PaymentType::all());
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view=view($this->view_root.'create');
        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentTypeRequest $request)
    {
        $payment_type = new PaymentType;
        $payment_type->fill($request->input());
        $payment_type->creator_user_id = Auth::id();
        $payment_type->save();
        Session::put('alert-success', 'Payment type created successfully');
        return redirect()->route('payment-type.index');
    }

    public function show(PaymentType $paymentType)
    {
        //
    }

    
    public function edit(PaymentType $paymentType)
    {
        $view = view($this->view_root . 'edit');
        $view->with('paymentType', $paymentType);
        return $view;
    }

    
    public function update(Request $request, PaymentType $paymentType)
    {
        $request->validate([
            'name' => 'required|unique:payment_types,name,'.$paymentType->id,
            'short_name' => 'required|unique:payment_types,short_name,'.$paymentType->id,
        ]);
        $paymentType->fill($request->all());
        $paymentType->update();
        Session::put('alert-success',$paymentType->name . ' updated successfully!');
        return redirect()->route('payment-type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentType $paymentType)
    {
        //
    }
}
