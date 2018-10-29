<?php

namespace App\Http\Controllers;

use App\BillOfLading;
use App\CommercialInvoice;
use App\CommercialInvoiceItem;
use App\CompanyBank;
use App\EmployeeProfile;
use App\ForeignPayment;
use App\ForeignRequisition;
use App\LetterOfCredit;
use App\LocalRequisition;
use App\Product;
use App\ProductGroup;
use App\ProformaInvoice;
use App\PurchaseOrder;
use App\PurchaseOrderItem;
use App\Quotation;
use App\SalesInvoice;
use App\SalesOrder;
use App\Stock;
use App\VendorBank;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function searchProduct(Request $request)
    {
        $products = Product::where('name', 'LIKE', '%' . $request->term . '%')->orWhere('hs_code', 'LIKE', '%' . $request->term . '%')
            ->take(10)
            ->get();

        $results = array();
        foreach ($products as $product) {
            $results[] = [
                'id' => $product->id,
                'value' => $product->name . " (". $product->hs_code . ")",
            ];
        }
        return response()->json($results);
    }

    public function getLcByLcId($id)
    {
        $lc = LetterOfCredit::find($id);

        //dd($lc);

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

            $numbers['pi_list'][] = [
                'proforma_invoice_date' => $pi_number->proforma_invoice_date,
                'proforma_invoice_no' => $pi_number->proforma_invoice_no,
                'customer_code' => $pi_number->customer_code,
            ];

            $numbers['pi_terms'] = [
                'port_of_loading_port_id' => $pi_number->port_of_loading_port_id,
                'port_of_discharge_port_id' => $pi_number->port_of_discharge_port_id,
                'final_destination_country_id' => $pi_number->final_destination_country_id,
                'final_destination_city_id' => $pi_number->final_destination_city_id,
                'origin_of_goods_country_id' => $pi_number->origin_of_goods_country_id,
            ];
        }

        $data['items'] = $items;
        $data['pi'] = $numbers;
        //dd($data);
        $data['vendor_name'] = $lc->vendor->name;

        $data['letter_of_credit_date'] = $lc->letter_of_credit_date;
        $data['beneficiary_ac_no'] = $lc->beneficiary_vendor_bank->ac_no;
        $data['beneficiary_ac_name'] = $lc->beneficiary_vendor_bank->ac_name;
        $data['beneficiary_bank_name'] = $lc->beneficiary_vendor_bank->bank_name;
        $data['beneficiary_branch_name'] = $lc->beneficiary_vendor_bank->branch_name;

        $data['letter_of_credit_value'] = $lc->letter_of_credit_value;
        $data['issue_ac_no'] = $lc->issue_bank->account_no;
        $data['issue_ac_name'] = $lc->issue_bank->account_name;
        $data['issue_branch_name'] = $lc->issue_bank->branch_name;
        $data['issue_bank_name'] = $lc->issue_bank->bank->name;

        return response()->json($data);

    }

    public function getProductByProductId($id)
    {
        $product = Product::find($id);
        $physical_stock = Stock::where('product_id', $id)->sum('receive_quantity') - Stock::where('product_id', $id)->sum('issue_quantity');
        $goods_in_transit = CommercialInvoiceItem::where('product_id', $id)->sum('quantity');
        $pending = PurchaseOrderItem::where('product_id', $id)->sum('quantity');
        $total_quantity = $physical_stock + $goods_in_transit + $pending;
        $total_local_quantity = $physical_stock + $pending;
        $data = [
            'id' => $product->id,
            'name' => $product->name,
            'hs_code' => $product->hs_code,
            'unit_price' => $product->mrp_rate,
            'uom' => $product->unit_of_measurement->name,
            'physical_stock' => $physical_stock,
            'goods_in_transit' => $goods_in_transit,
            'pending' => $pending,
            'total_quantity' => $total_quantity,
            'total_local_quantity' => $total_local_quantity,
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
        $items = [];
        foreach (explode(',', $ids) as $id) {
            $po = PurchaseOrder::find($id);
            foreach ($po->items as $item) {
                $item_exist = false;
                foreach ($items as $key => $value) {
                    if ($value['product_id'] == $item->product->id) {
                        $items[$key]['quantity'] += $item->quantity;
                        $item_exist = true;
                        break;
                    }
                }
                if (!$item_exist) {
                    $items[] = [
                        'product_id' => $item->product->id,
                        'product_name' => $item->product->name,
                        'hs_code' => $item->product->hs_code,
                        'uom' => $item->product->unit_of_measurement->name,
                        'quantity' => $item->quantity,
                        'unit_price' => $item->unit_price,
                    ];
                }
            }
        }
        $data['items'] = $items;
        $data['last_po'] = $po;
        return response()->json($data);
        // return response()->json(PurchaseOrder::with('items')->find(explode(',', $ids)));
    }
    public function getCIByCIIds($ids)
    {
        $items = [];
        $ci_list = CommercialInvoice::find(explode(',', $ids));
        foreach ($ci_list as $ci) {
            foreach ($ci->items as $item) {
                $item_exist = false;
                foreach ($items as $key => $value) {
                    if ($value['product_id'] == $item->product->id) {
                        $items[$key]['quantity'] += $item->quantity;
                        $item_exist = true;
                        break;
                    }
                }
                if (!$item_exist) {
                    $items[] = [
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
        $data['ci_list'] = $ci_list;
        $data['items'] = $items;
        return response()->json($data);
    }

    public function getForeignRequisitionByRequisitionIds($ids)
    {
        // $data = [];
        // $previous_orders_quantity=[];

        // foreach (explode(',', $ids) as $id) {

        //     $req = ForeignRequisition::find($id);

        //     $purchase_orders=$req->purchase_orders;

        //     foreach ($req->items as $item){

        //         $previous_quantity=\App\PurchaseOrderItem::whereIn('purchase_order_id', $purchase_orders->pluck('id')->toArray())
        //         ->where('product_id', $item->product_id)
        //         ->sum('quantity');

        //         if(empty($previous_orders_quantity)){

        //             array_push($previous_orders_quantity, [
        //                 'previous_product_id'=>$item->product_id,
        //                 'previous_quantity'=>$previous_quantity
        //             ]);

        //         }else{

        //             foreach($previous_orders_quantity as $key=>$row){

        //                 if($row['previous_product_id']==$item->product_id){

        //                     $previous_orders_quantity[$key]['previous_quantity']=$row['previous_quantity']+$previous_quantity;

        //                 }else{

        //                     array_push($previous_orders_quantity, [
        //                         'previous_product_id'=>$item->product_id,
        //                         'previous_quantity'=>$previous_quantity
        //                     ]);

        //                 }

        //             }

        //         }

        //     }

        //     foreach ($req->items as $item) {
        //         $item_exist = false;
        //         foreach ($data as $key => $value) {
        //             if ($value['product_id'] == $item->product->id) {
        //                 $data[$key]['quantity'] += $item->quantity;
        //                 $item_exist = true;
        //                 break;
        //             }
        //         }
        //         if (!$item_exist) {
        //             $data[] = [
        //                 'product_id' => $item->product->id,
        //                 'name' => $item->product->name,
        //                 'hs_code' => $item->product->hs_code,
        //                 'uom' => $item->product->unit_of_measurement->name,
        //                 'quantity' => $item->quantity,
        //             ];
        //         }
        //     }

        // }

        // //dd($previous_orders_quantity);

        // foreach($data as $key=>$row){

        //     foreach($previous_orders_quantity as $inner_row){

        //         if($row['product_id']==$inner_row['previous_product_id']){
        //             $data[$key]['quantity']=$row['quantity']-$inner_row['previous_quantity'];
        //         }

        //     }

        // }

        // return response()->json($data);
        foreach (explode(',', $ids) as $key => $id) {
            $requisition = ForeignRequisition::find($id);
            foreach ($requisition->availableItems() as $item) {
                if ($item->quantity < 1) {
                    continue;
                }
                $data[$key][] = [
                    'requisition_id' => $requisition->id,
                    'requisition_no' => $requisition->requisition_no,
                    'product_id' => $item->product_id,
                    'product_name' => $item->product->name,
                    'quantity' => $item->quantity,
                    'uom' => $item->product->unit_of_measurement->name,
                ];
            }
        }
        return response()->json($data);
    }

    public function getLocalRequisitionByRequisitionIds($ids)
    {
        // $req_items = [];
        // foreach (explode(',', $ids) as $id) {
        //     $req = LocalRequisition::find($id);
        //     $data['requisitions'][] = $req;
        //     foreach ($req->availableItems() as $item) {
        //         $item_exist = false;
        //         foreach ($req_items as $key => $value) {
        //             if ($value['product_id'] == $item->product->id) {
        //                 $req_items[$key]['quantity'] += $item->quantity;
        //                 $item_exist = true;
        //                 break;
        //             }
        //         }
        //         if (!$item_exist) {
        //             $req_items[] = [
        //                 'product_id' => $item->product->id,
        //                 'name' => $item->product->name,
        //                 'hs_code' => $item->product->hs_code,
        //                 'uom' => $item->product->unit_of_measurement->name,
        //                 'quantity' => $item->quantity,
        //             ];
        //         }
        //     }
        // }
        // $data['items'] = $req_items;
        // return response()->json($data);
        foreach (explode(',', $ids) as $key => $id) {
            $requisition = LocalRequisition::find($id);
            $data['requisitions'][] = $requisition;
            foreach ($requisition->availableItems() as $item) {
                if ($item->quantity < 1) {
                    continue;
                }
                $data['items'][$key][] = [
                    'requisition_id' => $requisition->id,
                    'requisition_title' => $requisition->requisition_title,
                    'requisition_no' => $requisition->requisition_no,
                    'requisition_date' => $requisition->issued_date,
                    'product_id' => $item->product_id,
                    'product_name' => $item->product->name,
                    'hs_code' => $item->product->hs_code,
                    'quantity' => $item->quantity,
                    'uom' => $item->product->unit_of_measurement->name,
                ];
            }
        }
        return response()->json($data);
    }

    public function getLocalRequisitionByDateForQuotationCompare(Request $request)
    {
        $date_range = explode(' - ', $request->date_range);
        $start_date = Carbon::parse($date_range[0])->format('Y-m-d');
        $end_date = Carbon::parse($date_range[1])->format('Y-m-d');

        $requisitions = LocalRequisition::whereBetween('issued_date', [$start_date, $end_date])->get();
        $data['requisitions'] = $requisitions;
        return response()->json($data);
    }

    public function getLocalRequisitionItemsFromQuotationByRequisitionId($id){
        $quotations = Quotation::where("local_requisition_id", $id)->with('items')->get()->toArray();

        foreach ($quotations as $index=>$quotation){

            $total_price = 0;

            foreach ($quotation['items'] as $item){
                $total_price += $item['unit_price'];
            }

            $quotations[$index]['total_price']=$total_price;
        }

        usort($quotations, function($next, $now){
            return $now['total_price'] < $next['total_price'];
        });

        return response()->json(['quotations'=>$quotations]);
    }

    public function getRequisitionItemsForQuotationByLocalRequisitionId($id)
    {
        $req = LocalRequisition::find($id);
        $items = $req->items;
        foreach ($items as $item) {
            $req_items[] = [
                'product_id' => $item->product->id,
                'name' => $item->product->name,
                'hs_code' => $item->product->hs_code,
                'uom' => $item->product->unit_of_measurement->name,
                'quantity' => $item->quantity,
            ];
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
        if ($product_group) {
            return response()->json(Product::where('product_category_id', $product_group_id)->with('product_category')->with('product_size')->with('product_set')->with('product_type')->with('product_model')->get());
        } else {
            return response()->json(Product::with('product_category')->with('product_size')->with('product_set')->with('product_type')->with('product_model')->get());
        }
    }

    public function getInvoiceByCustomerId($id)
    {
        $invoice_lists = SalesInvoice::where('customer_id', $id)->get();
        foreach ($invoice_lists as $invoice_list) {
            $invoice[] = [
                'invoice_id' => $invoice_list->id,
                'invoice_no' => $invoice_list->sales_invoice_no,

            ];
        }
        // dd($invoice);
        $data['invoices'] = $invoice;
        $data['due'] = 10000;
        return response()->json($data);
    }
    public function getSalesOrderByCustomerId($id)
    {
        $sales_order_lists = SalesOrder::where('customer_id', $id)->get();
      //  dd($sales_order_lists);
        foreach ($sales_order_lists as $sales_order_list) {
            $sales_order[] = [
                'sales_order_id' => $sales_order_list->id,
                'sales_order_no' => $sales_order_list->sales_order_no,

            ];
        }
        // dd($sales_order);
        $data['sales_order'] = $sales_order;
        $data['due'] = 10000;
        return response()->json($data);
    }
    public function getSalesOrderBySalesOrderId($id)
    {
        $sales_order_info = SalesOrder::where('id', $id)->get();
      //dd($sales_order_info);
      
        $data['total_amount'] = 50000;
        return response()->json($data);
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
        $data['beneficiary_ac_no'] = $ci->letter_of_credit->beneficiary_vendor_bank->ac_no;
        $data['beneficiary_ac_name'] = $ci->letter_of_credit->beneficiary_vendor_bank->ac_name;
        $data['beneficiary_bank_name'] = $ci->letter_of_credit->beneficiary_vendor_bank->bank_name;
        $data['beneficiary_branch_name'] = $ci->letter_of_credit->beneficiary_vendor_bank->branch_name;

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
        $data['ci'] = CommercialInvoice::where('bill_of_lading_no', $bl_no)->get();
        // dd($data['ci']);
        $data['items'] = [];
        foreach ($data['ci'] as $ci) {
            foreach ($ci->items as $item) {
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

        $data['lc'] = LetterOfCredit::find(CommercialInvoice::where('bill_of_lading_no', $bl_no)->first()->letter_of_credit_id);

        return response()->json($data);
    }
    public function getBlByBlId($id)
    {
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
    public function getBankInfoById($id)
    {
        $data = CompanyBank::with('bank')->find($id);
        return response()->json($data);
    }
    // public function getVendorBankInfoById($id){
    //     $data = VendorBank::find($id);
    //     return response()->json($data);
    // }

    public function getVendorBankInfoById($id)
    {
        $data = VendorBank::where('vendor_id', $id)->get();
        return response()->json($data);
    }

    public function getDueAmount($id, $no)
    {
        if ($id == 1) {
            $data = PurchaseOrder::where('purchase_order_no', $no)->first()->amount()
             - ForeignPayment::where('payment_by_no', $no)
                ->get()->sum(function ($item) {
                return $item->payment_amount * (1 + $item->vat / 100) - $item->discount_amount;
            });
        }
        //    1=Purchase Order
        if ($id == 2) {
            $data = ProformaInvoice::where('proforma_invoice_no', $no)->first()->amount()
             - ForeignPayment::where('payment_by_no', $no)
                ->get()->sum(function ($item) {
                return $item->payment_amount * (1 + $item->vat / 100) - $item->discount_amount;
            });
        }
        //    2=Proforma Invoice

        return response()->json($data);
    }
    public function getLcToCiList($id)
    {
        $data['commercial_invoice_list'] = CommercialInvoice::where('letter_of_credit_id', $id)->get();
        $data['lc_no'] = LetterOfCredit::with('issue_bank')->find($id);
        $data['lc_no']->issue_bank->bank;
        $data['last_pi'] = $data['lc_no']->proforma_invoices->last();
        return response()->json($data);
    }
    // public function getCiToProduct($ci_id){
    //     return response()->json($ci_id);
    // }
    public function getVendorWisePo($vendor_id)
    {
        $data = PurchaseOrder::where('vendor_id', $vendor_id)->get();
        return response()->json($data);
    }
    public function getEmployeeByDesignation($designation_id)
    {
        $data = EmployeeProfile::whereHas('organizational_information', function ($query) use ($designation_id) {
            $query->where('designation_id', $designation_id);
        })->get();
        return response()->json($data);
    }

    public function getProductForSalesOrder($product_id, $customer_id)
    {
        $physical_stock = Stock::where(['product_id'=> $product_id, 'product_status_id'=>1, 'product_type_id'=>1])->sum('receive_quantity') - Stock::where(['product_id'=> $product_id, 'product_status_id'=>1, 'product_type_id'=>1])->sum('issue_quantity');

        $discount_customer_wise = \App\DiscountCustomerWise::where('customer_id', $customer_id)->where('product_id', $product_id)->where('active', 'true')->first();
        $discount_generic = \App\DiscountGeneric::where('product_id', $product_id)->where('active', 'true')->first();

        if ($discount_customer_wise) {
            $discount_type = $discount_customer_wise->discount_type;
            $discount = $discount_customer_wise->discount_value;
        } else if ($discount_generic) {
            $discount_type = $discount_generic->discount_type;
            $discount = $discount_generic->discount_value;
        } else {
            $discount_type = null;
            $discount = 0;
        }
        $pending = \App\SalesOrderItem::where('product_id', $product_id)->sum('quantity') - \App\SalesChallanItem::where('product_id', $product_id)->sum('challan_quantity');
        $si_ids = \App\SalesInvoice::where('sales_invoice_status', 'in_transit')->pluck('id');
        $intransit = \App\SalesInvoiceItem::whereIn('sales_invoice_id', $si_ids)->where('product_id', $product_id)->sum('invoice_quantity');
        
        $product = Product::find($product_id);
        $data = [
            'id' => $product->id,
            'name' => $product->name,
            'hs_code' => $product->hs_code,
            'unit_price' => $product->mrp_rate,
            'uom' => $product->unit_of_measurement->name,
            'available' => $physical_stock,
            'intransit' => $intransit,
            'pending' => $pending,
            'discount_type' => $discount_type,
            'discount' => (int) $discount,
        ];
        $data['customer_name'] = \App\Customer::find($customer_id);
        return response()->json($data);
    }
    public function getBonusByProduct($quantity, $customer_id, $product_id)
    {

        $free_bonus_customer_wise = \App\FreeBonusCustomerWise::where('customer_id', $customer_id)->where('product_id', $product_id)->where('active', 'true')->first();
        $free_bonus_generic = \App\FreeBonusGeneric::where('product_id', $product_id)->where('active', 'true')->first();

        if ($free_bonus_customer_wise) {
            if ($free_bonus_customer_wise->bonus_type == 'fixed') {
                $bonus_quantity = $free_bonus_customer_wise->bonus_value;
            } else {
                $bonus_quantity = floor($quantity / $free_bonus_customer_wise->quantity) * $free_bonus_customer_wise->bonus_value;
            }
        } else if ($free_bonus_generic) {

            if ($free_bonus_generic->bonus_type == 'fixed') {
                $bonus_quantity = $free_bonus_generic->bonus_value;
            } else {
                $bonus_quantity = floor($quantity / $free_bonus_generic->quantity) * $free_bonus_generic->bonus_value;
            }

        } else {
            $bonus_quantity = 0;
        }

        return response()->json($bonus_quantity);

    }
    public function getWorkingUnitWiseProductAvailable($product_id){
        $units=\App\WorkingUnit::all()->toArray();
        /*
        foreach($units as $index=>$row){
            $units[$index]['items']=\App\Stock::with('product')->where(['working_unit_id', $row['id'])->selectRaw("(CAST(SUM(receive_quantity) AS FLOAT)-CAST(SUM(issue_quantity) AS FLOAT)) AS physical_quantity, product_id")->groupBy('product_id')->get()->toArray();
        }
        */

        foreach($units as $index=>$row){
            $units[$index]['physical_quantity']=\App\Stock::where([
                'working_unit_id'=>$row['id'],
                'product_id'=>$product_id,
                'product_status_id'=>1,
                'product_type_id'=>1
            ])->sum('receive_quantity')-\App\Stock::where([
                'working_unit_id'=>$row['id'],
                'product_id'=>$product_id,
                'product_status_id'=>1,
                'product_type_id'=>1
            ])->sum('issue_quantity');

            $units[$index]['product']=\App\Product::find($product_id)->toArray();
        }
        return response()->json($units);
    }
}
