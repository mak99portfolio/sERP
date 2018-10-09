<?php
namespace App\Http\Controllers\Core;
use App\Http\Controllers\Controller;
use App\ProductModel;
use Illuminate\Http\Request;
use Session;
use Auth;

class ProductModelController extends Controller
{
  
    private $view_root = 'modules/core/product_model/';
    public function index()
    {
        $view = view($this->view_root.'index');
        $view->with('product_model_list', ProductModel::all());
        return $view;
    }

   
    public function create()
    {
        $view = view($this->view_root.'create');
        return $view;
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:product_models',
            'short_name' => 'required|unique:product_models'
        ]);
        $product_model = new ProductModel;
        $product_model->fill($request->input());
        $product_model->creator_user_id = Auth::id();
        $product_model->save();
        Session::put('alert-success', $product_model->name . ' created successfully');
        return redirect()->route('product-model.index');
    }

  
    public function show(ProductModel $productModel)
    {
        //
    }

    
    public function edit(ProductModel $productModel)
    {
        $view = view($this->view_root.'edit');
        $view->with('product_model',$productModel);
        return $view;
    }

  
    public function update(Request $request, ProductModel $productModel)
    {
        $request->validate([
            'name' => 'required|unique:product_models,name,'.$productModel->id,
            'short_name' => 'required|unique:product_models,short_name,'.$productModel->id,
        ]);
        $productModel->fill($request->all());
        $productModel->update();
        Session::put('alert-success',$productModel->name . ' updated successfully!');
        return redirect()->route('product-model.index');
    }

 
    public function destroy(ProductModel $productModel)
    {
        //
    }
}
