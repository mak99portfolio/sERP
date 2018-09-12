<?php

use Illuminate\Database\Seeder;

class DivisionsTableSeeder extends Seeder{

    public function run(){
        
    	$data=[
    		['id'=>1, 'country_id'=>1, 'name'=>'Barishal'],
    		['id'=>2, 'country_id'=>1, 'name'=>'Chattogram'],
    		['id'=>3, 'country_id'=>1, 'name'=>'Dhaka'],
    		['id'=>4, 'country_id'=>1, 'name'=>'Khulna'],
    		['id'=>5, 'country_id'=>1, 'name'=>'Rajshahi'],
    		['id'=>6, 'country_id'=>1, 'name'=>'Rangpur'],
    		['id'=>7, 'country_id'=>1, 'name'=>'Sylhet'],
    		['id'=>8, 'country_id'=>1, 'name'=>'Mymensingh']
    	];

    	\DB::table('divisions')->insert($data);

    }

}
