<?php

namespace App\Http\Controllers\Procurement;

use App\LocalRequisition;
use App\LocalPurchaseOrder;
use App\Vendor;
use App\LocalPurchaseOrderVendor;
use App\LocalPurchaseOrderPaymentTerm;
use Illuminate\Http\Request;
use App\Helpers\Paginate;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class LocalPurchaseOrderController extends Controller
{
    private $view_root = 'modules/procurement/local/purchase_order/';
    public function search_msg(Request $request){
       $purchase_requisition_no = $request->purchase_requisition_no;
      // dd($purchase_requisition_no);
       $data['purchase_requisition_no']=$purchase_requisition_no;
       return response()->json($data);
   }

   public function index()
   {
       $view = view($this->view_root . 'index');
       $view->with('local_purchase_order_list', LocalPurchaseOrder::all());
       $view->with('carbon', new \Carbon\Carbon);
       return $view;
   }

   public function create()
    {
        $view = view($this->view_root . 'create');
        $view->with('requisition_list', LocalRequisition::availableRequisitions());
        $view->with('vendor_list', Vendor::pluck('name','id')->prepend('-- Select Vendor --', ''));
        return $view;
    }


    public function store(Request $request){
        // dd($request->all());
        $request->validate([
           // 'requisition_no'=>'required',

        ]);

        $local_purchase_order = new LocalPurchaseOrder;
        $local_purchase_order->fill($request->input());
        $local_purchase_order->creator_user_id = Auth::id();
        $local_purchase_order->generate_purchase_order_number();
        $local_purchase_order->purchase_order_date = \Carbon\Carbon::parse($request->purchase_order_date)->format('Y-m-d');
        $local_purchase_order->save();
        $local_purchase_order->order_vendor()->save(new LocalPurchaseOrderVendor($request->vendor));
        $local_purchase_order->requisitions()->sync($request->get('foreign_requisition_ids'));
        $local_purchase_order->items()->createMany($request->get('items'));
        foreach($request->payment_terms as $item){
            $payment_term = new LocalPurchaseOrderPaymentTerm;
            $payment_term->fill($item);
            $payment_term->payment_date = \Carbon\Carbon::parse($item['payment_date'])->format('Y-m-d');
            $payment_terms[] = $payment_term;
        }
        $local_purchase_order->payment_terms()->saveMany($payment_terms);
        $local_purchase_order->terms_conditions()->createMany($request->get('terms_conditions'));
        $local_purchase_order->save();
        Session::put('alert-success', 'Local Purchase order created successfully');
        return redirect()->route('local-purchase-order.index');
    }


    public function show(LocalPurchaseOrder $localPurchaseOrder)
    {
        $view = view($this->view_root . 'show');
        $view->with('localPurchaseOrder', $localPurchaseOrder);
        return $view;
    }


    public function edit(LocalPurchaseOrder $localPurchaseOrder)
    {
        //
    }


    public function update(Request $request, LocalPurchaseOrder $localPurchaseOrder)
    {
        //
    }


    public function destroy(LocalPurchaseOrder $localPurchaseOrder)
    {
        //
    }
}
