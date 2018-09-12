<?php

use Illuminate\Database\Seeder;

class WorkingUnitTypeSeeder extends Seeder{

    public function run(){
        
        $data=[
        	['name'=>'Branch'],
        	['name'=>'Central Depot'],
        	['name'=>'Central Warehouse'],
        	['name'=>'Depot'],
        	['name'=>'Factory'],
        	['name'=>'Head Office'],
        	['name'=>'Warehouse']
        ];

        \DB::table('working_unit_types')->insert($data);

    }
}
