<?php

namespace App\Http\Controllers\Procurement;

use App\VendorCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class VendorCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/procurement/setting/vendor_category/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        // $view->with('foo', 'bar');
        // your code here
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
        // $view->with('foo', 'bar');
        // your code here
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
        $vendor_category = new VendorCategory();
        $vendor_category->fill($request->input());
        $vendor_category->creator_user_id = Auth::id();
        $vendor_category->save();
        Session::put('alert-success', $vendor_category->name .' created successfully.');
        return redirect()->route('vendor-category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VendorCategory  $vendorCategory
     * @return \Illuminate\Http\Response
     */
    public function show(VendorCategory $vendorCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VendorCategory  $vendorCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(VendorCategory $vendorCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VendorCategory  $vendorCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VendorCategory $vendorCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VendorCategory  $vendorCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(VendorCategory $vendorCategory)
    {
        //
    }
}
