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
                'quantity' => 20
            ],
            [
                'letter_of_credit_id' => 1,
                'product_id' => 2,
                'quantity' => 20
            ]
        ];

        \DB::table('letter_of_credit_items')->insert($data);
    }

}
