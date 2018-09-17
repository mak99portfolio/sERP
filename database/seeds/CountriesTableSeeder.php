<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder{

    public function run(){

        $data=[
        	['creator_user_id'=>1, 'name'=>'Bangladesh', 'short_name'=>'BN'],
        	['creator_user_id'=>1, 'name'=>'India', 'short_name'=>'IN']
        ];

        \DB::table('countries')->insert($data);

    }

}
