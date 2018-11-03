<?php

use Illuminate\Database\Seeder;

class DeliveryScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'customer_id' => 1,
                'sales_order_id' => 1,
                'delivery_schedule_no' => 'DS001'
               
            ]
        ];

        \DB::table('delivery_schedules')->insert($data);
    }
}
