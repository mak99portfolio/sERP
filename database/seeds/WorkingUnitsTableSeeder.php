<?php

use Illuminate\Database\Seeder;

class WorkingUnitsTableSeeder extends Seeder{

    public function run(){
        
        $data=[
        	[
        		'working_unit_id'=>'WU1',
        		'company_id'=>1,
        		'parent_unit_id'=>null,
        		'working_unit_type_id'=>1,
        		'name'=>'Central Depot',
        		'short_name'=>'CD1',
        		'in_charge'=>1,
        		'address'=>'Dhaka Mirpur',
        		'country_id'=>1,
        		'division_id'=>1,
        		'district_id'=>1
        	],[
        		'working_unit_id'=>'WU2',
        		'company_id'=>1,
        		'parent_unit_id'=>1,
        		'working_unit_type_id'=>2,
        		'name'=>'Depot',
        		'short_name'=>'D1',
        		'in_charge'=>1,
        		'address'=>'Dhaka Gulshan',
        		'country_id'=>1,
        		'division_id'=>1,
        		'district_id'=>1
        	],[
        		'working_unit_id'=>'WU3',
        		'company_id'=>1,
        		'parent_unit_id'=>2,
        		'working_unit_type_id'=>3,
        		'name'=>'Where House',
        		'short_name'=>'WH1',
        		'in_charge'=>1,
        		'address'=>'Dhaka Gulshan 2',
        		'country_id'=>1,
        		'division_id'=>1,
        		'district_id'=>1
        	],
        ];

        \DB::table('working_units')->insert($data);

    }

}
