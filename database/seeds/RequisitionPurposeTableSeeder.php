<?php

use Illuminate\Database\Seeder;

class RequisitionPurposeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	['creator_user_id'=>1, 'name'=>'Fixed Asset', 'short_name'=>'fixed'],
        	['creator_user_id'=>1, 'name'=>'Gift Item', 'short_name'=>'gift'],
        	['creator_user_id'=>1, 'name'=>'Sellable Item', 'short_name'=>'sell']
        ];

        \DB::table('requisition_purposes')->insert($data);
    }
}
