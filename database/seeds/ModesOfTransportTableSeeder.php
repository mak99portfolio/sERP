<?php

use Illuminate\Database\Seeder;

class ModesOfTransportTableSeeder extends Seeder{

    public function run(){

        $data=[
        	['creator_user_id'=>1, 'name'=>'Nepal', 'short_name'=>'NP'],
        	['creator_user_id'=>1, 'name'=>'Pakistan', 'short_name'=>'PK']
        ];

        \DB::table('modes_of_transports')->insert($data);

    }

}
