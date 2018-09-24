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

class ApiController extends Controller {

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
        $pi_numbers = $lc->proforma_invoices;
//dd($pi_numbers);
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
            ];
        }
        $data['items'] = $items;
        //   $data['pi_info'] = $numbers;
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

    public function getProductByProductId($id) {
        $product = Product::find($id);
        $physical_stock = Stock::where('product_id', $id)->sum('receive_quantity');
        $goods_in_transit = CommercialInvoiceItem::where('product_id', $id)->sum('quantity');
        $pending = PurchaseOrderItem::where('product_id', $id)->sum('quantity');
        ;
        $data = [
            'id' => $product->id,
            'name' => $product->name,
            'hs_code' => $product->hs_code,
            'uom' => $product->unit_of_measurement->name,
            'physical_stock' => $physical_stock,
            'goods_in_transit' => $goods_in_transit,
            'pending' => $pending,
            'total_quantity' => $physical_stock + $goods_in_transit + $pending,
        ];
        return response()->json($data);
    }

    public function getPiByPiItem($id) {
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

    public function getPOByPOIds($ids) {
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

    public function getForeignRequisitionByRequisitionIds($ids) {
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

    public function getLocalRequisitionByRequisitionId($id) {
        $req = LocalRequisition::find($id);
        $items = $req->items;
        foreach ($items as $item) {
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

    public function getAllProduct() {
        return response()->json(Product::all());
    }

    public function getCiByCiId($id) {
        $ci = CommercialInvoice::find($id);
        $ci_items = $ci->items;
        foreach ($ci_items as $ci_item) {
            $items[] = [
                'product_id' => $ci_item->product_id,
                'quantity' => $ci_item->quantity,
                'name' => $ci_item->product->name,
            ];
        }

        $data['items'] = $items;
        $data['commercial_invoice_date'] = $ci->date;
        $data['letter_of_credit_no'] = $ci->LetterOfCredit->letter_of_credit_no;
        $data['letter_of_credit_date'] = $ci->LetterOfCredit->letter_of_credit_date;
        $data['beneficiary_ac_no'] = $ci->LetterOfCredit->beneficiary_ac_no;
        $data['beneficiary_ac_name'] = $ci->LetterOfCredit->beneficiary_ac_name;
        $data['beneficiary_bank_name'] = $ci->LetterOfCredit->beneficiary_bank_name;
        $data['beneficiary_branch_name'] = $ci->LetterOfCredit->beneficiary_branch_name;

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

        $data['bl_no'] = $ci->bl_no;
        $data['bl_date'] = $ci->bl_date;
        $data['vessel_no'] = $ci->vessel_no;
        $data['container_no'] = $ci->container_no;
        $data['vendor_name'] = $ci->LetterOfCredit->vendor->name;
        return response()->json($data);
    }

}
