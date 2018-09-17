<?php

use Illuminate\Database\Seeder;

class InventoryRequisitionTypesSeeder extends Seeder{

    public function run(){

    	$data=[
    		['name'=>'Internal Requisition', 'short_name'=>'IR'],
    		['name'=>'Factory Requisition', 'short_name'=>'FR']
    	];
        
    }
}
