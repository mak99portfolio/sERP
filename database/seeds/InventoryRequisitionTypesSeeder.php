<?php

use Illuminate\Database\Seeder;

class InventoryRequisitionTypesSeeder extends Seeder{

    public function run(){

    	$data=[
    		['creator_user_id'=>1, 'name'=>'Internal Requisition', 'short_name'=>'IR'],
    		['creator_user_id'=>1, 'name'=>'Factory Requisition', 'short_name'=>'FR']
    	];

        \DB::table('inventory_requisition_types')->insert($data);
    }
}
