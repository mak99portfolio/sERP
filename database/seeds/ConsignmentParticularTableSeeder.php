<?php

use Illuminate\Database\Seeder;

class ConsignmentParticularTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	['creator_user_id'=>1, 'name'=>'Automation/C&F Coillan Tohobil Service Charge', 'short_name'=>'C&F Charge'],
        	['creator_user_id'=>1, 'name'=>'Duty, Vat, Air, D/F Vat & Other', 'short_name'=>'Duty-Vat']
        ];

        \DB::table('consignment_particulars')->insert($data);
    }
}
