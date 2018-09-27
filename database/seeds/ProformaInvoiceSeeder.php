<?php

use Illuminate\Database\Seeder;

class ProformaInvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'proforma_invoice_no'=>14752410,
                'purchase_order_date'=>'09/27/2018',
                'proforma_invoice_date'=>'09/27/2018',
                'proforma_invoice_receive_date'=>'09/27/2018',
                'vendor_id'=>1,
                'port_of_loading_port_id'=>1,
                'port_of_discharge_port_id'=>1,
                'final_destination_country_id'=>1,
                'final_destination_city_id'=>1,
                'origin_of_goods_country_id'=>1,
                'shipment_allow'=>'Multi shipment' ,
                'payment_type'=> 'Cash',
                'pre_carriage_by'=> 'Ship',
                'customer_code'=> 'fdfdgh',
                'consignee'=>'consignee' ,
                'beneficiary_bank_info'=>'beneficiary bank info',
                'notes'=>'note'
            ],
        ];

        \DB::table('proforma_invoices')->insert($data);
        $items = [
            [
                'quantity'=>20,
                'unit_price'=>27,
                'proforma_invoice_id'=>1,
                'product_id'=>1
            ],
            [
                'quantity'=>21,
                'unit_price'=>147,
                'proforma_invoice_id'=>1,
                'product_id'=>2
            ],
            [
                'quantity'=>25,
                'unit_price'=>1257,
                'proforma_invoice_id'=>1,
                'product_id'=>3
            ],
            [
                'quantity'=>42,
                'unit_price'=>1207,
                'proforma_invoice_id'=>1,
                'product_id'=>4
            ],
        ];

        \DB::table('proforma_invoice_items')->insert($items);
        $items = [
            [
                'proforma_invoice_id'=>1,
                'purchase_order_id'=>1
            ]
        ];

        \DB::table('proforma_invoice_purchase_order')->insert($items);
    }
}
