<?php

namespace App\Http\Controllers;

use App\CommercialInvoice;
use App\CommercialInvoiceItem;
use App\ForeignRequisition;
use App\ForeignPayment;
use App\LetterOfCredit;
use App\LocalRequisition;
use App\Product;
use App\ProductGroup;
use App\ProformaInvoice;
use App\PurchaseOrder;
use App\PurchaseOrderItem;
use App\Stock;
use App\BillOfLading;
use App\CompanyBank;
use App\VendorBank;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function searchProduct(Request $request)
    {
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

    public function getLcByLcId($id)
    {
        $lc = LetterOfCredit::find($id);

        $lc_items = $lc->items;
        $pi_numbers = $lc->proforma_invoices;

        foreach ($lc_items as $lc_item) {
            $items[] = [
                'product_id' => $lc_item->product_id,
                'quantity' => $lc_item->quantity,
                'name' => $lc_item->product->name,
                'unit_price' => $lc_item->unit_price,
            ];
        }
        foreach ($pi_numbers as $pi_number) {
            $numbers[] = [
                'proforma_invoice_date' => $pi_number->proforma_invoice_date,
                'proforma_invoice_no' => $pi_number->proforma_invoice_no,
                'customer_code' => $pi_number->customer_code,
            ];
        }
        $data['items'] = $items;
        $data['pilist'] = $numbers;
       //dd($data);
        $data['vendor_name'] = $lc->vendor->name;

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

    public function getProductByProductId($id)
    {
        $product = Product::find($id);
        $physical_stock = Stock::where('product_id', $id)->sum('receive_quantity') - Stock::where('product_id', $id)->sum('issue_quantity');
        $goods_in_transit = CommercialInvoiceItem::where('product_id', $id)->sum('quantity');
        $pending = PurchaseOrderItem::where('product_id', $id)->sum('quantity');
        $total_quantity = $physical_stock + $goods_in_transit + $pending;
        $data = [
            'id' => $product->id,
            'name' => $product->name,
            'hs_code' => $product->hs_code,
            'uom' => $product->unit_of_measurement->name,
            'physical_stock' => $physical_stock,
            'goods_in_transit' => $goods_in_transit,
            'pending' => $pending,
            'total_quantity' => $total_quantity,
        ];
        return response()->json($data);
    }

    public function getPiByPiItem($id)
    {
        $pi = ProformaInvoice::find($id);
        $data = [];
        $items = $pi->items;
        foreach ($items as $item) {
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

    public function getPOByPOIds($ids)
    {
        $data = [];
        foreach (explode(',', $ids) as $id) {
            $po = PurchaseOrder::find($id);
            $items = $po->items;
            foreach ($items as $item) {
                $item_exist = false;
                foreach ($data as $key => $value) {
                    if ($value['product_id'] == $item->product->id) {
                        $data[$key]['quantity'] += $item->quantity;
                        $item_exist = true;
                        break;
                    }
                }
                if (!$item_exist) {
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

    public function getForeignRequisitionByRequisitionIds($ids)
    {
        $data = [];
        foreach (explode(',', $ids) as $id) {
            $req = ForeignRequisition::find($id);
            $items = $req->items;
            foreach ($items as $item) {
                $item_exist = false;
                foreach ($data as $key => $value) {
                    if ($value['product_id'] == $item->product->id) {
                        $data[$key]['quantity'] += $item->quantity;
                        $item_exist = true;
                        break;
                    }
                }
                if (!$item_exist) {
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

    public function getLocalRequisitionByRequisitionIds($ids)
    {
        $req_items = [];
        foreach (explode(',', $ids) as $id) {
            $req = LocalRequisition::find($id);
            $data['requisitions'][] = $req;
            $items = $req->items;
            foreach ($items as $item) {
                $item_exist = false;
                foreach ($req_items as $key => $value) {
                    if ($value['product_id'] == $item->product->id) {
                        $req_items[$key]['quantity'] += $item->quantity;
                        $item_exist = true;
                        break;
                    }
                }
                if (!$item_exist) {
                    $req_items[] = [
                        'product_id' => $item->product->id,
                        'name' => $item->product->name,
                        'hs_code' => $item->product->hs_code,
                        'uom' => $item->product->unit_of_measurement->name,
                        'quantity' => $item->quantity,
                    ];
                }
            }
        }
        $data['items'] = $req_items;
        return response()->json($data);
    }

    // public function getLocalRequisitionByRequisitionIds($id)
    // {
    //     $req = LocalRequisition::find($id);
    //     $items = $req->items;
    //     foreach ($items as $item) {
    //         $req_items[] = [
    //             'product_id' => $item->product->id,
    //             'name' => $item->product->name,
    //             'hs_code' => $item->product->hs_code,
    //             'uom' => $item->product->unit_of_measurement->name,
    //             'quantity' => $item->quantity,
    //         ];
    //     }
    //      $data['items'] = $req_items;
    //      $data['requisition'] = $req;
    //     return response()->json($data);
    // }

    public function getAllProduct($product_group_id)
    {
        $product_group = ProductGroup::find($product_group_id);
        if($product_group){
            return response()->json(Product::where('product_category_id', $product_group_id)->get());
        }else{
            return response()->json(Product::all());
        }
    }

    public function getCiByCiId($id)
    {
        $ci = CommercialInvoice::find($id);
        $ci_items = $ci->items;
        $pi_numbers = $ci->letter_of_credit->proforma_invoices;
        foreach ($ci_items as $ci_item) {
            $items[] = [
                'product_id' => $ci_item->product_id,
                'quantity' => $ci_item->quantity,
                'name' => $ci_item->product->name,
            ];
        }

        foreach ($pi_numbers as $pi_number) {
            $numbers[] = [
                'proforma_invoice_date' => $pi_number->proforma_invoice_date,
                'proforma_invoice_no' => $pi_number->proforma_invoice_no,
                'customer_code' => $pi_number->customer_code,
            ];
        }
        $data['items'] = $items;
        $data['pilist'] = $numbers;
        $data['commercial_invoice_date'] = $ci->date;
        $data['letter_of_credit_no'] = $ci->letter_of_credit->letter_of_credit_no;
        $data['letter_of_credit_date'] = $ci->letter_of_credit->letter_of_credit_date;
        $data['beneficiary_ac_no'] = $ci->letter_of_credit->beneficiary_ac_no;
        $data['beneficiary_ac_name'] = $ci->letter_of_credit->beneficiary_ac_name;
        $data['beneficiary_bank_name'] = $ci->letter_of_credit->beneficiary_bank_name;
        $data['beneficiary_branch_name'] = $ci->letter_of_credit->beneficiary_branch_name;

        $data['port_of_loading_port_id'] = $ci->port_of_loading_port_id;
        $data['port_of_loading_port_name'] = $ci->loading_port->name;
        $data['port_of_discharge_port_id'] = $ci->port_of_discharge_port_id;
        $data['port_of_discharge_port_name'] = $ci->discharge_port->name;
        $data['destination_city_name'] = $ci->city->name;
        $data['destination_city_id'] = $ci->destination_city_id;
        $data['country_goods_country_id'] = $ci->country_goods_country_id;
        $data['country_goods_country_name'] = $ci->destination_country->name;
        $data['destination_country_id'] = $ci->destination_country_id;
        $data['destination_country_name'] = $ci->country_goods->name;

        $data['bill_of_lading_no'] = $ci->bill_of_lading_no;
        $data['bill_of_lading_date'] = $ci->bill_of_lading_date;
        $data['vessel_no'] = $ci->vessel_no;
        $data['container_no'] = $ci->container_no;
        $data['vendor_name'] = $ci->letter_of_credit->vendor->name;
        return response()->json($data);
    }
    public function getAllByBlNo($bl_no)
    {
        $data['ci'] = CommercialInvoice::where('bill_of_lading_no',$bl_no)->get();
        // dd($data['ci']);
        $data['items'] = [];
        foreach($data['ci'] as $ci){
            foreach($ci->items as $item){
                $item_exist = false;
                foreach ($data['items'] as $key => $value) {
                    if ($value['product_id'] == $item->product->id) {
                        $data[$key]['quantity'] += $item->quantity;
                        $item_exist = true;
                        break;
                    }
                }
                if (!$item_exist) {
                    $data['items'][] = [
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

        $data['lc'] = LetterOfCredit::find(CommercialInvoice::where('bill_of_lading_no',$bl_no)->first()->letter_of_credit_id);

        return response()->json($data);
    }
    public function getBlByBlId($id){
        $data = [];
        $bill_of_lading = BillOfLading::find($id);
        $data['bill_of_lading'] = $bill_of_lading;
        $data['commercial_invoices'] = $bill_of_lading->commercial_invoices;
        $data['letter_of_credit'] = [
            'letter_of_credit_no' => $bill_of_lading->letter_of_credit->letter_of_credit_no,
            'letter_of_credit_date' => $bill_of_lading->letter_of_credit->letter_of_credit_date,
            'letter_of_credit_value' => $bill_of_lading->letter_of_credit->letter_of_credit_value,
            'exporter_name' => $bill_of_lading->letter_of_credit->vendor->name,
        ];

        return response()->json($data);
    }
    public function getBankInfoById($id){
        $data = CompanyBank::with('bank')->find($id);
        return response()->json($data);
    }
    public function getVendorBankInfoById($id){
        $data = VendorBank::find($id);
        return response()->json($data);
    }
    public function getDueAmount($id,$no){
       if($id==1){
       $data = PurchaseOrder::where('purchase_order_no',$no)->first()->amount() 
       - ForeignPayment::where('payment_by_no',$no)
       ->get()->sum(function($item){
            return $item->payment_amount * (1  + $item->vat/100) - $item->discount_amount;
         });
       }
    //    1=Purchase Order
       if($id==2){
       $data = ProformaInvoice::where('proforma_invoice_no',$no)->first()->amount() 
       - ForeignPayment::where('payment_by_no',$no)
       ->get()->sum(function($item){
            return $item->payment_amount * (1  + $item->vat/100) - $item->discount_amount;
         });
       }
    //    2=Proforma Invoice
       
       
       
        return response()->json($data);
    }

}
