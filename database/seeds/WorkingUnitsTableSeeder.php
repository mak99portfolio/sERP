<?php

use Illuminate\Database\Seeder;

class WorkingUnitsTableSeeder extends Seeder{

    public function run(){
        
        $data=[
        	[
        		'working_unit_no'=>'WU001',
        		'company_id'=>1,
        		'parent_unit_id'=>null,
        		'working_unit_type_id'=>2,
        		'name'=>'Central Depot',
        		'short_name'=>'CD1',
        		'in_charge'=>1,
        		'address'=>'Dhaka Mirpur',
        		'country_id'=>1,
        		'division_id'=>1,
        		'district_id'=>1
        	],[
        		'working_unit_no'=>'WU002',
        		'company_id'=>1,
        		'parent_unit_id'=>2,
        		'working_unit_type_id'=>4,
        		'name'=>'Depot',
        		'short_name'=>'D1',
        		'in_charge'=>1,
        		'address'=>'Dhaka Gulshan',
        		'country_id'=>1,
        		'division_id'=>1,
        		'district_id'=>1
        	],[
                'working_unit_no'=>'WU003',
                'company_id'=>1,
                'parent_unit_id'=>2,
                'working_unit_type_id'=>5,
                'name'=>'Factory',
                'short_name'=>'FAC1',
                'in_charge'=>1,
                'address'=>'Dhaka Badda',
                'country_id'=>1,
                'division_id'=>1,
                'district_id'=>1
            ],[
                'working_unit_no'=>'WU004',
                'company_id'=>1,
                'parent_unit_id'=>2,
                'working_unit_type_id'=>7,
                'name'=>'Warehouse',
                'short_name'=>'WH1',
                'in_charge'=>1,
                'address'=>'Dhaka Savar',
                'country_id'=>1,
                'division_id'=>1,
                'district_id'=>1
            ],
        ];

        \DB::table('working_units')->insert($data);

    }

}
