<?php

use Illuminate\Database\Seeder;

class InventoryItemStatusesSeeder extends Seeder{

    public function run(){

        $data=[
        	['creator_user_id'=>1, 'name'=>'Fresh', 'short_name'=>'FP'],
        	['creator_user_id'=>1, 'name'=>'Broken', 'short_name'=>'BP'],
        	['creator_user_id'=>1, 'name'=>'Damaged', 'short_name'=>'DP'],
        	['creator_user_id'=>1, 'name'=>'Expired', 'short_name'=>'EP']
        ];

        \DB::table('inventory_item_statuses')->insert($data);

    }

}
