<?php

use Illuminate\Database\Seeder;

class SalseOrderSeeder extends Seeder
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
                'salse_order_no' => 'SO-12-12-2018',
                'sales_date' => '2018-12-30',
                'sales_reference' => '123',
                'currency_id' => 1,
                'conversion_rate' => 90,
                'remarks' => 'Text',
                'creator_user_id' => 1
            ],
        ];

        \DB::table('sales_orders')->insert($data);
        $data = [
            [
                'salse_order_id' => 1,
                'terms_and_condition_id' => 1,
                'description' => 'description',
            ],
        ];

        \DB::table('sales_order_terms_and_conditions')->insert($data);
        $data = [
            [
                'salse_order_id' => 1,
                'product_id' => 1,
                'unit_price' => 100,
                'quantity' => 10,
                'bonus_quantity' => 2,
                'total_quantity' => 12,
                'net_price' => 120,
                'discont' => 10
            ],
        ];

        \DB::table('sales_order_items')->insert($data);
    }
}
