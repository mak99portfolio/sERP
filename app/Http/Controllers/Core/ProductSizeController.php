<?php
namespace App\Http\Controllers\Core;
use App\Http\Controllers\Controller;
use App\ProductSize;
use Illuminate\Http\Request;
use Session;
use Auth;
class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/core/product_size/';
    public function index()
    {
        $view = view($this->view_root.'index');
        $view->with('product_size_list', ProductSize::all());
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
        $product_size = new ProductSize;
        $product_size->fill($request->input());
        $product_size->creator_user_id = Auth::id();
        $product_size->save();
        Session::put('alert-success', $product_size->name . ' created successfully');
        return redirect()->route('product-size.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductSize  $productSize
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSize $productSize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductSize  $productSize
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductSize $productSize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductSize  $productSize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductSize $productSize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductSize  $productSize
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductSize $productSize)
    {
        //
    }
}
