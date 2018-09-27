<?php

use Illuminate\Database\Seeder;

class LetterOfCreditItemTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = [
            [
                'letter_of_credit_id' => 1,
                'product_id' => 1,
                'quantity' => 20,
                'unit_price' => 20000,
                'd_rate'=>10,
                'discount'=>10,
                'vat'=>10
            ],
            [
                'letter_of_credit_id' => 1,
                'product_id' => 2,
                'quantity' => 20,
                'unit_price' => 550,
                'd_rate'=>1,
                'discount'=>1,
                'vat'=>1
            ]
        ];

        \DB::table('letter_of_credit_items')->insert($data);
    }

}
