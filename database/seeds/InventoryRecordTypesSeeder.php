<?php

use Illuminate\Database\Seeder;

class InventoryRecordTypesSeeder extends Seeder{

    public function run(){
        
        $data=[
        	['record_type_id'=>1 ,'Internal Depot Issue'=>'', 'short_name'=>'IDI'],
        	['record_type_id'=>2 ,'name'=>'Factory issue', 'short_name'=>'FI'],
        	['record_type_id'=>3 ,'name'=>'Invoice issue', 'short_name'=>'IIS'],
        	['record_type_id'=>4 ,'name'=>'PO Receive', 'short_name'=>'PR'],
        	['record_type_id'=>5 ,'name'=>'Return Receive', 'short_name'=>'RR'],
        	['record_type_id'=>6 ,'name'=>'Inter Depot Receive', 'short_name'=>'IDR'],
        	['record_type_id'=>7 ,'name'=>'Factory Receive', 'short_name'=>'FR'],
        	['record_type_id'=>8 ,'name'=>'Adjustment IN', 'short_name'=>'AIN'],
        	['record_type_id'=>10 ,'name'=>'Adjustment OUT', 'short_name'=>'AOUT'],
        	['record_type_id'=>11 ,'name'=>'Status Change', 'short_name'=>'SC']
        ];

        \DB::table('inventory_record_types')->insert($data);

    }
}
