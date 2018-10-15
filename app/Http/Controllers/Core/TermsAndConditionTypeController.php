<?php

namespace App\Http\Controllers\Core;
use App\Http\Controllers\Controller;

use App\TermsAndConditionType;
use Illuminate\Http\Request;
use Auth;
use Session;

class TermsAndConditionTypeController extends Controller
{
   
    private $view_root = 'modules/core/terms_and_condition_type/';
    public function index()
    {
        $view = view($this->view_root.'index');
        $view->with('terms_and_condition_type_list', TermsAndConditionType::all());
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
            'name' => 'required|unique:terms_and_condition_types',
            'short_name' => 'required|unique:terms_and_condition_types'
        ]);
        $terms_condition_type = new TermsAndConditionType;
        $terms_condition_type->fill($request->input());
        $terms_condition_type->creator_user_id = Auth::id();
        $terms_condition_type->save();
        Session::put('alert-success', 'Terms And Condition Type type created successfully');
        return redirect()->route('terms-and-condition-type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TermsAndConditionType  $termsAndConditionType
     * @return \Illuminate\Http\Response
     */
    public function show(TermsAndConditionType $termsAndConditionType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TermsAndConditionType  $termsAndConditionType
     * @return \Illuminate\Http\Response
     */
    public function edit(TermsAndConditionType $termsAndConditionType)
    {
       // dd($termsAndConditionType);
        $view = view($this->view_root.'edit');
        $view->with('termsAndConditionType',$termsAndConditionType);
        return $view;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TermsAndConditionType  $termsAndConditionType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TermsAndConditionType $termsAndConditionType)
    {
        $request->validate([
            'name' => 'required|unique:terms_and_condition_types,name,'.$termsAndConditionType->id,
            'short_name' => 'required|unique:terms_and_condition_types,short_name,'.$termsAndConditionType->id,
        ]);
        $termsAndConditionType->fill($request->all());
        $termsAndConditionType->update();
        Session::put('alert-success',$termsAndConditionType->name . ' updated successfully!');
        return redirect()->route('terms-and-condition-type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TermsAndConditionType  $termsAndConditionType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TermsAndConditionType $termsAndConditionType)
    {
        //
    }
}
