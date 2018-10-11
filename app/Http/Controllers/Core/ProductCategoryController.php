<?php

namespace App\Http\Controllers\Core;

use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class ProductCategoryController extends Controller
{
    
    private $view_root = 'modules/core/product_category/';
    public function index()
    {
        $view = view($this->view_root.'index');
        $view->with('product_category', ProductCategory::all());
        $view->with('product_category_tree', ProductCategory::whereNull('parent_product_category_id')->get());
        return $view;
    }

    
    public function create()
    {
        $view = view($this->view_root.'create');
        $view->with('product_category_tree', ProductCategory::whereNull('parent_product_category_id')->get());
        return $view;
    }


    public function store(Request $request)
    {
        $request->validate([
            // 'parent_product_category_id' => 'required',
            'name' => 'required|unique:product_categories',
            'short_name' => 'required|unique:product_categories',
        ]);
        $pc = new ProductCategory;
        $pc->fill($request->input());
        $pc->creator_user_id = Auth::id();
        $pc->save();
        Session::put('alert-success', $pc->name . ' created successfully');
        return redirect()->route('product-category.index');
    }

  
    public function show(ProductCategory $productCategory)
    {
        //
    }

    
    public function edit(ProductCategory $productCategory)
    {
        $view = view($this->view_root.'edit');
        $view->with('product_category_tree', ProductCategory::whereNull('parent_product_category_id')->get());
        $view->with('productCategory', $productCategory);
        return $view;
    }

   
    public function update(Request $request, ProductCategory $productCategory)
    {
        $request->validate([
            // 'parent_product_category_id' => 'required',
            'name' => 'required|unique:product_categories,name,'.$productCategory->id,
            'short_name' => 'required|unique:product_categories,short_name,'.$productCategory->id,
        ]);
        $productCategory->fill($request->all());
        $productCategory->update();
        Session::put('alert-success',$productCategory->name . ' updated successfully!');
        return redirect()->route('product-category.index');
    }


    public function destroy(ProductCategory $productCategory)
    {
        //
    }
}
