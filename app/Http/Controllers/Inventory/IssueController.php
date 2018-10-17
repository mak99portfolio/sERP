<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Paginate;
use App\Notifications\SimpleNotification;

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


        $requested_depot=\Auth::user()->working_unit();

        $forward_units=[''=>'--select Working Unit--'];

        if($requested_depot->type->name=='Central Depot'){
            $forward_units=\App\WorkingUnit::where('id', '<>', $requested_depot->id)
            ->pluck('name', 'id')
            ->prepend('--select Working Unit--', '');
        }

        $data=[
            'issue'=>new \App\InventoryIssue, 
            'forward_units'=>$forward_units,
            'requested_depot'=>$requested_depot
        ];

        return view($this->path('create'), $data);
        
    }


    public function store(Request $request){

        //dd(uCode('inventory_issues.challan_no', 'CLN00'));

        $request->validate([
            'inventory_requisition_no'=>'required|exists:inventory_requisitions',
            'products'=>'required|array'
        ]);

        $requested_depot=\Auth::user()->working_unit();

        $inventory_requisition=\App\InventoryRequisition::where(
            'inventory_requisition_no', $request->inventory_requisition_no
        )->first();

        $issue_request=$inventory_requisition->issue_requests()->where('requested_working_unit_id', $requested_depot->id)->first();

        if(empty($requested_depot) || empty($issue_request)){

            return back()->with('failed', 'Sorry!, logged in user does\'t not associated with any working unit');

        }elseif(!\Auth::user()->can('approve_initial_issue')){

            return back()->withInput()->with('failed', 'Sorry!, you can\'t perform this action.');

        }

        $inventory_issue=new \App\InventoryIssue;
        $inventory_issue->inventory_issue_no=uCode('inventory_issues.inventory_issue_no', 'IIS00');
        $inventory_issue->requisition()->associate($inventory_requisition);
        $status=\App\InventoryIssueStatus::where('code', 'initially_approved')->first();
        $inventory_issue->status()->associate($status);
        $inventory_issue->requisition_sender()->associate($issue_request->sender);
        $inventory_issue->requested_to()->associate($requested_depot);
        $inventory_issue->initial_approver()->associate(\Auth::user());
        $inventory_issue->forward_working_unit_id=$request->get('forward_working_unit_id');
        $inventory_issue->challan_no=uCode('inventory_issues.challan_no', 'CLN00');
        $inventory_issue->save();

        foreach($request->products as $row){
            
            $product=\App\Product::find($row['id']);

            $expiration_date=empty($row['expiration_date'])?NULL:\Carbon\Carbon::parse($row['expiration_date']);

            $forward=(bool) (isset($row['forward']) && $row['forward']);

            //if($row['quantity'] < 1) continue;

            \App\InventoryIssueItem::create([
                'inventory_issue_id'=>$inventory_issue->id,
                'product_id'=>$product->id,
                'issued_quantity'=>$row['quantity'],
                'product_status_id'=>$inventory_issue->requisition->product_status_id,
                'product_type_id'=>$inventory_issue->requisition->product_type_id,
                'batch_no'=>$row['batch_no'],
                'expiration_date'=>$expiration_date,
                'forward'=>$forward
            ]);

        }

        return redirect()->route('issue.index')->with('success', 'Issue created successfully!.');
        
    }


    public function show(\App\InventoryIssue $issue){

        $data=[
            'issue'=>$issue,
            'carbon'=>new \carbon\Carbon
        ];

        return view($this->path('show'), $data);
        
    }


    public function edit(\App\InventoryIssue $issue){

        //dd($this->populate_old_data($issue));

        $requested_depot=\Auth::user()->working_unit();

        $forward_units=[''=>'--select Working Unit--'];

        if($requested_depot->type->name=='Central Depot'){
            $forward_units=\App\WorkingUnit::where('id', '<>', $requested_depot->id)
            ->pluck('name', 'id')
            ->prepend('--select Working Unit--', '');
        }

        //dd($this->populate_old_issue($issue));

        $data=[
            'issue'=>$issue,
            'forward_units'=>$forward_units,
            'requested_depot'=>$requested_depot,
            'edit'=>$this->populate_old_issue($issue)
        ];

        //dd($data['edit']);

        return view($this->path('create'), $data);
        
    }


    public function update(Request $request, \App\InventoryIssue $issue){

        //return back()->withInput();

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

        if(\Auth::user()->can('approve_final_issue')){

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

            if($issue->final_approver()->exists() && empty($row['forward'])){

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

            $related_issue_request=$issue->requisition->issue_requests()->where('requested_working_unit_id', $issue->requested_to->id)->first();

            $forward_issue_request=new \App\InventoryIssueRequest;
            $forward_issue_request->requisition()->associate($issue->requisition);
            $forward_issue_request->sender()->associate($issue->requisition_sender);
            $forward_issue_request->requested_to()->associate($issue->forward_working_unit);
            $forward_issue_request->save();

            foreach($issue->items()->where('forward', 1)->get() as $row){

                $requested_quantity=$related_issue_request->items()->where('product_id', $row->product_id)->first();

                $forward_issue_request->items()->create([
                    'product_id'=>$row->product_id,
                    'product_status_id'=>$row->product_status_id,
                    'product_type_id'=>$row->product_type_id,
                    'quantity'=>$requested_quantity->quantity
                ]);
                
            }

            $related_issue_request->items()->whereIn('product_id', $forward_issue_request->items()->pluck('product_id'))->delete();

            $forward_issue_request->save();

            $issue->items()->where('forward', 1)->delete();
            if(!$issue->items()->exists()) $issue->delete();

            foreach($forward_issue_request->requested_to->employees as $row){

                if(!empty($row->employee_profile->user)){

                    $row->employee_profile->user->notify(
                        new SimpleNotification([
                            'subject'=>'Inventory Requisition',
                            'sender_id'=>$forward_issue_request->requisition->final_approver_id,
                            'url'=>route('requisition.incoming'),
                            'message'=>'An Inventory Requisition Requested To Your Working Unit'
                        ])
                    );

                }
                
            }

        }

        return redirect()->route('issue.index')->with('success', 'Form submitted successfully!.');

    }


    public function destroy(Issue $issue){
        
    }

    public function fetch_requisition(Request $request, \App\WorkingUnit $requested_working_unit, String $slug){

        $issue_request=\App\InventoryIssueRequest::where('requested_working_unit_id', $requested_working_unit->id)
        ->whereHas('requisition', function($query)use($slug){
            $query->where('inventory_requisition_no', $slug);
        })->first();

        $products=[];

        foreach($issue_request->items as $row){

            $previous_issues=\App\InventoryIssue::where([
                'requested_working_unit_id'=>$requested_working_unit->id,
                'inventory_requisition_id'=>$issue_request->requisition->id
            ])->pluck('id');

            $previous_issued_quantity=\App\InventoryIssueItem::whereIn('inventory_issue_id', $previous_issues)->where('product_id', $row->product_id)->sum('issued_quantity');

            $issue_remain=$row->quantity;

            if($previous_issues) $issue_remain=$row->quantity-$previous_issued_quantity;

            if($issue_remain < 1) continue;

            $temp=[
                'id'=>$row->product->id,
                'name'=>$row->product->name,
                'requested_quantity'=>$row->quantity,
                'issue_remain'=>$issue_remain,
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

    protected function populate_old_issue(\App\InventoryIssue $inventory_issue){

        $issue_request=\App\InventoryIssueRequest::where('requested_working_unit_id', $inventory_issue->requested_to->id)
        ->whereHas('requisition', function($query)use($inventory_issue){
            $query->where('inventory_requisition_no', $inventory_issue->requisition->inventory_requisition_no);
        })->first();

        $products=[];

        foreach($inventory_issue->items as $row){

            $previous_issues=\App\InventoryIssue::where([
                'requested_working_unit_id'=>$inventory_issue->requested_to->id,
                'inventory_requisition_id'=>$inventory_issue->requisition->id
            ])->pluck('id');

            //dd($previous_issues);

            $previous_issued_quantity=\App\InventoryIssueItem::whereIn('inventory_issue_id', $previous_issues)->where('product_id', $row->product_id)->sum('issued_quantity');

            $requested_quantity=$issue_request->items()->where('product_id', $row->product_id)->sum('quantity');

            $issue_remain=$requested_quantity;

            if($previous_issues) $issue_remain=$requested_quantity-$previous_issued_quantity;

            //if($issue_remain < 1) continue;

            $temp=[
                'id'=>$row->product->id,
                'name'=>$row->product->name,
                'requested_quantity'=>$requested_quantity,
                'issue_remain'=>$issue_remain,
                'quantity'=>$row->issued_quantity,
                'forward'=>$row->forward,
                'batch_no'=>$row->batch_no,
                'expiration_date'=>$row->expiration_date?\Carbon\Carbon::parse($row->expiration_date)->format('d/m/Y'):''
            ];

            $temp['stock']=stock_balance($inventory_issue->requested_to, $row->product, [
                'product_status_id'=>$row->product_status_id,
                'product_type_id'=>$row->product_type_id
            ]);
            
            array_push($products, $temp);

        }

        return [
            'inventory_requisition_no'=>$inventory_issue->requisition->inventory_requisition_no,
            'requisition'=>$inventory_issue->requisition->with([
                'item_type',
                'item_status',
                'type',
                'sender'
            ])->first(),
            'products'=>$products
        ];

    }

    public function get_batch_stock(\App\WorkingUnit $working_unit, \App\Product $product, string $inventory_requisition_no, string $slug){

        $inventory_requisition=\App\InventoryRequisition::where('inventory_requisition_no', $inventory_requisition_no)->first();

        if($slug=='reset'){

            $stock_balance=stock_balance($working_unit, $product, [
                'product_status_id'=>$inventory_requisition->product_status_id,
                'product_type_id'=>$inventory_requisition->product_type_id
            ]);

        }else{

            $stock_balance=stock_balance($working_unit, $product, [
                'product_status_id'=>$inventory_requisition->product_status_id,
                'product_type_id'=>$inventory_requisition->product_type_id,
                'batch_no'=>$slug
            ]);

        }

        return response()->json($stock_balance);

    }

}
