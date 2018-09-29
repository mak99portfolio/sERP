<?php

namespace App\Http\Controllers\Core;

use App\Country;
use App\Helpers\Paginate;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductBrand;
use App\ProductCategory;
use App\ProductGroup;
use App\ProductModel;
use App\ProductPattern;
use App\ProductSet;
use App\ProductSize;
use App\UnitOfMeasurement;
use Auth;
use DB;
use Illuminate\Http\Request;
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
        $data = [
            'paginate' => new Paginate('\App\Product', ['name' => 'Name', 'hs_code' => 'HS Code']),
            'carbon' => new \Carbon\Carbon,
        ];
        return view(($this->view_root . 'index'), $data);
        // $view = view($this->view_root.'index');
        // $view->with('product_list', Product::all());
        // return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $view = view($this->view_root . 'create');
        $view->with('product_category_list', ProductCategory::pluck('name', 'id')->prepend('-- Select Product Category --', ''));
        $view->with('product_brand_list', ProductBrand::pluck('name', 'id')->prepend('-- Select Product Brand --', ''));
        $view->with('country_list', Country::pluck('name', 'id')->prepend('-- Select Country --', ''));
        $view->with('unit_of_measurement_list', UnitOfMeasurement::pluck('name', 'id')->prepend('-- Select Unit Of Measurement --', ''));
        $view->with('product_pattern_list', ProductPattern::pluck('name', 'id')->prepend('-- Select Product Pattern --', ''));
        $view->with('product_model_list', ProductModel::pluck('name', 'id')->prepend('-- Select Product Model --', ''));
        $view->with('product_set_list', ProductSet::pluck('name', 'id')->prepend('-- Select Product Set --', ''));
        $view->with('product_size_list', ProductSize::pluck('name', 'id')->prepend('-- Select Product Size --', ''));
        $view->with('product_group_list', ProductGroup::pluck('name', 'id'));
        // dd(['id' => ProductGroup::pluck('id'), 'name' => ProductGroup::pluck('name')]);
        $view->with('product_status_list', DB::table('product_statuses')->get());
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
        $request->validate([
            'name' => 'required|unique:products',
            'hs_code' => 'required|unique:products',
            'product_category_id' => 'required',
            'product_pattern_id' => 'required',
            'product_group_id' => 'required',
            'product_brand_id' => 'required',
            'product_model_id' => 'required',
            'serial' => 'required',
            'part_number' => 'required',
            'country_of_origin_country_id' => 'required',
            'country_of_manufacture_country_id' => 'required',
            'unit_of_measurement_id' => 'required',
            'product_status_id' => 'required',
            'tp_rate' => 'required',
            'mrp_rate' => 'required',
            'flat_rate' => 'required',
            'special_rate' => 'required',
            'distribution_rate' => 'required',
            'other' => 'required',
            'pack_size' => 'required',
            'shipper_carton_size' => 'required',
            'description' => 'required',
        ]);

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
        $view = view($this->view_root . 'show');
        $view->with('product', $product);
        return $view;
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
