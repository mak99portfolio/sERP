<?php

use Illuminate\Database\Seeder;

class BusinessTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	['creator_user_id'=>1, 'name'=>'Fixed1', 'short_name'=>'Fixed1'],
        	['creator_user_id'=>1, 'name'=>'Percentage1', 'short_name'=>'Percentage1']
        ];

        \DB::table('business_types')->insert($data);
    }
}
