<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;

use App\BusinessType;
use Illuminate\Http\Request;
use Auth;
use Session;

class BusinessTypeController extends Controller
{
    private $view_root = 'modules/procurement/setting/business_type/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('business_type_list', BusinessType::all());
        return $view;
    }

   
    public function create()
    {
        $view = view($this->view_root . 'create');
        return $view;
    }

   
    public function store(Request $request)
    {
        $request->validate([  
            'name' => 'required'
        ]);
        $business_type = new BusinessType;
        $business_type->fill($request->input());
        $business_type->creator_user_id = Auth::id();
        $business_type->save();
        Session::put('alert-success', $business_type->name . ' created successfully');
        return redirect()->route('business-type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BusinessType  $businessType
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessType $businessType)
    {
        //
    }

    
    public function edit(BusinessType $businessType)
    {
        $view = view($this->view_root.'edit');
        $view->with('businessType',$businessType);
        return $view;
    }

    
    public function update(Request $request, BusinessType $businessType)
    {
        $request->validate([  
            'name' => 'required'
        ]);
       
        $businessType->fill($request->input());
        $businessType->update();
        Session::put('alert-success', $businessType->name . ' updated successfully');
        return redirect()->route('business-type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BusinessType  $businessType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessType $businessType)
    {
        //
    }
}
