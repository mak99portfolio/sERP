<?php

use Illuminate\Database\Seeder;

class InventoryItemStatusesSeeder extends Seeder{

    public function run(){
        
        $data=[
        	['name'=>'Fresh', 'short_name'=>'FP'],
        	['name'=>'Broken', 'short_name'=>'BP'],
        	['name'=>'Damaged', 'short_name'=>'DP'],
        	['name'=>'Expired', 'short_name'=>'EP']
        ];

        \DB::table('inventory_item_status')->insert($data);

    }

}