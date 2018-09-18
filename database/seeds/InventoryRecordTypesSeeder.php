<?php

use Illuminate\Database\Seeder;

class InventoryRecordTypesSeeder extends Seeder{

    public function run(){

        $data=[
        	['creator_user_id'=>1, 'record_type_id'=>1 ,'name'=>'Internal Depot Issue', 'short_name'=>'IDI'],
        	['creator_user_id'=>1, 'record_type_id'=>2 ,'name'=>'Factory issue', 'short_name'=>'FI'],
        	['creator_user_id'=>1, 'record_type_id'=>3 ,'name'=>'Invoice issue', 'short_name'=>'IIS'],
        	['creator_user_id'=>1, 'record_type_id'=>4 ,'name'=>'PO Receive', 'short_name'=>'PR'],
        	['creator_user_id'=>1, 'record_type_id'=>5 ,'name'=>'Return Receive', 'short_name'=>'RR'],
        	['creator_user_id'=>1, 'record_type_id'=>6 ,'name'=>'Inter Depot Receive', 'short_name'=>'IDR'],
        	['creator_user_id'=>1, 'record_type_id'=>7 ,'name'=>'Factory Receive', 'short_name'=>'FR'],
        	['creator_user_id'=>1, 'record_type_id'=>8 ,'name'=>'Adjustment IN', 'short_name'=>'AIN'],
        	['creator_user_id'=>1, 'record_type_id'=>10 ,'name'=>'Adjustment OUT', 'short_name'=>'AOUT'],
        	['creator_user_id'=>1, 'record_type_id'=>11 ,'name'=>'Status Change', 'short_name'=>'SC']
        ];

        \DB::table('inventory_record_types')->insert($data);

    }
}
