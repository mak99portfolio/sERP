<?php

use Illuminate\Database\Seeder;

class DeliveryScheduleItemTableSeeder extends Seeder
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
                'delivery_schedule_id' => 1,
                'product_id' => 1,
                'total_quantity' => 12,
                'delivery_quantity' => 7,
                'delivery_date' =>  \Carbon\Carbon::now()
            ],
            [
                'delivery_schedule_id' => 1,
                'product_id' => 2,
                'total_quantity' => 12,
                'delivery_quantity' => 5,
                'delivery_date' =>  \Carbon\Carbon::now()
            ]
            
        ];

        \DB::table('delivery_schedule_items')->insert($data);
    }
}
