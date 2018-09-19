<?php

use Illuminate\Database\Seeder;

class ForeignPurchaseOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	[
                'foreign_requisition_id'=>' 1',
                'purchase_order_no'=> '5452145',
                'vendor_id'=> '1',
                'requisition_date'=>\Carbon\Carbon::now(),
                'purchase_order_date'=>\Carbon\Carbon::now(),
                'port_of_loading_port_id'=>'1',
                'port_of_discharge_port_id'=>'1',
                'country_of_final_destination_country_id'=>'1',
                'final_destination_city_id'=>'1',
                'country_of_origin_of_goods_country_id'=>'1',
                'payment_type'=>'1',
                'pre_carriage_by'=>'1',
                'subject'=>'test1',
                'letter_header'=>'test1',
                'letter_footer'=>'test1',
                'notes'=>'test1',
                'creator_user_id'=>1,
                'updator_user_id'=>1
            ],
            [
                'foreign_requisition_id'=>' 2',
                'purchase_order_no'=> '444444',
                'vendor_id'=> '2',
                'requisition_date'=>\Carbon\Carbon::now(),
                'purchase_order_date'=>\Carbon\Carbon::now(),
                'port_of_loading_port_id'=>'2',
                'port_of_discharge_port_id'=>'2',
                'country_of_final_destination_country_id'=>'2',
                'final_destination_city_id'=>'1',
                'country_of_origin_of_goods_country_id'=>'1',
                'payment_type'=>'1',
                'pre_carriage_by'=>'1',
                'subject'=>'test2',
                'letter_header'=>'test2',
                'letter_footer'=>'test2',
                'notes'=>'test2',
                'creator_user_id'=>1,
                'updator_user_id'=>1
            ]
            ];
            \DB::table('purchase_orders')->insert($data);
    }
}
