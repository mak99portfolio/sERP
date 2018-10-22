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
        	['name'=>"Nokia", 'short_name'=>'NO', 'creator_user_id'=>1],
        	['name'=>"Samsung", 'short_name'=>'SA', 'creator_user_id'=>1]
        ];

        \DB::table('product_brands')->insert($data);
    }
}
