<?php

use Illuminate\Database\Seeder;

class CustomerZoneSeeder extends Seeder
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
                'name'=>'Dhaka', 
                'short_name'=>'dk',
                'creator_user_id'=>1
                ]
        ];

        \DB::table('customer_zones')->insert($data);
        $data=[
        	[
                'customer_zone_id'=>1, 
                'city_id'=>1
            ],
        	[
                'customer_zone_id'=>1, 
                'city_id'=>2
            ]
        ];

        \DB::table('customer_zone_cities')->insert($data);

    }
}
