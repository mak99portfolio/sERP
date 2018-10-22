<?php

use Illuminate\Database\Seeder;

class SalesOrderSeeder extends Seeder
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
                'sales_order_no' => 'SO-12-12-2018',
                'sales_date' => '2018-12-30',
                'customer_id' => 1,
                'sales_reference_id' => 1,
                'currency_id' => 1,
                'conversion_rate' => 90,
                'vat' => 90,
                'remarks' => 'Text',
                'creator_user_id' => 1
            ],
            [
                'sales_order_no' => 'SO-5725-4141-1441',
                'sales_date' => '2018-12-30',
                'customer_id' => 1,
                'sales_reference_id' => 1,
                'currency_id' => 1,
                'conversion_rate' => 90,
                'vat' => 60,
                'remarks' => 'Text',
                'creator_user_id' => 1
            ],
            [
                'sales_order_no' => 'SO-10-1102-10',
                'sales_date' => '2018-12-01',
                'customer_id' => 2,
                'sales_reference_id' => 1,
                'currency_id' => 1,
                'conversion_rate' => 90,
                'vat' => 70,
                'remarks' => 'Text',
                'creator_user_id' => 1
            ],
            [
                'sales_order_no' => 'SO-01-10-10',
                'sales_date' => '2018-12-01',
                'customer_id' => 2,
                'sales_reference_id' => 1,
                'currency_id' => 1,
                'conversion_rate' => 90,
                'vat' => 80,
                'remarks' => 'Text',
                'creator_user_id' => 1
            ],
        ];

        \DB::table('sales_orders')->insert($data);
        $data = [
            [
                'sales_order_id' => 1,
                'terms_and_condition_id' => 1,
                'description' => 'description',
            ],
            [
                'sales_order_id' => 2,
                'terms_and_condition_id' => 1,
                'description' => 'description',
            ],
            [
                'sales_order_id' => 3,
                'terms_and_condition_id' => 1,
                'description' => 'description',
            ],
            [
                'sales_order_id' => 4,
                'terms_and_condition_id' => 1,
                'description' => 'description',
            ],
        ];

        \DB::table('sales_order_terms_and_conditions')->insert($data);
        $data = [
            [
                'sales_order_id' => 1,
                'product_id' => 1,
                'unit_price' => 100,
                'quantity' => 10,
                'bonus_quantity' => 2,
                'total_quantity' => 12,
                'net_price' => 120,
                'discount' => 10
            ],
            [
                'sales_order_id' => 1,
                'product_id' => 2,
                'unit_price' => 100,
                'quantity' => 10,
                'bonus_quantity' => 2,
                'total_quantity' => 12,
                'net_price' => 120,
                'discount' => 10
            ],
            [
                'sales_order_id' => 2,
                'product_id' => 1,
                'unit_price' => 100,
                'quantity' => 10,
                'bonus_quantity' => 2,
                'total_quantity' => 12,
                'net_price' => 120,
                'discount' => 10
            ],
            [
                'sales_order_id' => 2,
                'product_id' => 2,
                'unit_price' => 100,
                'quantity' => 10,
                'bonus_quantity' => 2,
                'total_quantity' => 12,
                'net_price' => 120,
                'discount' => 10
            ],
            [
                'sales_order_id' => 3,
                'product_id' => 1,
                'unit_price' => 100,
                'quantity' => 20,
                'bonus_quantity' => 2,
                'total_quantity' => 12,
                'net_price' => 120,
                'discount' => 10
            ],
            [
                'sales_order_id' => 3,
                'product_id' => 2,
                'unit_price' => 100,
                'quantity' => 410,
                'bonus_quantity' => 2,
                'total_quantity' => 12,
                'net_price' => 120,
                'discount' => 10
            ],
            [
                'sales_order_id' => 4,
                'product_id' => 1,
                'unit_price' => 100,
                'quantity' => 14,
                'bonus_quantity' => 2,
                'total_quantity' => 12,
                'net_price' => 120,
                'discount' => 10
            ],
            [
                'sales_order_id' => 4,
                'product_id' => 3,
                'unit_price' => 100,
                'quantity' => 100,
                'bonus_quantity' => 2,
                'total_quantity' => 12,
                'net_price' => 120,
                'discount' => 10
            ],
        ];

        \DB::table('sales_order_items')->insert($data);
    }
}
