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
        	[
                'creator_user_id'=>1, 
                'name'=>'Ltd. Company', 
                'short_name'=>'Ltd. Company'
            ],
        	[
                'creator_user_id'=>1, 
                'name'=>'Partnership', 
                'short_name'=>'Partnership'
            ],
            [
                'creator_user_id'=>1, 
                'name'=>'Proprietorship', 
                'short_name'=>'Proprietorship'
            ]
        ];

        \DB::table('business_types')->insert($data);
    }
}
