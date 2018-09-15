<?php

namespace App\Http\Controllers\Core;
use App\Product;
use App\ProductBrand;
use App\ProductCategory;
use App\Country;
use App\UnitOfMeasurement;
use App\ProductPattern;
use App\ProductGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/core/product/';
    public function index()
    {
        $view = view($this->view_root.'index');
        $view->with('product_list', Product::all());
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
        $view->with('product_brand_list', ProductBrand::all());
        $view->with('product_category_list', ProductCategory::all());
        $view->with('country_list', Country::all());
        $view->with('unit_of_measurement_list', UnitOfMeasurement::all());
        $view->with('product_pattern_list', ProductPattern::all());
        $view->with('product_group_list', ProductGroup::all());
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
        $product = new Product;
        $product->fill($request->input());
        $product->creator_user_id = Auth::id();
        // dd($product);
        $product->save();
        Session::put('alert-success', $product->name . ' created successfully');
        return redirect()->route('product.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
