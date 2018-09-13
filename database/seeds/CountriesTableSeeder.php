<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder{

    public function run(){
        
        $data=[
        	['id'=>1, 'creator_user_id'=>1, 'updator_user_id'=>1, 'name'=>'Bangladesh', 'short_name'=>'BN']
        ];

        \DB::table('countries')->insert($data);

    }

}
