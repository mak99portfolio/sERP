<?php

use Illuminate\Database\Seeder;

class PortTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	['creator_user_id'=>1, 'name'=>'Chittagong Port', 'contact_person'=>'Atik Rahman', 'contact_person_number'=>'01652103981', 'country_id'=>'1', 'city_id'=>'1'],
        	['creator_user_id'=>1, 'name'=>'Mongla Port', 'contact_person'=>'Libon Khan', 'contact_person_number'=>'01541298732', 'country_id'=>'1', 'city_id'=>'2']
        ];

        \DB::table('ports')->insert($data);
    }
}
