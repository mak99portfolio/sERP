<?php
namespace App\Http\Controllers\Core;
use App\Http\Controllers\Controller;
use App\ProductSize;
use Illuminate\Http\Request;
use Session;
use Auth;
class ProductSizeController extends Controller
{
   
    private $view_root = 'modules/core/product_size/';
    public function index()
    {
        $view = view($this->view_root.'index');
        $view->with('product_size_list', ProductSize::all());
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
            'name' => 'required|unique:product_sizes',
            'short_name' => 'required|unique:product_sizes'
        ]);
        $product_size = new ProductSize;
        $product_size->fill($request->input());
        $product_size->creator_user_id = Auth::id();
        $product_size->save();
        Session::put('alert-success', $product_size->name . ' created successfully');
        return redirect()->route('product-size.index');
    }

   
    public function show(ProductSize $productSize)
    {
        //
    }

   
    public function edit(ProductSize $productSize)
    {
        $view = view($this->view_root.'edit');
        $view->with('product_size',$productSize);
        return $view;
    }

   
    public function update(Request $request, ProductSize $productSize)
    {
        $request->validate([
            'name' => 'required|unique:product_sizes,name,'.$productSize->id,
            'short_name' => 'required|unique:product_sizes,short_name,'.$productSize->id,
        ]);
        $productSize->fill($request->all());
        $productSize->update();
        Session::put('alert-success',$productSize->name . ' updated successfully!');
        return redirect()->route('product-size.index');
    }

    public function destroy(ProductSize $productSize)
    {
        //
    }
}
