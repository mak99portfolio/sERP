<?php

use Illuminate\Database\Seeder;

class ForeignPurchaseOrderTableSeeder extends Seeder
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
                'vendor_id'=>1,
                'purchase_order_no'=>110010,
                'requisition_date'=>'09/27/2018',
                'purchase_order_date'=>'09/27/2018',
                'port_of_loading_port_id'=>1,
                'port_of_discharge_port_id'=>1,
                'final_destination_country_id'=>1,
                'final_destination_city_id'=>1,
                'origin_of_goods_country_id'=>1,
                'payment_type'=> 'Cash',
                'pre_carriage_by'=> 'pre carriage by',
                'subject'=>'subject',
                'letter_header'=>'letter header',
                'letter_footer'=>'letter footer',
                'notes'=>'note'
            ],
        ];

        \DB::table('purchase_orders')->insert($data);
        $items = [
            [
                'quantity'=>20,
                'unit_price'=>127,
                'purchase_order_id'=>1,
                'product_id'=>1
            ],
            [
                'quantity'=>20,
                'unit_price'=>121,
                'purchase_order_id'=>1,
                'product_id'=>2
            ],
            [
                'quantity'=>20,
                'unit_price'=>120,
                'purchase_order_id'=>1,
                'product_id'=>3
            ],
        ];

        \DB::table('purchase_order_items')->insert($items);
        $items = [
            [
                'purchase_order_id'=>1,
                'foreign_requisition_id'=>1
            ]
        ];

        \DB::table('foreign_requisition_purchase_order')->insert($items);
    }
}
