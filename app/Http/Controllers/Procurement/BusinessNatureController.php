<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;

use App\BusinessNature;
use Illuminate\Http\Request;
use Auth;
use Session;

class BusinessNatureController extends Controller
{
    private $view_root = 'modules/procurement/setting/business_nature/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('business_nature_list', BusinessNature::all());
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
        $business_nature = new BusinessNature;
        $business_nature->fill($request->input());
        $business_nature->creator_user_id = Auth::id();
        $business_nature->save();
        Session::put('alert-success', $business_nature->name . ' created successfully');
        return redirect()->route('business-nature.index');
    }

   
    public function show(BusinessNature $businessNature)
    {
        //
    }

    
    public function edit(BusinessNature $businessNature)
    {
        //
    }

    
    public function update(Request $request, BusinessNature $businessNature)
    {
        //
    }

   
    public function destroy(BusinessNature $businessNature)
    {
        //
    }
}
