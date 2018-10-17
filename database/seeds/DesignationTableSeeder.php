<?php

use Illuminate\Database\Seeder;

class DesignationTableSeeder extends Seeder{

    public function run(){

        $data=[
        	['designation_no'=>'DG0001' ,'name'=>'Admin', 'short_name'=>'ADMIN'],
        	['designation_no'=>'DG0002' ,'name'=>'Manager', 'short_name'=>'MNG'],
        	['designation_no'=>'DG0003' ,'name'=>'Depo Admin', 'short_name'=>'DA'],
        	['designation_no'=>'DG0004' ,'name'=>'Depo User', 'short_name'=>'DU'],
        	['designation_no'=>'DG0005' ,'name'=>'Driver', 'short_name'=>'DRV'],
        ];

        \DB::table('designations')->insert($data);

    }

}
