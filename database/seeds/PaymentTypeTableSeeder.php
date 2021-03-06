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
        	['creator_user_id'=>1, 'name'=>'Fixed', 'short_name'=>'Fixed'],
        	['creator_user_id'=>1, 'name'=>'Percentage', 'short_name'=>'Percentage']
        ];

        \DB::table('payment_types')->insert($data);
    }
}
