<?php

use Illuminate\Database\Seeder;

class ProductBrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	['name'=>"MRF Tyre", 'short_name'=>'MT', 'creator_user_id'=>1],
        	['name'=>"Oman Oil", 'short_name'=>'OL', 'creator_user_id'=>1]
        ];

        \DB::table('product_brands')->insert($data);
    }
}
