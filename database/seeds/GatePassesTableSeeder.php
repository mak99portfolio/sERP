<?php

use Illuminate\Database\Seeder;

class GatePassesTableSeeder extends Seeder{

    public function run(){
        
        $data=[
        	[
        		'gate_pass_no'=>'GTP001',
        		'name'=>'Gate Pass 1',
        		'short_name'=>'GTP1'
        	],[
        		'gate_pass_no'=>'GTP002',
        		'name'=>'Gate Pass 2',
        		'short_name'=>'GTP2'
        	],[
        		'gate_pass_no'=>'GTP003',
        		'name'=>'Gate Pass 3',
        		'short_name'=>'GTP3'
        	]
        ];

        \DB::table('gate_passes')->insert($data);

    }

}
