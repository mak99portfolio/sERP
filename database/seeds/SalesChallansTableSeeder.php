<?php

use Illuminate\Database\Seeder;

class SalesChallansTableSeeder extends Seeder{

    public function run(){

    	$sales_challans=[
    		[
    			'sales_challan_no'=>'SCL001',
    			'challan_date'=>\Carbon\Carbon::now(),
    			'mushak_number_id'=>1,
    			'delivary_medium'=>'own_vehicle',
    			'delivery_person_id'=>1
    		]
    	];

    	\DB::table('sales_challans')->insert($sales_challans);

    	$sales_challan_items=[
    		[
    			'sales_challan_id'=>1,
				'sales_order_id'=>1,
				'product_id'=>1,
				'quantity'=>50,
			],
    	];

    	\DB::table('sales_challan_items')->insert($sales_challan_items);

    	$sales_challan_vehicles=[
    		[
    			'sales_challan_id'=>1,
    			'own_vehicle_id'=>1,
    		],
    	];

    	\DB::table('sales_challan_vehicles')->insert($sales_own_vehicles);

    }
}
