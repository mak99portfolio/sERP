<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	['creator_user_id'=>1, 'name'=>'Dhaka', 'country_id'=>'1'],
        	['creator_user_id'=>1, 'name'=>'Khulna', 'country_id'=>'1']
        ];

        \DB::table('cities')->insert($data);
    }
}
