<?php

use Illuminate\Database\Seeder;

class WorkingUnitTypeSeeder extends Seeder{

    public function run(){
        
        $data=[
        	['name'=>'Branch', 'short_name'=>'B'],
        	['name'=>'Central Depot', 'short_name'=>'CD'],
        	['name'=>'Central Warehouse', 'short_name'=>'CWH'],
        	['name'=>'Depot', 'short_name'=>'D'],
        	['name'=>'Factory', 'short_name'=>'F'],
        	['name'=>'Head Office', 'short_name'=>'HO'],
        	['name'=>'Warehouse', 'short_name'=>'WH']
        ];

        \DB::table('working_unit_types')->insert($data);

    }
}
