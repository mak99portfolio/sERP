<?php

use Illuminate\Database\Seeder;

class InventoryItemTypesSeeder extends Seeder{

    public function run(){

        $data=[
        	['creator_user_id'=>1, 'name'=>'Regular Product', 'short_name'=>'RP'],
        	['creator_user_id'=>1, 'name'=>'Gift Product', 'short_name'=>'GP'],
        	['creator_user_id'=>1, 'name'=>'Sample Product', 'short_name'=>'SP']
        ];

        \DB::table('inventory_item_types')->insert($data);
        
    }

}
