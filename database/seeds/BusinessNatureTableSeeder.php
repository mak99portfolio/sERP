<?php

use Illuminate\Database\Seeder;

class BusinessNatureTableSeeder extends Seeder
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
                'name'=>'Manufacturer', 
                'short_name'=>'Manufacturer'
            ],
        	[
                'creator_user_id'=>1, 
                'name'=>'Trader', 
                'short_name'=>'Trader'
            ],
            [
                'creator_user_id'=>1, 
                'name'=>'Service Provide', 
                'short_name'=>'Service Provide'
            ],
            [
                'creator_user_id'=>1, 
                'name'=>'Contractor', 
                'short_name'=>'Contractor'
            ],
            [
                'creator_user_id'=>1, 
                'name'=>'Agent/Distributor', 
                'short_name'=>'Agent/Distributor'
            ]
        ];

        \DB::table('business_natures')->insert($data);
    }
}
