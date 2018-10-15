<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Paginate;

class IssueController extends Controller{

    protected function path(string $suffix){
        return "modules.inventory.issue.{$suffix}";
    }

    public function index(){

        $working_unit=\Auth::user()->working_unit();
        $inventory_issues=\App\InventoryIssue::where('requested_working_unit_id', $working_unit->id);
        
        $data=[
            'paginate'=>new Paginate($inventory_issues, ['id'=>'ID']),
            'carbon'=>new \Carbon\Carbon
        ];

        return view($this->path('index'), $data);

    }


    public function create(){

         //dd($issue);

        $requested_depot=\Auth::user()->working_unit();

        $forward_units=[''=>'--select Working Unit--'];

        if($requested_depot->type->name=='Central Depot'){
            $forward_units=\App\WorkingUnit::where('id', '<>', $requested_depot->id)
            ->pluck('name', 'id')
            ->prepend('--select Working Unit--', '');
        }

        $data=[
            'issue'=>new \App\InventoryIssue,
            'inventory_requisition_types'=>\App\InventoryRequisitionType::pluck('name', 'id'),
            'working_units'=>\App\WorkingUnit::pluck('name', 'id'),
            'forward_units'=>$forward_units,
            'product_statuses'=>\App\ProductStatus::pluck('name', 'id'),
            'product_types'=>\App\ProductType::pluck('name', 'id'),
            'carbon'=>new \Carbon\Carbon,
            'requested_depot'=>$requested_depot
        ];

        /*

        if(!\Session::has('vue_products')){

            $products=[];

            foreach($issue->items as $row){

                array_push($products, [
                    'id'=>$row->product_id,
                    'quantity'=>$row->issued_quantity,
                    'batch_no'=>$row->batch_no,
                    'expiration_date'=>$row->expiration_date,
                    'forward'=>$row->forward
                ]);

            }

            //dd($requisition->requested_items);

            \Session::put('vue_products', $products);
            */

        return view($this->path('create'), $data);
        
    }


    public function store(Request $request){

        //dd($request->all());
        return back()->withInput();
        
    }


    public function show(\App\InventoryIssue $issue){

        $data=[
            'issue'=>$issue,
            'carbon'=>new \carbon\Carbon
        ];

        return view($this->path('show'), $data);
        
    }


    public function edit(\App\InventoryIssue $issue){

        //dd($issue);

        $requested_depot=$issue->requested_to;

        $forward_units=[''=>'--select Working Unit--'];

        if($requested_depot->type->name=='Central Depot'){
            $forward_units=\App\WorkingUnit::where('id', '<>', $requested_depot->id)
            ->pluck('name', 'id')
            ->prepend('--select Working Unit--', '');
        }

        $data=[
            'issue'=>$issue,
            'inventory_requisition_types'=>\App\InventoryRequisitionType::pluck('name', 'id'),
            'working_units'=>\App\WorkingUnit::pluck('name', 'id'),
            'forward_units'=>$forward_units,
            'product_statuses'=>\App\ProductStatus::pluck('name', 'id'),
            'product_types'=>\App\ProductType::pluck('name', 'id'),
            'carbon'=>new \Carbon\Carbon
        ];

        if(!\Session::has('vue_products')){

            $products=[];

            foreach($issue->items as $row){

                array_push($products, [
                    'id'=>$row->product_id,
                    'quantity'=>$row->issued_quantity,
                    'batch_no'=>$row->batch_no,
                    'expiration_date'=>$row->expiration_date,
                    'forward'=>$row->forward
                ]);

            }

            //dd($requisition->requested_items);

            \Session::put('vue_products', $products);
            
        }

        return view($this->path('create'), $data);
        
    }


    public function update(Request $request, \App\InventoryIssue $issue){

        \Session::put('vue_products', $request->get('products'));


        $request->validate([
            'products'=>'required|array'
        ]);

        $products=$request->get('products');

        foreach($products as $row){
            
            $product=\App\Product::find($row['id']);

            //check once if any forwarded product exist or not
            if(isset($row['forward']) && $row['forward']=='on' && empty($forward_product_exists)){
                $forward_product_exists=TRUE;
            }

            if(empty($row['batch_no'])){

                $balance=stock_balance($issue->requisition->requested_to, $product, [
                    'product_status_id'=>$issue->requisition->product_status_id,
                    'product_type_id'=>$issue->requisition->product_type_id
                ]);

            }else{

                $balance=stock_balance($issue->requisition->requested_to, $product, [
                    'product_status_id'=>$issue->requisition->product_status_id,
                    'product_type_id'=>$issue->requisition->product_type_id,
                    'batch_no'=>$row['batch_no']
                ]);

            }

            if(empty($row['forward'])){

                if($row['quantity'] < 1){

                    return back()
                    ->with('failed', 'Sorry!, product quantity can\'t zero.')
                    ->withInput();

                }elseif($row['quantity'] > $balance){

                    return back()
                    ->with('failed', 'Sorry!, your issue product quantity exceeds stock quantity.')
                    ->withInput();

                }

            }

        }

        $approval=$request->get('approval');

        //$approval='initial';

        if($approval=='initial' && \Auth::user()->can('approve_initial_issue')){

            $issue->initial_approver()->associate(\Auth::user());

        }elseif($approval=='final' && \Auth::user()->can('approve_final_issue')){

            if($request->get('forward_working_unit_id') && empty($forward_product_exists)){

                return back()->with('failed', 'Please! select a product to forward.');

            }elseif(!$request->get('forward_working_unit_id') && isset($forward_product_exists)){

                return back()->with('failed', 'Please! select a working unit to forward product.');

            }

            $issue->final_approver()->associate(\Auth::user());

        }else{

            return back()->withInput()->with('failed', 'Sorry!, you can\'t perform this action.');

        }

        $issue->items()->delete();
        $issue->forward_working_unit_id=$request->get('forward_working_unit_id');
        $issue->save();

        foreach($products as $row){
            
            $product=\App\Product::find($row['id']);

            $expiration_date=empty($row['expiration_date'])?NULL:\Carbon\Carbon::parse($row['expiration_date']);

            $forward=isset($row['forward']) && $row['forward']=='on'?TRUE:FALSE;

            \App\InventoryIssueItem::create([
                'inventory_issue_id'=>$issue->id,
                'product_id'=>$product->id,
                'issued_quantity'=>$row['quantity'],
                'product_status_id'=>$issue->requisition->product_status_id,
                'product_type_id'=>$issue->requisition->product_type_id,
                'batch_no'=>$row['batch_no'],
                'expiration_date'=>$expiration_date,
                'forward'=>$forward
            ]);

            if($approval=='final' && empty($row['forward'])){

                \App\Stock::create([
                    'working_unit_id'=>$issue->requisition->requested_working_unit_id,
                    'inventory_issue_id'=>$issue->id,
                    'product_id'=>$product->id,
                    'issue_quantity'=>$row['quantity'],
                    'product_status_id'=>$issue->requisition->product_status_id,
                    'product_type_id'=>$issue->requisition->product_type_id,
                    'batch_no'=>$row['batch_no'],
                    'expiration_date'=>$expiration_date,
                    //'forward'=>$forward //inventory stock does not required forward flag
                ]);

            }

        }

        if($issue->forward_working_unit()->exists() && $issue->final_approver()->exists() && isset($forward_product_exists)){

            $forwarded_issue=\App\InventoryIssue::create([
                'inventory_issue_no'=>uCode('inventory_issues.inventory_issue_no', 'IIS00')
            ]);

            $requisition=$issue->requisition;
            $forwarded_issue->requisition()->associate($requisition);
            $forwarded_issue->requisition_sender()->associate($issue->requisition_sender);
            $forwarded_issue->requested_to()->associate($issue->forward_working_unit);
            $forwarded_issue->items()->createMany(
                $issue->items()->where('forward', 1)->select(
                    'product_id',
                    'product_status_id',
                    'product_type_id',
                    'issued_quantity',
                    'batch_no',
                    'expiration_date'
                )->get()->toArray()
            );
            $forwarded_issue->save();
            $issue->items()->where('forward', 1)->delete();

            if(!$issue->items()->exists()) $issue->delete();

            /*
            $issue->requisition->requested_working_unit_id=$request->get('forward_working_unit_id');
            $issue->requisition->save();
            $issue->initial_approver_id=null;
            $issue->final_approver_id=null;
            $issue->save();
            return redirect()->route('issue.index')->with('success', 'Requisition forwarded successfully!.');
            */

        }

        \Session::forget('vue_products');
        return redirect()->route('issue.index')->with('success', 'Form submitted successfully!.');

    }


    public function destroy(Issue $issue){
        
    }

    public function fetch_requisition(Request $request, \App\WorkingUnit $requested_working_unit, String $slug){

        $issue_request=\App\InventoryIssueRequest::where('requested_working_unit_id', $requested_working_unit->id)->first();

        $products=[];

        foreach($issue_request->items as $row){

            $issue_exists=\App\InventoryIssue::where('requested_working_unit_id', $requested_working_unit->id)->first();
            $requested_quantity=$row->quantity;

            if($issue_exists){
                $issued_quantity=$issue_exists->items()->where('product_id', $row->product_id)->sum('issued_quantity');
                $requested_quantity=$row->quantity-$issue_quantity;
            }            

            $temp=[
                'id'=>$row->product->id,
                'hs_code'=>$row->product->hs_code,
                'name'=>$row->product->name,
                'requested_quantity'=>$requested_quantity,
                'quantity'=>0,
                'forward'=>0,
                'batch_no'=>'',
                'expiration_date'=>''

            ];

            $temp['stock']=stock_balance($requested_working_unit, $row->product, [
                'product_status_id'=>$row->product_status_id,
                'product_type_id'=>$row->product_type_id
            ]);
            
            array_push($products, $temp);

        }

        return response()->json([
            'requisition'=>\App\InventoryRequisition::with([
                'item_type',
                'item_status',
                'type',
                'sender'
            ])
            ->where('inventory_requisition_no', $slug)
            ->whereHas('issue_requests', function($query)use($issue_request){

                $query->where('requested_working_unit_id', $issue_request->requested_working_unit_id);

            })->first(),
            'products'=>$products
            
        ]);

    }

}
