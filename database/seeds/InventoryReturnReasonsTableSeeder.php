<?php

use Illuminate\Database\Seeder;

class InventoryReturnReasonsTableSeeder extends Seeder{

    public function run(){

        $data=[
        	['creator_user_id'=>1, 'name'=>'Return Form Depot', 'short_name'=>'RFD'],
        	['creator_user_id'=>1, 'name'=>'Return Damaged Products', 'short_name'=>'RDP']
        ];

        \DB::table('inventory_return_reasons')->insert($data);

    }

}
