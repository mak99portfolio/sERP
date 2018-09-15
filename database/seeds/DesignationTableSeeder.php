<?php

use Illuminate\Database\Seeder;

class DesignationTableSeeder extends Seeder{

    public function run(){

        $data=[
        	['name'=>'Admin', 'short_name'=>'Admin'],
        	['name'=>'Manager', 'short_name'=>'Mng'],
        	['name'=>'Depo In Charg', 'short_name'=>'Depo In Charg'],
        ];

        \DB::table('designations')->insert($data);

    }

}
