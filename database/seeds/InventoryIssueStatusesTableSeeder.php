<?php

use Illuminate\Database\Seeder;

class InventoryIssueStatusesTableSeeder extends Seeder{

    public function run(){

    	$data=[
    		['name'=>'Pending', 'code'=>'pending'],
    		['name'=>'Initially Approved', 'code'=>'initially_approved'],
    		['name'=>'Issued', 'code'=>'issued'],
    		['name'=>'Received', 'code'=>'received']
    	];

    	\DB::table('inventory_issue_statuses')->insert($data);
        
    }

}
