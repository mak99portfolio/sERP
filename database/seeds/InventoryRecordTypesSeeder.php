<?php

use Illuminate\Database\Seeder;

class InventoryRecordTypesSeeder extends Seeder{

    public function run(){

        $data=[
        	['creator_user_id'=>1, 'inventory_record_type_no'=>'RT001' ,'name'=>'Internal Depot Issue', 'short_name'=>'IDI'],
        	['creator_user_id'=>1, 'inventory_record_type_no'=>'RT002' ,'name'=>'Factory issue', 'short_name'=>'FI'],
        	['creator_user_id'=>1, 'inventory_record_type_no'=>'RT003' ,'name'=>'Invoice issue', 'short_name'=>'IIS'],
        	['creator_user_id'=>1, 'inventory_record_type_no'=>'RT004' ,'name'=>'PO Receive', 'short_name'=>'PR'],
        	['creator_user_id'=>1, 'inventory_record_type_no'=>'RT005' ,'name'=>'Return Receive', 'short_name'=>'RR'],
        	['creator_user_id'=>1, 'inventory_record_type_no'=>'RT006' ,'name'=>'Inter Depot Receive', 'short_name'=>'IDR'],
        	['creator_user_id'=>1, 'inventory_record_type_no'=>'RT007' ,'name'=>'Factory Receive', 'short_name'=>'FR'],
        	['creator_user_id'=>1, 'inventory_record_type_no'=>'RT008' ,'name'=>'Adjustment IN', 'short_name'=>'AIN'],
        	['creator_user_id'=>1, 'inventory_record_type_no'=>'RT009' ,'name'=>'Adjustment OUT', 'short_name'=>'AOUT'],
        	['creator_user_id'=>1, 'inventory_record_type_no'=>'RT0010' ,'name'=>'Status Change', 'short_name'=>'SC']
        ];

        \DB::table('inventory_record_types')->insert($data);

    }
}
