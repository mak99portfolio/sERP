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
        	['id'=>1, 'name'=>"Nokia", 'short_name'=>'NO', 'creator_user_id'=>1],
        	['id'=>2, 'name'=>"Samsung", 'short_name'=>'SA', 'creator_user_id'=>1]
        ];

        \DB::table('product_brands')->insert($data);
    }
}
