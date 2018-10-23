<?php

namespace App\Http\Controllers\Core;

use App\ProductBrand;
use Illuminate\Http\Request;
use App\http\Controllers\Controller;
use Auth;
use Session;

class ProductBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/core/product_brand/';
    public function index()
    {
        $view = view($this->view_root.'index');
        $view->with('product_brand', ProductBrand::all());
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
            'name' => 'required|unique:product_brands',
            'short_name' => 'required|unique:product_brands',
        ]);
        $pb = new ProductBrand;
        $pb->fill($request->input());
        $pb->creator_user_id = Auth::id();
        $pb->save();
        Session::put('alert-success', $pb->name . ' created successfully');
        return redirect()->route('product-brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function show(ProductBrand $productBrand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductBrand $productBrand)
    {
        $view = view($this->view_root.'edit');
        $view->with('productBrand', $productBrand);
        return $view;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductBrand $productBrand)
    {
        $request->validate([
            'name' => 'required|unique:product_brands,name,'.$productBrand->id,
            'short_name' => 'required|unique:product_brands,short_name,'.$productBrand->id,
        ]);
        $productBrand->fill($request->all());
        $productBrand->update();
        Session::put('alert-success',$productBrand->name . ' updated successfully!');
        return redirect()->route('product-brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductBrand $productBrand)
    {
        //
    }
}
