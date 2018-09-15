<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder{

    public function run(){
        
        $data=[
        	['name'=>'Megnum Enterprise Ltd.', 'location'=>'Dhaur Dhaka', 'email'=>'info@megnum-ltd.com', 'phone'=>'+88020202', 'creator_id'=>1],
        ];

        \DB::table('companies')->insert($data);

    }

}
