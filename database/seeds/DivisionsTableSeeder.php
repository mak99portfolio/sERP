<?php

use Illuminate\Database\Seeder;

class DivisionsTableSeeder extends Seeder{

    public function run(){
        
    	$data=[
    		['creator_user_id'=>1, 'country_id'=>1, 'name'=>'Barishal'],
    		['creator_user_id'=>2, 'country_id'=>1, 'name'=>'Chattogram'],
    		['creator_user_id'=>1, 'country_id'=>1, 'name'=>'Dhaka'],
    		['creator_user_id'=>1, 'country_id'=>1, 'name'=>'Khulna'],
    		['creator_user_id'=>1, 'country_id'=>1, 'name'=>'Rajshahi'],
    		['creator_user_id'=>2, 'country_id'=>1, 'name'=>'Rangpur'],
    		['creator_user_id'=>1, 'country_id'=>1, 'name'=>'Sylhet'],
    		['creator_user_id'=>1, 'country_id'=>1, 'name'=>'Mymensingh']
    	];

    	\DB::table('divisions')->insert($data);

    }

}
