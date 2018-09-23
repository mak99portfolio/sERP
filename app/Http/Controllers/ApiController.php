<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ForeignRequisition;
use App\PurchaseOrder;
use App\ProformaInvoice;
use App\LetterOfCredit;
use App\CommercialInvoice;
use App\LocalRequisition;
use App\CommercialInvoiceItem;
use App\PurchaseOrderItem;
use App\Stock;

class ApiController extends Controller
{
    public function searchProduct(Request $request) {
        $products = Product::where('name', 'LIKE', '%' . $request->term . '%')
                    ->take(10)
                    ->get();

        $results = array();
        foreach ($products as $product) {
            $results[] = [
                'id' => $product->id, 
                'value' => $product->name,
            ];
        }
        return response()->json($results);
    }
    public function getLcByLcId($id) {
        $lc = LetterOfCredit::find($id);
        $lc_items = $lc->items;
        foreach ($lc_items as $lc_item) {
            $items[] = [
                'product_id' => $lc_item->product_id,
                'quantity' => $lc_item->quantity,
                'name' => $lc_item->product->name,
                'unit_price' => $lc_item->unit_price,
            ];
        }
        $data['items']=$items;
        $data['letter_of_credit_date'] = $lc->letter_of_credit_date;
        $data['beneficiary_ac_no'] = $lc->beneficiary_ac_no;
        $data['beneficiary_ac_name'] = $lc->beneficiary_ac_name;
        $data['beneficiary_bank_name'] = $lc->beneficiary_bank_name;
        $data['beneficiary_branch_name'] = $lc->beneficiary_branch_name;
        
        $data['letter_of_credit_value'] = $lc->letter_of_credit_value;
        $data['issue_ac_no'] = $lc->issue_ac_no;
        $data['issue_ac_name'] = $lc->issue_ac_name;
        $data['issue_branch_name'] = $lc->issue_branch_name;
        $data['issue_bank_name'] = $lc->issue_bank_name;
        
        
        return response()->json($data);
    }
    public function getProductByProductId($id){
        $product = Product::find($id);
        $physical_stock = Stock::where('product_id', $id)->sum('receive_quantity');
        $goods_in_transit = CommercialInvoiceItem::where('product_id', $id)->sum('quantity');
        $pending = PurchaseOrderItem::where('product_id', $id)->sum('quantity');;
        $data = [
            'id' => $product->id,
            'name' => $product->name,
            'hs_code' => $product->hs_code,
            'uom' => $product->unit_of_measurement->name,
            'physical_stock' => $physical_stock,
            'goods_in_transit' => $goods_in_transit,
            'pending' => $pending,
            'total_quantity' => $physical_stock+$goods_in_transit+$pending,
        ];
        return response()->json($data);
    }
    public function getPiByPiItem($id){
        $pi = ProformaInvoice::find($id);
        $data = [];
        $items = $pi->items;
        foreach($items as $item){
            $data[] = [
                'product_id' => $item->product->id,
                'name' => $item->product->name,
                'hs_code' => $item->product->hs_code,
                'uom' => $item->product->unit_of_measurement->name,
                'quantity' => $item->quantity,
                'unit_price' => $item->unit_price,
            ];
        }
        return response()->json($data);
    }
    public function getPOByPOIds($ids){
        $data = [];
        foreach(explode(',', $ids) as $id){
            $po = PurchaseOrder::find($id);
            $items = $po->items;
            foreach($items as $item){
                $item_exist = false;
                foreach ($data as $key => $value) {
                    if($value['product_id'] == $item->product->id){
                        $data[$key]['quantity'] += $item->quantity;
                        $item_exist = true;
                        break;
                    }
                }
                if(!$item_exist){
                    $data[] = [
                        'product_id' => $item->product->id,
                        'name' => $item->product->name,
                        'hs_code' => $item->product->hs_code,
                        'uom' => $item->product->unit_of_measurement->name,
                        'quantity' => $item->quantity,
                        'unit_price' => $item->unit_price,
                    ];
                }
            }
        }
        return response()->json($data);
    }
    public function getForeignRequisitionByRequisitionIds($ids){
        $data = [];
        foreach(explode(',', $ids) as $id){
            $req = ForeignRequisition::find($id);
            $items = $req->items;
            foreach($items as $item){
                $item_exist = false;
                foreach ($data as $key => $value) {
                    if($value['product_id'] == $item->product->id){
                        $data[$key]['quantity'] += $item->quantity;
                        $item_exist = true;
                        break;
                    }
                }
                if(!$item_exist){
                    $data[] = [
                        'product_id' => $item->product->id,
                        'name' => $item->product->name,
                        'hs_code' => $item->product->hs_code,
                        'uom' => $item->product->unit_of_measurement->name,
                        'quantity' => $item->quantity,
                    ];
                }
            }
        }
        return response()->json($data);
    }
    public function getLocalRequisitionByRequisitionId($id){
        $req = LocalRequisition::find($id);
        $items = $req->items;
        foreach($items as $item){
            $data[] = [
                'product_id' => $item->product->id,
                'name' => $item->product->name,
                'hs_code' => $item->product->hs_code,
                'uom' => $item->product->unit_of_measurement->name,
                'quantity' => $item->quantity,
            ];
        }
        return response()->json($data);
    }
    public function getAllProduct(){
        return response()->json(Product::all());
    }
    public function getCiByCiId($id){
        $lc = CommercialInvoice::find($id);
        $lc_items = $lc->items;
        foreach ($lc_items as $lc_item) {
            $items[] = [
                'product_id' => $lc_item->product_id,
                'quantity' => $lc_item->quantity,
                'name' => $lc_item->product->name,
                'unit_price' => $lc_item->unit_price,
            ];
        }
        $data['items']=$items;
        $data['letter_of_credit_date'] = $lc->letter_of_credit_date;
        $data['beneficiary_ac_no'] = $lc->beneficiary_ac_no;
        $data['beneficiary_ac_name'] = $lc->beneficiary_ac_name;
        $data['beneficiary_bank_name'] = $lc->beneficiary_bank_name;
        $data['beneficiary_branch_name'] = $lc->beneficiary_branch_name;
        
        $data['letter_of_credit_value'] = $lc->letter_of_credit_value;
        $data['issue_ac_no'] = $lc->issue_ac_no;
        $data['issue_ac_name'] = $lc->issue_ac_name;
        $data['issue_branch_name'] = $lc->issue_branch_name;
        $data['issue_bank_name'] = $lc->issue_bank_name;
        
        
        return response()->json($data);
    }
}
