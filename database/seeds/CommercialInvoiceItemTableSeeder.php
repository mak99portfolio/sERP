<?php

use Illuminate\Database\Seeder;

class CommercialInvoiceItemTableSeeder extends Seeder
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
                'commercial_invoice_id' => 1,
                'product_id' => 1,
                'unit_price' => 1000,
                'quantity' => 20
            ],
            [
                'commercial_invoice_id' => 1,
                'product_id' => 2,
                'unit_price' => 6000,
                'quantity' => 40
            ],
            [
                'commercial_invoice_id' => 3,
                'product_id' => 2,
                'unit_price' => 3000,
                'quantity' => 50
            ],
            [
                'commercial_invoice_id' => 3,
                'product_id' => 3,
                'unit_price' => 3000,
                'quantity' => 50
            ],
            [
                'commercial_invoice_id' => 2,
                'product_id' => 3,
                'unit_price' => 2000,
                'quantity' => 20
            ]
        ];

        \DB::table('commercial_invoice_items')->insert($data);
    }
}
