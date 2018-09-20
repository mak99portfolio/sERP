<?php

use Illuminate\Database\Seeder;

class InventoryAdjustmentPurposesSeeder extends Seeder{

    public function run(){

        $data=[
        	['creator_user_id'=>1, 'name'=>'Minimal Stock', 'short_name'=>'MS'],
        	['creator_user_id'=>1, 'name'=>'Damaged Stock', 'short_name'=>'DS']
        ];

        \DB::table('inventory_adjustment_purposes')->insert($data);

    }

}
