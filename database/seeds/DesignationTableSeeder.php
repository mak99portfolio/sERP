<?php

use Illuminate\Database\Seeder;

class DesignationTableSeeder extends Seeder{

    public function run(){

        $data=[
        	['name'=>'Admin', 'short_name'=>'ADMIN'],
        	['name'=>'Manager', 'short_name'=>'MNG'],
        	['name'=>'Depo Admin', 'short_name'=>'DA'],
        	['name'=>'Depo User', 'short_name'=>'DU'],
        ];

        \DB::table('designations')->insert($data);

    }

}
