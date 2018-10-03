<?php

use Illuminate\Database\Seeder;

class PaymentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	['creator_user_id'=>1, 'name'=>'Insurance', 'short_name'=>'Insurance'],
        	['creator_user_id'=>1, 'name'=>'L/C Charge', 'short_name'=>'L/C Charge']
        ];

        \DB::table('payment_types')->insert($data);
    }
}
