<?php
namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SafetyStock;
use Carbon\Carbon;

class SafetyStockController extends Controller{

    protected function path(string $suffix){
        return "modules.inventory.safety_stock.{$suffix}";
    }    

    public function index(){

        $data=[
            'paginate'=>SafetyStock::all(),
            'carbon'=>new Carbon
        ];

        return view($this->path('index'), $data);
        
    }


    public function create(){

        $data=[
            'safety_stock'=>new \App\SafetyStock,
            'working_units'=>\App\WorkingUnit::pluck('name', 'id')->prepend('--All Working Unit--', 0),
            'products'=>\App\Product::pluck('name', 'id')
        ];
        
        return view($this->path('create'), $data);
    }


    public function store(Request $request){

        $request->validate([
            'working_unit_id'=>'required|integer',
            'product_id'=>'required|integer',
            'safety_quantity'=>'required|integer'
        ]);

        $product=\App\Product::find($request->product_id);

        $product_status=\App\ProductStatus::where('name', 'Active')->first();
        $product_type=\App\ProductType::where('name', 'Finished')->first();

        if($request->working_unit_id > 0){

            $safety_stock=\App\SafetyStock::where(['product_id'=>$product->id, 'working_unit_id'=>$request->working_unit_id])->first();

            if(empty($safety_stock)){

                $safety_stock=new \App\SafetyStock;
                $safety_stock->creator()->associate(\Auth::user());

            }else $safety_stock->editor()->associate(\Auth::user());

            $safety_stock->fill($request->all());
            $safety_stock->product_status()->associate($product_status);
            $safety_stock->product_type()->associate($product_type);
            $safety_stock->save();

        }else{

            $safety_stock=\App\SafetyStock::where('product_id', $product->id)->whereNull('working_unit_id')->first();

            if(empty($safety_stock)){

                $safety_stock=new \App\SafetyStock;
                $safety_stock->creator()->associate(\Auth::user());

            }else $safety_stock->editor()->associate(\Auth::user());

            $safety_stock->fill($request->except('safety_quantity', 'working_unit_id'));
            $safety_stock->total_safety_quantity=$request->safety_quantity;
            $safety_stock->product_status()->associate($product_status);
            $safety_stock->product_type()->associate($product_type);
            $safety_stock->save();

        }

        return redirect()->route('safety-stock.index')->with('success', 'Safety stock added successfully!.');
        
    }


    public function show(SafetyStock $safety_stock){
        
    }


    public function edit(SafetyStock $safety_stock){

        $data=[
            'safety_stock'=>$safety_stock,
            'working_units'=>\App\WorkingUnit::pluck('name', 'id')->prepend('--All Working Unit--', 0),
            'products'=>\App\Product::pluck('name', 'id')
        ];
        
        return view($this->path('create'), $data);
        
    }


    public function update(Request $request, SafetyStock $safety_stock){
        
        return $this->store($request);

    }


    public function destroy(SafetyStock $safety_stock){
        
    }

    public function fetch_safety_stock($working_unit, \App\Product $product){

        if($working_unit > 0){

            return \App\SafetyStock::where([
                'working_unit_id'=>$working_unit,
                'product_id'=>$product->id
            ])->sum('safety_quantity');

        }else{

            return \App\SafetyStock::where(
                'product_id',
                $product->id
            )->sum('total_safety_quantity');

        }

    }

    public function check_safety_stock(){

        $safety_stocks=\App\SafetyStock::all();

        foreach($safety_stocks as $row){

            if($row->working_unit()->exists()){

                $row->last_checked_stock=stock_balance($row->working_unit, $row->product, [
                    'product_status_id'=>$row->product_status_id,
                    'product_type_id'=>$row->product_type_id
                ]);

                $row->save();

            }else{

                $row->last_checked_stock=total_stock_balance($row->product, [
                    'product_status_id'=>$row->product_status_id,
                    'product_type_id'=>$row->product_type_id
                ]);

                $row->save();

            }
            
        }

    }

}
