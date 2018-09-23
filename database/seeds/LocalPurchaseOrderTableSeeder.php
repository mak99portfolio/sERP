<?php

use Illuminate\Database\Seeder;

class LocalPurchaseOrderTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = [
            [
                'purchase_order_no' => '666',
                'inco_terms' => 'Inco Terms',
                'inco_term_info' => 'Inco Term Info',
                'procurement_type' => '1',
                'purchase_order_type' => '1',
                'purchase_order_date' => \Carbon\Carbon::now(),
                'status' => '1',
                'shipping_method' => '1',
                'payment_method' => '1',
                'remarks' => '1',
                'creator_user_id' => 1,
                'updator_user_id' => 1,
            ],
            [
                'purchase_order_no' => '444',
                'inco_terms' => '1',
                'inco_term_info' => '1',
                'procurement_type' => '1',
                'purchase_order_type' => '1',
                'purchase_order_date' => \Carbon\Carbon::now(),
                'status' => '1',
                'shipping_method' => '1',
                'payment_method' => '1',
                'remarks' => '1',
                'creator_user_id' => 1,
                'updator_user_id' => 1,
            ],
        ];
        \DB::table('local_purchase_orders')->insert($data);
        \DB::table('local_purchase_order_items')->insert([
            [
                'item_id' => 1,
                'quantity' => rand(1, 20),
                'price' => rand(100, 5000),
                'discount_rate' => rand(1, 20),
                'discount' => rand(1, 20),
                'vat_rate' => rand(1, 20),
                'total_discount' => rand(1, 20),
                'total_vat' => rand(1, 20),
                'local_purchase_order_id' => 1,
            ],
            [
                'item_id' => 2,
                'quantity' => rand(1, 20),
                'price' => rand(100, 5000),
                'discount_rate' => rand(1, 20),
                'discount' => rand(1, 20),
                'vat_rate' => rand(1, 20),
                'total_discount' => rand(1, 20),
                'total_vat' => rand(1, 20),
                'local_purchase_order_id' => 1,
            ],
            [
                'item_id' => 3,
                'quantity' => rand(1, 20),
                'price' => rand(100, 5000),
                'discount_rate' => rand(1, 20),
                'discount' => rand(1, 20),
                'vat_rate' => rand(1, 20),
                'total_discount' => rand(1, 20),
                'total_vat' => rand(1, 20),
                'local_purchase_order_id' => 1,
            ],
            [
                'item_id' => 1,
                'quantity' => rand(1, 20),
                'price' => rand(100, 5000),
                'discount_rate' => rand(1, 20),
                'discount' => rand(1, 20),
                'vat_rate' => rand(1, 20),
                'total_discount' => rand(1, 20),
                'total_vat' => rand(1, 20),
                'local_purchase_order_id' => 2,
            ],
            [
                'item_id' => 2,
                'quantity' => rand(1, 20),
                'price' => rand(100, 5000),
                'discount_rate' => rand(1, 20),
                'discount' => rand(1, 20),
                'vat_rate' => rand(1, 20),
                'total_discount' => rand(1, 20),
                'total_vat' => rand(1, 20),
                'local_purchase_order_id' => 2,
            ],
            [
                'item_id' => 3,
                'quantity' => rand(1, 20),
                'price' => rand(100, 5000),
                'discount_rate' => rand(1, 20),
                'discount' => rand(1, 20),
                'vat_rate' => rand(1, 20),
                'total_discount' => rand(1, 20),
                'total_vat' => rand(1, 20),
                'local_purchase_order_id' => 2,
            ],
           
          
           
        ]);
    }

}
