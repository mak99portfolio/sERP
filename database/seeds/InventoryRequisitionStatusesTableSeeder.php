<?php

use Illuminate\Database\Seeder;

class InventoryRequisitionStatusesTableSeeder extends Seeder{

    public function run(){

    	$data=[
    		['name'=>'Pending', 'code'=>'pending'],
    		['name'=>'Confirmed', 'code'=>'confirmed'],
    		['name'=>'Issued', 'code'=>'issued'],
    		['name'=>'Received', 'code'=>'received']
    	];

    	\DB::table('inventory_requisition_statuses')->insert($data);
        
    }

}
