<?php

use Illuminate\Database\Seeder;

class PackingListTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = [
            [
                'commercial_invoice_id' => 1,
                'currency' => 'Dollar',
                'notes' => 'Notes 2',
                'gross_total' => 4000,
                'creator_user_id' => 1,
            ],
            [
                'commercial_invoice_id' => 2,
                'currency' => 'Dollar',
                'notes' => 'Notes 2',
                'gross_total' => 1000,
                'creator_user_id' => 1,
            ]
        ];

        \DB::table('packing_lists')->insert($data);
        \DB::table('packing_list_items')->insert([
             [
                'packing_list_id' => 1,
                'product_id' => 1,
                'per_unit_weight' => 20,
                'quantity' => 200,
            ],
             [
                'packing_list_id' => 1,
                'product_id' => 2,
                'per_unit_weight' => 10,
                'quantity' => 100,
            ],
             [
                'packing_list_id' => 2,
                'product_id' => 1,
                'per_unit_weight' => 25,
                'quantity' => 200,
            ],
             [
                'packing_list_id' => 2,
                'product_id' => 2,
                'per_unit_weight' => 10,
                'quantity' => 200,
            ],
             [
                'packing_list_id' => 2,
                'product_id' => 3,
                'per_unit_weight' => 20,
                'quantity' => 200,
            ]
        ]);
    }

}
