<?php

use Illuminate\Database\Seeder;

class StocksTableSeeder extends Seeder{

    public function run(){
        $data=[
        	[
				'working_unit_id'=>1,
				'product_id'=>1,
				'product_status_id'=>1,
				'product_pattern_id'=>1,
				'inventory_receive_id'=>null,
				'receive_quantity'=>100,
				'inventory_issue_id'=>null,
				'issue_quantity'=>30,
				'allocated_quantity'=>20,
				'remarks'=>'Remarks',
				'creator_user_id'=>1,
				'updator_user_id'=>1,
        	]
        ];

        \DB::table('stocks')->insert($data);
    }

}
